@extends('layouts.app')

@section('views')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <br>
                    <br>
                    <div class="card-header">Add New Brand</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('brands.store') }}">
                            @csrf



                            <div class="form-group">
                                <label for="name">Brand</label>
                                <select type="text" name="name" id="name"
                                    class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                    required>
                                    <option value="">Select a brand</option>
                                    <option value="Toyata">Toyata</option>
                                    <option value="Honda">Honda</option>
                                    <option value="Tesla">Tesla</option>
                                </select>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>










                            <br>

                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="{{ route('brands.index') }}" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
