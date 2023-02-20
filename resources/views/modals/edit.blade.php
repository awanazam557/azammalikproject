@extends('layouts.app')

@section('views')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <br>
                <div class="card">
                    <div class="card-header">Edit modal</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('modals.update', $modal->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" name="name" value="{{ $modal->name }}" class="form-control"
                                    required>
                            </div>

                            <br>









                            <div class="form-group">
                                <label for="brand">Brand:</label>
                                <select name="brand_id" id="brand_id" required>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}"
                                            {{ isset($model) && $model->brand_id == $brand->id ? 'selected' : '' }}>
                                            {{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br>

                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="{{ route('modals.index') }}" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
