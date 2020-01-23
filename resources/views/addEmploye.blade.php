@extends('layouts.app')

@section('content')
 
  <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Eemploye</h3>
            </div>

             @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        @endif

        @if (\Session::get('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div>
        @endif 
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" enctype="multipart/form-data" method="post" action="{{ route('create.employes') }}">
              <div class="box-body">
                <div class="form-group">
                  <label for="fname">First Name</label>
                  <input type="text" class="form-control @error('fname') is-invalid @enderror" id="fname" name="fname" placeholder="First Name">
                </div>

                <div class="form-group">
                  <label for="lname">Last Name</label>
                  <input type="text" class="form-control @error('lname') is-invalid @enderror" id="lname" name="lname" placeholder="Last Name">
                </div>
                  <div class="form-group">
                  <label for="lname">Select Company</label>
                  <select name="company_id" class="form-control @error('company_id') is-invalid @enderror">
                    
                <?php
                foreach ($companies as $company) { ?>
                      <option value="{{$company->id}}">{{$company->name}}</option>
                <?php }
                ?>
                   
                  </select>
                </div>
                  
                <div class="form-group">
                  <label for="email">Email </label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                </div>
                  <div class="form-group">
                  <label for="phone">Phone</label>
                  <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Phone Number">
                </div>
               
                
              </div>
              <!-- /.box-body -->
              <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>


            </form>
          </div>
    @endsection
