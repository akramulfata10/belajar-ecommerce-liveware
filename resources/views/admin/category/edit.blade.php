@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-header">
                    <h4> Edit Category
                        <a href="{{ url('admin/category') }}" class="btn btn-primary btn-sm text-white float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/category/' . $category->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="">name</label>
                                <input type="text" name="name" value="{{ $category->name }}" class="form-control" />
                                @error('name')
                                    <small class="text-danger"> {{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3 ">
                                <label for="">slug</label>
                                <input type="text" class="form-control" value="{{ $category->slug }}" name="slug" />
                                @error('slug')
                                    <small class="text-danger"> {{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Description</label>
                                <textarea class="form-control" name="description" rows="3"> {{ $category->description }}" </textarea>
                                @error('description')
                                    <small class="text-danger"> {{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">image</label>
                                <input type="file" class="form-control" name="image">
                                <img src="{{ asset('uploads/category/' . $category->image) }}" width="60px" height="60px"
                                    class="mt-2">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Status</label><br>
                                <input type="checkbox" name="status" {{ $category->status == '1' ? 'checked' : '' }}>
                            </div>
                            <div class="col-md-12 mb-3">
                                <h4>SEO Tags</h4>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Meta Title</label>
                                <input type="text" class="form-control" name="meta_title"
                                    value="{{ $category->meta_title }}">
                                @error('meta_title')
                                    <small class="text-danger"> {{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">meta_keyword</label>
                                <textarea rows="5" class="form-control" name="meta_keyword"> {{ $category->meta_keyword }}</textarea>
                                @error('meta_keyword')
                                    <small class="text-danger"> {{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">meta_description</label>
                                <textarea name="meta_description" class="form-control" cols="30" rows="10">{{ $category->meta_description }} </textarea>
                                @error('meta_description')
                                    <small class="text-danger"> {{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <button type="submit" class="btn btn-primary btn-sm float-end">Edit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
