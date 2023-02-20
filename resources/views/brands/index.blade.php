@extends('layouts.app')

@section('views')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Brands
                        <a href="{{ route('brands.create') }}" class="btn btn-sm btn-primary float-right">Add New Brand</a>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Brand Name</th>
                                    <th>Items Count</th>
                                    <th>Models Count</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($brands as $brand)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $brand->name }}</td>
                                        <td>{{ $brand->count() }}</td>
                                        <td>{{ $brand->models_count }}</td>



                                        <td>
                                            <a href="{{ route('brands.edit', $brand) }}"
                                                class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('brands.destroy', $brand->id) }}" method="POST"
                                                style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this brand and all associated items and models?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-center">
                            {{ $brands->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
