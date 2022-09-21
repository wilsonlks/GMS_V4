@extends('layouts.dashboard')


@section('content')


@if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<div class="card-footer text-muted">
            <a href="{{url('receivexml')}}" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Receive Message</a>
            @stop