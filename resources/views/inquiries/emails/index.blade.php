@extends('layouts.app')

@section('title', 'Inquire')

@section('content')
<div class="div mt-5">
    <div class="row">
        <div class="col-auto mx-auto bg-success p-3 round rounded-3">
            <form action="{{route('mail.add')}}" method="post" class="xs-auto">
                @csrf
                <div class="card" style="width: 30rem;">
                    <div class="card-header">
                        <div class="card-title">
                            <h2 >Property Inquiry</h2>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Please add email address:</p>
                    <input type="text" name="email_inquire" id="email-inquire" class="form-control">
                    @error('email_inquire')
                        <p class="tex-danger small">{{$message}}</p>
                    @enderror
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-warning btn-sm">Click To Send Inquiry</button>
                        <button type="buton" role="button" class="btn btn-secondary btn-sm">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

    
@endsection