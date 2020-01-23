 @extends('layouts.app')

@section('content') 
 
  <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Company</h3>
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
            <form role="form" enctype="multipart/form-data" method="post" action="{{ route('create.company') }}">
              <div class="box-body">
                <div class="form-group">
                  <label for="cname">Name</label>
                  <input type="text" class="form-control @error('title') is-invalid @enderror" id="cname" name="cname" placeholder="Enter Name">
                </div>

                <div class="form-group">
                  <label for="ceamil">Email </label>
                  <input type="email" class="form-control" id="ceamil" name="cemail" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="clogo">Logo upload</label>
                  <input type="file" name="clogo" id="clogo">

                  <p class="help-block">Example block-level help text here.</p>
                </div>
                <div class="form-group">
                  <label for="cwebsite">Website</label>
                  <input type="text" class="form-control" id="cwebsite" name="cwebsite" placeholder="Enter Name">
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