@extends('layouts.app')

@section('title', 'Properties')

@section('content')
    <table class="table table-hover table-striped align-middle bg-white border text-secondary text-center">
        <thead class="table-primary text-secondary">
            <th>Image</th>
            <th>Name</th>
            {{-- <th>Description</th> --}}
            <th>Location</th>
            <th>Price</th>
            <th>Property Type</th>
            <th>Posted Date</th>
            <th>Status</th>
            <th>Action</th>
        </thead>
        <tbody>
            @forelse ($all_properties as $a_property)
                <tr>
                    <td>
                        <a href="#" class="">
                            <img src="{{asset('storage/images/'. $a_property->image)}}" alt="{{$a_property->image}}" class="d-block mx-auto" style="width: 200px; height: 200px;">
                        </a>
                    </td>
                    <td>
                        <p class="text-muted fw-bold">{{$a_property->name}}</p>
                    </td>
                    {{-- <td>
                        <p class="text-muted text-light">{{$a_property->description}}</p>
                    </td> --}}
                    <td>
                        <p class="text-muted text-light">{{$a_property->location}}</p>
                    </td>
                    <td>
                        <p class="text-muted text-light">{{$a_property->price}}</p>
                    </td>
                    <td>
                        <p class="text-muted text-light">{{$a_property->typeOfProperty}}</p>
                    </td>
                    <td>
                        <p class="text-muted text-light">{{$a_property->created_at}}</p>
                    </td>
                    <td>
                        <i class="fa-regular fa-circle"></i> &nbsp; Visible
                    </td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-sm" data-bs-toggle="dropdown">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </button>
                            <div class="dropdown-menu">
                                <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#hide-post-{{$a_property->id}}">
                                    <i class="fa-solid fa-eye-slash"></i> Hide Property No. {{$a_property->id}}
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td></td>
                </tr>
            @endforelse
        </tbody>
        {{$all_properties->links()}}
    </table>
@endsection