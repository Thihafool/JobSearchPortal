@extends('admin.layouts.app')
@section('content')
    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin#createPost') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" value="{{ old('postTitle') }}" name="postTitle" class="form-control "
                            placeholder="Enter Post Title">
                        @error('postTitle')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="postDescription" class="form-control " placeholder="Enter post description" cols="30"
                            rows="10">{{ old('postDescription') }}</textarea>
                        @error('postDescription')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" value="{{ old('postImage') }}" name="postImage" class="form-control">
                        @error('postImage')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Category Name</label>
                        <select class="form-control" name="postCategory">
                            <option value="id">Choose Category</option>
                            @foreach ($category as $c)
                                <option value="{{ $c->id }}">{{ $c->title }}</option>
                            @endforeach
                        </select>
                        @error('postTitle')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Category List Page</h3>
                @if (session('deleteSuccses'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session('deleteSuccses') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                {{-- alert end --}}

                <div class="card-tools">
                    {{-- <form action="{{ route('admin#categorySearch') }}" method="post">
                        @csrf
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="categorySearch" class="form-control float-right"
                                placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form> --}}
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap text-center">
                    <thead>
                        <tr>
                            <th>Post ID</th>
                            <th>Post Title</th>
                            <th>Post Image</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($post as $p)
                            <tr>
                                <td>{{ $p->id }}</td>
                                <td>{{ $p->title }}</td>
                                <td><img class="rounded shadow-sm" width="100px"
                                        @if ($p->image == null) src="{{ asset('defaultImg/photo_gallery.webp') }}"
                                    @else
                                    src="{{ asset('storage/' . $p->image) }}" @endif
                                        alt=""></td>
                                <td>
                                    <button class="btn btn-sm bg-dark text-white">
                                        <a href="{{ route('admin#postEdit', $p->id) }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </button>
                                    <button class="btn btn-sm bg-danger text-white">
                                        <a href="{{ route('admin#deletePost', $p->id) }}">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </button>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
@endsection
