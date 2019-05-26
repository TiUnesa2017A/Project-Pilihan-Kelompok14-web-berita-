@extends('multiauth::layouts.app') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ ucfirst(config('multiauth.prefix')) }} Dashboard</div>

                <div class="card-body">
                @include('multiauth::message')
                     You are logged in to {{ config('multiauth.prefix') }} side!
                </div>
                <div class="card-footer">
                    <p class="float-right"><a href="{{route('manageDashboard')}}" class="badge badge-primary" style="padding: 7px; font-size: 14px;">Start</a> here to manage the site as super admin</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection