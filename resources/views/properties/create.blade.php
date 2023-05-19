@extends('layouts.app')

@section('title', 'Properties')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <form action="{{ route('property.store') }}" class="bg-white rounded p-5" method="post" enctype="multipart/form-data">
                    @csrf

                    <h2 class="h3 fw-light text-muted">Add Property Details</h2>

                    
                        <div class="mb-3">
                            <label for="broker-id" class="form-label fw-light text-muted">Broker Name</label>
                            <select name="broker_id" id="broker-id" class="form-control">
                                <option hidden>--Choose A Name--</option>
                                @foreach ($all_brokers as $broker)
                                    <option value="{{$broker->id}}">{{$broker->name}}</option>
                                @endforeach
                            </select>
                            
                        </div>                        
                    

                    <div class="mb-3">
                        <label for="property-name" class="form-label fw-light text-muted">Name Of Property</label>
                        <input type="text" name="property_name" id="property-name" class="form-control text-muted" value="{{old('property_name')}}" autofocus>
                        @error('property_name')
                            <p class="text-danger small">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="property-description" class="form-label fw-light text-muted">Description Of Property</label>
                        <textarea name="property_description" id="property-description" rows="5" class="form-control text-muted">{{old('property_description')}}</textarea>
                        @error('property_description')
                            <p class="text-danger small">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="property-location" class="form-label fw-light text-muted">Location Of Property</label>
                        <input type="text" name="property_location" id="property-location" class="form-control" value="{{old('property_location')}}">
                        @error('property_description')
                            <p class="text-danger small">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <label for="property-price" class="form-label fw-light text-muted">Price</label>
                                <input type="number" name="property_price" id="property-price" class="form-control" value="{{ old('property_price') }}">
                                @error('property_price')
                                    <p class="text-danger small">{{$message}}</p>
                                @enderror</div>
                            <div>
                            <div class="col">
                                <label for="property-type" class="form-label fw-light text-muted">Type Of Property</label>
                                <input type="text" name="property_type" id="property-type" class="form-control" value="{{old('property_type')}}">
                                @error('property_type')
                                    <p class="text-danger small">{{$message}}</p>
                                @enderror</div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <label for="property-image" class="form-label fw-light text-muted">Add An Image</label>
                                <input type="file" name="property_image" id="property-image" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <button type="submit" class="btn btn-success btn-sm w-25">Post Details</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection