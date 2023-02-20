@extends('layouts.app')

@section('views')
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <br>
    <div class="container">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h1>modals</h1>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>

                                        <th><a href="?sort=id">ID</a></th>
                                        <th><a href="?sort=name">Name</a></th>
                                        <th><a href="?sort=brand_id">Brand</a></th>
                                        <th>Items Count</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($modals as $modal)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $modal->name }}</td>
                                            <td>{{ $modal->brand->name }}</td>
                                            <td>{{ $modal->count() }}</td>
                                            <td class="displat-">
                                                <a class="btn btn-sm btn-warning"
                                                    href="{{ route('modals.edit', $modal) }}">Edit</a>
                                                <form action="{{ route('modals.destroy', $modal->id) }}" method="POST"
                                                    style="display: inline-block;"
                                                    onsubmit="return confirm('Are you sure you want to delete this modal?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{ $modals->links() }}


                </div>
            </div>
            <div class="col-3">
                <center><a class="btn btn-primary" href="{{ route('modals.create') }}">Add New modal</a></center>
            </div>
        </div>
    </div>
@endsection
