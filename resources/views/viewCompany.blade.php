@extends('layouts.app')

@section('content')
 
  <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">View Company</h3>
            </div>

             <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> {{$company->name}}</strong>

              
              <hr>

              <strong><i class="fa fa-envelope margin-r-5"></i> {{$company->email}}</strong>

             

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> {{$company->website}}</strong>

              

              <hr>

                   <img src="{{ url( URL::asset('/public/assets/'.$company->logo))}}">

             
            </div>
            <!-- /.box-header -->
            <!-- form start -->
          
          </div>
    @endsection
