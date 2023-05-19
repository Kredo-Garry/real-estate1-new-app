@extends('layouts.app')

@section('title', 'Homepage')

@section('content')
    <div class="row justify-content-center mt-1">
        <div class="col-6">
            <form action="#" method="post" class="bg-white p-4">
                @csrf
                <input type="search" name="search" id="search" class="form-control fw-light text-muted" placeholder="Search properties here...">
                <button type="submit" class="btn btn-info btn-sm mt-1 text-white fw-light">Search</button>
            </form>
        </div>
    </div>
    <div class="container-fluid">
        {{$all_properties->links()}}
        <div class="row justify-content-center mt-2 bg-white mt-4 p-2 rounded rounded-2">
            <div class="col">
                @forelse ($all_properties as $p_property)
                <ul class="list-group">
                    <div class="li list-group-item mb-2">
                        <div class="row">
                            <div class="col-4">
                                <a href="#">
                                    <img src="{{asset('storage/images/' . $p_property->image)}}" alt="{{$p_property->image}}" class="w-100 p-3 rounded">
                                </a>
                            </div>
                            <div class="col-4 p-3" style="height: 200px; overflow:scroll-y">
                                <h2 class="h3 text-muted fw-bold">Name: {{$p_property->name}}</h2>
                                <p class="text-light text-muted m-0 fw-bold">Description: {{$p_property->description}}</p>
                                <p class="text-light text-muted m-0 fw-bold">Location: {{$p_property->location}}</p>
                                <p class="text-light text-muted m-0 fw-bold">Price: {{$p_property->price}}</p>
                                <p class="text-light text-muted m-0 fw-bold">Type: {{$p_property->typeOfProperty}}</p>
                                <hr>
                                {{-- Action Buttons --}}
                                <a href="{{route('mail.inquiry')}}" class="btn btn-success btn-sm text-white">Inquire Property</a>
                                {{-- <a href="{{route('property.destroy', $p_property->id)}}" class="btn btn-danger btn-sm text-white">Delete Property</a> --}}
                                {{-- <form action="{{route('property.destroy', $p_property->id)}}" method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete Property</button>
                                </form> --}}
                                <button type="button" class="btn btn-danger btn-sm text-danger text-white" data-bs-toggle="modal" data-bs-target="#delete-property-{{$p_property->id}}">Delete Property</button>
                                @include('users.modals.delete')
                                <hr mb-1>
                            </div>
                            <div class="col-3">
                                <p class="text-muted text-center">Comment Section</p>
                                @include('property-comments')
                            </div>
                        </div>
                    </div>
                </ul>
                    
                @empty
                    <p class="text-muted text-center">No Properties Yet</p>
                @endforelse
            </div>
        </div>
        {{$all_properties->links()}}
    </div>
@endsection