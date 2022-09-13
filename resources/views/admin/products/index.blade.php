@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif
                <div class="card-header">
                    <h4>Data Products
                        <a href="{{ url('admin/products/create') }}" class="btn btn-primary btn-sm text-white float-end">Add
                            Product</a>
                    </h4>
                </div>
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
@endsection
