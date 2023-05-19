@extends('layouts.app')

@section('title', 'Add Broker')

@section('content')
<div class="row">
    <div class="col">
        <form action="{{route('broker.store')}}" method="post">
            @csrf
            <div class="mb-3 mt-5">
                <div class="card mx-auto" style="width: 30rem;">
                    <div class="card-header">
                        <div class="card-title">
                            <h2>Add Broker Details</h2>
                        </div>
                    </div>
                    <div class="card-body">
                      <div class="mb-3">
                          <label for="broker-name" class="form-label fw-light text-muted">Name</label>
                          <input type="text" name="broker_name" id="broker-name" class="form-control" value="{{old('broker_name')}}" autofocus>
                          @error('broker_name')
                            <p class="text-danger small">{{$message}}</p>
                          @enderror
                      </div>
                      <div class="mb-3">
                          <label for="contact-no" class="form-label fw-light text-muted">Contact No</label>
                          <input type="text" name="contact_no" id="contact-no" class="form-control" value="{{old('contact_no')}}">
                          @error('contact_no')
                            <p class="text-danger small">{{$message}}</p>
                          @enderror
                      </div>
                      <div class="mb-3">
                        <label for="email-address" class="form-label fw-light text-muted">Email Address</label>
                        <input type="text" name="email_address" id="email-address" class="form-control" value="{{old('email_address')}}">
                        @error('email_address')
                          <p class="text-danger small">{{$message}}</p>
                        @enderror
                    </div>
                    </div>
                    
                    <div class="card-footer">
                      <a href="{{route('index')}}" class="btn btn-secondary btn-sm">Cancel</a>
                      <button type="submit" class="btn btn-success btn-sm">Save</button>

                      @if (session('broker-added'))
                            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                                <button type="button" class="btn-close p-3" data-bs-dismiss="alert" aria-label="Close"></button>
                                <strong>Success! </strong>{{session('broker-added')}}
                            </div>
                        @endif
                    </div>
                </div>
                
            </div>
        </form>
    </div>
</div>
    
@endsection