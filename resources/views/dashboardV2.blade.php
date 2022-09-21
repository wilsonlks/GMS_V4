
@extends('layouts.dashboard')

@section('content')

<div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3> {{$Senders}} <sup style="font-size: 20px">%</sup></h3>
    
                <p>Senders Draft</p>
              </div>
              <div class="icon">
                <i class="fas fa-box-open"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>




@stop
    
