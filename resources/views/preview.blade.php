@extends('layouts.dashboard')


@section('content')

<div class="card">
<div class="card-header">
@if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif


    <h1>Message preview</h1>
</div>
<div class="card-body">
    <ul>
        @foreach ($previews as $preview)
            <li> Department: {{ $preview -> acid }}</li>
            <li> Message text: {{ $preview -> content }}</li>
            <li>Recipient phone Number: {{ $preview -> recipient }}</li>
            

            
                 @endforeach
</ul><div class="card-footer text-muted">
            <a href="{{url('sendMessage')}}" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Send out message</a>
       
</div>
    
</div>
</div>
@stop
