
@extends('layouts.app')

@section('content')

   <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Employes List</h3>
              <a style="float: right;" class="btn btn-primary btn-sm" href="{{ route('add.employes') }}">
                                <i class="fa fa-folder">
                                </i>
                                Add New Employe
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
                  <th style="width: 40px">Full Name</th>
                  <th style="width: 40px">Phone</th>
                  <th style="width: 40px">email</th>
                  <th style="width: 40px">compnay</th>
                  <th style="width: 40px">Action</th>
                </tr>
           
              <?php
            
              foreach ($employes as  $employ) { 


                ?>
                
             <tr>
                  <td>{{$employ->id}}</td>
                  <td><?= $employ->first_name.' '. $employ->last_name ?></td>
                  <td><?= $employ->phone ?></td>
                  <td><?= $employ->email ?></td>
                  <td><?= $employ->company->name ?></td>
                 
                  
                   <td class="project-actions text-right">
                              <a class="btn btn-info btn-sm" href="{{ route('show.employes' , ['id' => $employ->id]) }}">
                                <i class="fa fa-pencil-alt">
                                </i>
                                View
                            </a>
                            <a class="btn btn-info btn-sm" href="{{ route('edit.employes' , ['id' => $employ->id]) }}">
                                <i class="fa fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                            <a class="btn btn-danger btn-sm" href="{{ route('delete.employes' , ['id' => $employ->id]) }}">
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
            <div class="box-footer clearfix">
             {{ $employes->links() }}
            </div>
          </div>
          <!-- /.box -->

         
            <!-- /.box-body -->
          </div>
    @endsection