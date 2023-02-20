@extends('layouts.app')

@section('views')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-11">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h6>Items</h6>
                        <a href="{{ route('items.create') }}" class="btn btn-primary">Add New Item</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Amount</th>
                                        <th>Brand</th>
                                        <th>Model</th>
                                        <th>Date Added</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = +1; ?>
                                    @foreach ($items as $item)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->amount }}</td>
                                            <td>{{ $item->brand }}</td>
                                            <td>{{ $item->model }}</td>
                                            <td>{{ $item->date_added }}</td>
                                            <td>
                                                <a href="{{ route('items.edit', $item->id) }}"
                                                    class="btn btn-sm btn-warning">Edit</a><br>
                                                <form action="{{ route('items.destroy', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col">

                {{ $items->links() }}

            </div>
        </div>
    </div>
@endsection
