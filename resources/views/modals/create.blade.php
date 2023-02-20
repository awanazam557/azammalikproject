@extends('layouts.app')

@section('views')
    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="col-6">

                    <br>
                    <h1>{{ isset($model) ? 'Edit' : 'Add' }} Model</h1>

                    <form action="{{ isset($model) ? route('modals.update', $model) : route('modals.store') }}"
                        method="POST">
                        @csrf
                        @if (isset($model))
                            @method('PUT')
                        @endif
                        <br>
                        <br>


                        {{-- <div class="form-group">
            <label for="brand">Brand</label>
            <select name="brand" id="brand" class="form-control" required>
                <option value="">Select a brand</option>
                <option value="Brand A">Car</option>
                <option value="Brand B">Bike</option>
                <option value="Brand C">Bus</option>
            </select>
        </div> --}}




                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name"
                            value="{{ isset($model) ? $model->name : old('name') }}" required>
                        <br>
                        <br>
                        <label for="brand_id">Brand:</label>
                        <select name="brand_id" id="brand_id" required>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}"
                                    {{ isset($model) && $model->brand_id == $brand->id ? 'selected' : '' }}>
                                    {{ $brand->name }}</option>
                            @endforeach
                        </select>
                        <br>
                        <br>
                        <button class="btn btn-sm btn-primary" type="submit">Save</button>
                        <a href="{{ route('modals.index') }}">Cancel</a>
                    </form>



                </div>
            </div>
        </div>
    @endsection
