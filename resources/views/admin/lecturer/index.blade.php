@extends('admin.master')
@section('style')
<style type="text/css">
        .status_view
       {
        
        background: #4CAF50;
        padding:0px 10px 0px 10px;
        color:#fff;
        border-radius: 5px;

       }

       .status_edit
       {
        background: #418BCA;
        padding:0px 15px 0px 15px;
        color:#fff; 
        border-radius: 5px;
       }

     .status_delete
       {
        background: #ed5555;
        padding:0px 10px 0px 10px;
        color:#fff; 
        border-radius: 5px;
       }
       a label{
        cursor: pointer;
       }
       .not-active label{
        cursor: not-allowed;

       }
    </style>
@endsection
@section('content')
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Course List <small></small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
                <!-- /.row -->

                <section class="content paddingleft_right15">
                <div class="row">
                    <div class="panel panel-primary ">
                        <div class="panel-heading clearfix">
                            <h4 class="panel-title pull-left"> <i class="livicon" data-name="users" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                            Course List
                            </h4>
                            <div class="pull-right">
                                
                            </div>
                        </div>
                        <br/>
                        <div class="panel-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th>NRC</th>
                                        <th>Gender</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($lecturer as $lecturers)
                                    <tr>
                                        <td>{{$lecturers->id}}</td>
                                        <td>{{$lecturers->name}}</td>
                                        <td>{{$lecturers->email}}</td>
                                        <td>{{$lecturers->address}}</td>
                                        <td>{{$lecturers->phone}}</td>
                                        <td>{{$lecturers->nrc}}</td>
                                        <td>{{$lecturers->gender}}</td>
                                        <td>
                                        @if($lecturers->status == 0)
                                        <a class="btn btn-success" href="{{URL::to('admin/lecturer/'.$lecturers->id.'/confirm')}}">
                                            Confirm
                                        </a>
                                        <a class="btn btn-danger" href="{{URL::to('admin/lecturer/'.$lecturers->id.'/delete')}}">
                                            Deny
                                        </a>
                                        @elseif($lecturers->status == 1)
                                        <label class="status_view">Confirmed</label>
                                        @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                </section>
            </div>
        </div>
        <!-- /#page-wrapper -->
@endsection

    