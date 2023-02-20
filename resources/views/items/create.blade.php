<!-- create.blade.php -->
@extends('layouts.app')

@section('views')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add New Item</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('items.store') }}" method="POST" id="create-item-form">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="amount">Amount</label>
                                <input type="number" name="amount" id="amount" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="brand">Brand</label>
                                <select name="brand" id="brand" class="form-control" required>
                                    <option value="">Select a brand</option>
                                    <option value="Toyata">Toyata</option>
                                    <option value="Honda">Honda</option>
                                    <option value="Tesla">Tesla</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="model">Model</label>

                                <input type="number" name="model" id="model" class="form-control" required>
                                </select>
                            </div>
                            <br>
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
