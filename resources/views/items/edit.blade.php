<!-- edit.blade.php -->

@extends('layouts.app')


@section('views')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Item</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('items.update', $item->id) }}" method="POST" id="edit-item-form">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    value="{{ $item->name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="amount">Amount</label>
                                <input type="number" name="amount" id="amount" class="form-control"
                                    value="{{ $item->amount }}" required>
                            </div>
                            <div class="form-group">
                                <label for="brand">Brand</label>
                                <select name="brand" id="brand" class="form-control" required>
                                    <option value="">Select a brand</option>
                                    <option value="Toyata" {{ $item->brand == 'Toyata' ? 'selected' : '' }}>Toyata
                                    </option>
                                    <option value="Honda" {{ $item->brand == 'Honda' ? 'selected' : '' }}>Honda
                                    </option>
                                    <option value="Tesla" {{ $item->brand == 'Tesla' ? 'selected' : '' }}>Tesla
                                    </option>
                                </select>
                            </div>





                            <div class="form-group">
                                <label for="model">Model</label>

                                <input type="number" value="{{ $item->model }}" name="model" id="model"
                                    class="form-control" required>
                                </select>
                            </div>








                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
