@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
    <table class="table table-hover table-striped align-middle bg-white border text-secondary w-50">
        <thead class="small table-success text-secondary text-center">
            <tr>
                
                <th>Name</th>
                <th>Email</th>
                <th>Date Created</th>
                <th>Status</th>
                <th>Role</th>
                <th>Action</th>
                
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($all_users as $user)
                <tr>
                    <td>
                        <a href="#" class="text-decoration-none text-dark fw-bold">{{$user->name}}</a>
                    </td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at}}</td>
                    <td><i class="fa-regular fa-circle text-success"></i> Active</td>
                    <td>
                        {{($user->role_id == 1) ? 'Admin':'User'}}
                    </td>
                    <td>
                        @if (Auth::user()->id !== $user->id)
                            <div class="dropdown">
                                <button class="btn btn-sm" data-bs-toggle="dropdown">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </button>

                                <div class="dropdown-menu">
                                    <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#deactivate-user-{{$user->id}}">
                                        <i class="fa-solid fa-user-slash"></i> Deactivate {{$user->name}}
                                    </button>
                                </div>
                            </div>
                            {{-- Add the modal here --}}
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- <div class="div mt-3 w-25">
        <ul class="list-group">
            <li class="list-group-item mb-1 badge">
               Admin: {{ $c_admin }}
            </li>
            <li class="list-group-item badge badge">
                Users {{$c_users}}
            </li>
        </ul>
    </div> --}}
@endsection
