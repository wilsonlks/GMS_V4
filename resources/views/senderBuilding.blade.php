@extends('layouts.dashboard')
  <link rel="stylesheet" href="{{asset('css/form.css')}}">

    <meta name="csrf-token" content="{{ csrf_token() }}">

@section('content')
  

<div class="container mt-4 mb-10 d-flex justify-content-center">

  <div class="card px-3 py-4">

  @if ($errors->any())
        <div class="alert alert-danger">
        <strong>Invail input!</strong> something we are problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        </div>
    @endif
  <div class="card-body">

  <div class = "agree-text"> Sender form </div> 
  <p> </p>
  <p> </p>

        <form action="{{url('senderProcess')}}" id="frm-create-course" method="post">
        @csrf
            <div class="form-group">
            <div class="d-flex flex-row">
            <div class="col-sm-10">
                <label class ="radio mr-1"> Department Name :</label></div>
                <div class="col-sm-10">
                <select name="acid">
                @foreach($departments as $departments)
                <option value = "{{ $departments->acid }}"> {{ $departments->acid }}</option>
                @endforeach

</select>
</div> 

            </div> 
            <p> </p>
            <div class="d-flex flex-row">

            <div class="col-sm-10">
                <label for="text"> Language : E-English C-Chinese </label></div>
                <div class="col-sm-10">
                <select name="language">
                <option>E</option>
                <option>C</option>
                </select>
            </div>
                <div class="col-sm-10"><label for="text"></label></div>  
            </div>
            
            <p> </p>

            <div class="col-sm-10">
                <label for="text">Recipient phone number:</label></div>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="recipient"/>
            </div>

            <p> </p>

                <div class="col-sm-10">
                <label for="text"> Message Templates:</label></div>
                <div class="col-sm-10">
                <textarea class="form-control" name="content"></textarea>
            </div>
     
            <div class="col-sm-10">
           <p> </p>
           <button type="submit" class="btn btn-primary">Save draft</button>
            </div>
        </form>
        </div>
        </div>
</div>
</div>
@stop
