@extends('layouts.app')

@section('content')
 
  <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">View Eemploye</h3>
            </div>

             <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> {{$employe->first_name}} {{$employe->last_name}}</strong>

              
              <hr>

              <strong><i class="fa fa-envelope margin-r-5"></i> {{$employe->email}}</strong>

             

              <hr>

              <strong><i class="fa fa-phone margin-r-5"></i> {{$employe->phone}}</strong>

              

              <hr>

                   
               <strong><i class="fa fa-industry margin-r-5"></i> {{$employe->company->name}}</strong>
             
            </div>
            <!-- /.box-header -->
            <!-- form start -->
          
          </div>
    @endsection
