@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-header">
                    <h4>add colors
                        <a href="{{ url('admin/colors') }}" class="btn btn-primary btn-sm text-white float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/colors/' . $color->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="">name color</label>
                                <input type="text" class="form-control" name="name" value="{{ $color->name }}">
                                @error('name')
                                    <small class="text-danger"> {{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3 ">
                                <label for="">code color</label>
                                <input type="text" class="form-control" name="code" value="{{ $color->code }}">
                                @error('code')
                                    <small class="text-danger"> {{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Status</label><br>
                                <input type="checkbox" name="status" {{ $color->status == true ? 'checked' : '' }}>
                                chacked=hidded,non checked=visible
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
