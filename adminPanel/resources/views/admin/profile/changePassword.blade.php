@extends('admin.layouts.app')
@section('content')
    <div class="col-8 offset-3 mt-5">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <legend class="text-center">Change Password</legend>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                            <form class="form-horizontal ps-5" action="" method="post">
                                @csrf

                                {{-- alert start --}}
                                @if (session('updateSuccess'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>{{ session('updateSuccess') }}</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                {{-- alert end --}}

                                {{-- alert start --}}
                                @if (session('fail'))
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong>{{ session('fail') }}</strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                {{-- alert end --}}

                                <div class="form-group row ">
                                    <label for="inputName" class="col-3 col-form-label">Old Password</label>
                                    <div class="col-6">
                                        <input type="password" name="oldPassword"
                                            class="form-control  @error('oldPassword') is-invalid @enderror" id="inputName"
                                            placeholder="Enter Old Password">
                                        @error('oldPassword')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-3 col-form-label">New Password</label>
                                    <div class="col-6">
                                        <input type="password" name="newPassword"
                                            class="form-control  @error('newPassword') is-invalid @enderror" id="inputEmail"
                                            placeholder="Enter New Password">
                                        @error('newPassword')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-3 col-form-label">Confirm Password</label>
                                    <div class="col-6">
                                        <input type="password" name="confirmPassword"
                                            class="form-control  @error('confirmPassword') is-invalid @enderror"
                                            id="inputEmail" placeholder="Enter Confirm Password">
                                        @error('confirmPassword')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <div class=" col-sm-10">
                                        <button type="submit" class="btn bg-dark text-white">Change Password</button>
                                    </div>
                                </div>


                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
