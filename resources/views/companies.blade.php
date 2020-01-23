@extends('layouts.app')

@section('content')
   <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Companies List</h3>
              <a style="float: right;" class="btn btn-primary btn-sm" href="{{ route('add.company') }}">
                                <i class="fa fa-folder">
                                </i>
                                Add New Company
                            </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
 @if (\Session::get('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div>
        @endif 
                           <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th style="width: 40px">Name</th>
                  <th style="width: 40px">Email</th>
                  <th style="width: 40px">Website</th>
                  <th style="width: 40px">Logo</th>
                  <th style="width: 40px">Action</th>
                </tr>
           
              <?php

              foreach ($compines as  $company) { ?>
                
             <tr>
                    <td><?= $company->id ?></td>
                  <td><?= $company->name ?></td>
                  <td><?= $company->email ?></td>
                  <td>
                    <?= $company->website ?>
                  </td>
                  <td><img style="width: 150px" src="<?= url( URL::asset('/public/assets/'.$company->logo)) ?>"></td>
                   <td class="project-actions text-right">
                            
                            <a class="btn btn-info btn-sm" href="{{ route('show.company' , ['id' => $company->id]) }}">
                                <i class="fa fa-pencil-alt">
                                </i>
                                View
                            </a>
                            <a class="btn btn-info btn-sm" href="{{ route('edit.company' , ['id' => $company->id]) }}">
                                <i class="fa fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                            <a class="btn btn-danger btn-sm" href="{{ route('delete.company' , ['id' => $company->id]) }}">
                                <i class="fa fa-trash">
                                </i>
                                Delete
                            </a>
                        </td>
                </tr>
              <?php }

              ?>
   
               
              </table>


            </div>
            <!-- /.box-body -->
            <div style="text-align: right" class="box-footer clearfix">
             {{ $compines->links() }}
            </div>
          </div>
          <!-- /.box -->

         
            <!-- /.box-body -->
          </div>
@endsection