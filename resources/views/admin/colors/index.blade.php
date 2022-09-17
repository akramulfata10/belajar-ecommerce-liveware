@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif
                <div class="card-header">
                    <h4>Data colors
                        <a href="{{ url('admin/colors/create') }}" class="btn btn-primary btn-sm text-white float-end">Add
                            colors</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Color Name</th>
                                <th scope="col">Color Code</th>
                                <th scope="col">Status</th>
                                <td scope="col">Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($colors as $color)
                                <tr>
                                    <td>{{ $color->id }}</td>
                                    <td>{{ $color->name }}</td>
                                    <td>{{ $color->code }}</td>
                                    <td>{{ $color->status == '1' ? 'hidden' : 'visible' }}</td>
                                    <td>
                                        <a href="{{ url('admin/colors/' . $color->id . '/edit') }}"
                                            class="btn btn-warning btn-sm">edit</a>
                                        <a href="{{ url('admin/colors/' . $color->id . '/delete') }}"
                                            onclick="confirm('Delete entry?')" class="btn btn-danger btn-sm">hapus</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No Product</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
