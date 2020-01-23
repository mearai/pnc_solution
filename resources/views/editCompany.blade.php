@extends('layouts.app')

@section('content')

  <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Company</h3>
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
            <form role="form" enctype="multipart/form-data" method="post" action="{{ route('update.company' , ['id' => $company->id]) }}">
              <div class="box-body">
                <div class="form-group">
                  <label for="cname">Name</label>
                  <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ $company->name}}" id="cname" name="cname" placeholder="Enter Name">
                </div>

                <div class="form-group">
                  <label for="ceamil">Email </label>
                  <input type="email" class="form-control" id="ceamil" value="{{ $company->email}}" name="cemail" placeholder="Enter email">
                </div>
                <div class="form-group">
                  
                  <label for="clogo">Logo upload</label>
                  <input type="file" name="clogo" id="clogo">
                  <img src="{{ url( URL::asset('/public/assets/'.$company->logo))}}">
                  <p class="help-block">Example block-level help text here.</p>
                </div>
                <div class="form-group">
                  <label for="cwebsite">Website</label>
                  <input type="text" class="form-control" value="{{ $company->website}}" id="cwebsite" name="cwebsite" placeholder="Enter Name">
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