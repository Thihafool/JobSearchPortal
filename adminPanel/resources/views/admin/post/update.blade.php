@extends('admin.layouts.app')
@section('content')
    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin#updatePost') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="postId" value="{{ $postData->id }}">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" value="{{ old('postTitle', $postData->title) }}" name="postTitle"
                            class="form-control " placeholder="Enter Post Title">
                        @error('postTitle')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="postId" value="{{ $postData->id }}">

                        <label>Description</label>
                        <textarea name="postDescription" class="form-control " placeholder="Enter post description" cols="30"
                            rows="10">{{ old('postDescription', $postData->description) }}</textarea>
                        @error('postDescription')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <img class="rounded shadow-sm" width="100%"
                            @if ($postData->image == null) src="{{ asset('defaultImg/photo_gallery.webp') }}"
                            @else
                        src="{{ asset('storage/' . $postData->image) }}" @endif>
                        <input type="file" name="postImage" class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <label>Category Name</label>
                        <select class="form-control" name="postCategory">
                            <option value="id">Choose Category</option>
                            @foreach ($category as $c)
                                <option @if ($c->id == $postData->category_id) selected @endif value="{{ $c->id }}">
                                    {{ $c->title }}</option>
                            @endforeach
                        </select>
                        @error('postTitle')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
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
