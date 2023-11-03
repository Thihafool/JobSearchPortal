<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    //redirect admin home page
    public function dashboard()
    {
        $id = Auth::user()->id;
        $user = User::select('id', 'name', 'email')->where('id', $id)->first();

        return view('admin.profile.index', compact('user'));
    }

    //redirect admin list page
    public function index()
    {
        $userData = User::get();

        return view('admin.list.index', compact('userData'));
    }
    //delete admin account
    public function deleteAccount($id)
    {
        User::where('id', $id)->delete();
        return back()->with(['deleteSuccess' => 'Account deleted Successfully']);

    }

    //update user data
    public function updateData(Request $request)
    {
        $this->validationCheck($request);
        $userData = $this->getUserData($request);
        User::where('id', Auth::user()->id)->update($userData);
        return back()->with(['updateSuccess' => 'Account Updated Successfully']);
    }
    //direct change password page
    public function changePasswordPage()
    {
        return view('admin.profile.changePassword');
    }
    //admin change password
    public function adminChangePassword(Request $request)
    {
        $this->passwordValidationCheck($request);
        $dbPassword = User::where('id', Auth::user()->id)->first();
        $dbPassword = $dbPassword->password;

        //Hash::check('plaintext',$hashedValue)

        if (Hash::check($request->oldPassword, $dbPassword)) {

            $data = [
                'password' => Hash::make($request->newPassword),
            ];
            User::where('id', Auth::user()->id)->update($data);
            return back()->with(['updateSuccess' => 'Password updated Successfully']);
        }

        return back()->with(['fail' => 'password do not match ']);

    }
    //admin list search page
    public function adminListSearch()
    {
        $userData = User::when(request('adminSearchKey'), function ($q) {
            $q->orwhere('name', 'like', '%' . request('adminSearchKey') . '%')
                ->orwhere('email', 'like', '%' . request('adminSearchKey') . '%')
                ->orwhere('phone', 'like', '%' . request('adminSearchKey') . '%')
                ->orwhere('gender', 'like', '%' . request('adminSearchKey') . '%')
                ->orwhere('address', 'like', '%' . request('adminSearchKey') . '%');
        })->get();

        return view('admin.list.index', compact('userData'));

    }
    //get user info
    private function getUserData($request)
    {
        return [
            'name' => $request->adminName,
            'email' => $request->adminEmail,
            'phone' => $request->adminPhone,
            'gender' => $request->adminGender,
            'address' => $request->adminAddress,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }

    //account validation check
    private function validationCheck($request)
    {
        Validator::make($request->all(), [
            'adminName' => 'required|min:4',
            'adminEmail' => 'required',
            'adminGender' => 'required',
            'adminPhone' => 'required',
            'adminAddress' => 'required',
        ])->validate();
    }

    //password validation check
    private function passwordValidationCheck($request)
    {
        Validator::make($request->all(), [
            'oldPassword' => 'required',
            'newPassword' => 'required|min:6',
            'confirmPassword' => 'required|min:6|same:newPassword',
        ])->validate();
    }
}