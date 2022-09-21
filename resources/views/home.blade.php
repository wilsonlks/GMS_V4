
@extends('layouts.dashboard')

@section('content')


<div class="container">



    <p style = "font-size:18px ; font-weight:bold;">Select the Portal</p>

            <a href="{{url('senderPages')}}" class="btn btn-secondary btn-lg active" color="red" role="button" aria-pressed="true"> 3 Macau Messaging Portal</a>

        </br>
    </br>
       
            <a href="#" class="btn btn-success btn-lg active " role="button" aria-pressed="true">CTM Messaging Portal</a>

              </br>
    </br>
       
            <a href="#" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">China Telecom Messaging Portal</a>
       
</div>
@stop
    





