@extends('layouts.app')

@section('content')

  <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Employe</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
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
            <form role="form" enctype="multipart/form-data" method="post" action="{{ route('update.employes' , ['id' => $employe->id]) }}">
              <div class="box-body">
                <div class="form-group">
                  <label for="fname">First Name</label>
                  <input type="text" class="form-control @error('fname') is-invalid @enderror" id="fname" value="{{$employe->first_name}}" name="fname" placeholder="First Name">
                </div>

                <div class="form-group">
                  <label for="lname">Last Name</label>
                  <input type="text" class="form-control @error('lname') is-invalid @enderror" id="lname" value="{{$employe->last_name}}"  name="lname" placeholder="Last Name">
                </div>
                  <div class="form-group">
                  <label for="lname">Select Company</label>
                  <select name="company_id" class="form-control @error('company_id') is-invalid @enderror">
                    
                <?php
                foreach ($companies as $company) {

  $slected = $company->id  == $employe->company_id ? "selected":'';
                 ?>
                      <option  value="{{$company->id}}"  {{$slected }}>{{$company->name}}</option>
                <?php }
                ?>
                   
                  </select>
                </div>
                  
                <div class="form-group">
                  <label for="email">Email </label>
                  <input type="email" class="form-control" id="email" value="{{$employe->email}}" name="email" placeholder="Enter email">
                </div>
                  <div class="form-group">
                  <label for="phone">Phone</label>
                  <input type="text" class="form-control @error('phone') is-invalid @enderror" value="{{$employe->phone}}" id="phone" name="phone" placeholder="Phone number">
                </div>
               
                
              </div>
              <!-- /.box-body -->
              <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>


            </form>
          </div>
  @endsection