@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Products Page</h4>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Description</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->description }}</td>
                    <td>
                        <img src="{{ asset('assets/uploads/products/'. $item->image) }}" class="cate-img" alt="Image here" >
                    </td>
                    <td>
                        <a href="{{ url('edit-prod/'.$item->id) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ url('delete-category/'.$item->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    </div>
@endsection