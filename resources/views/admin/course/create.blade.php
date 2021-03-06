@extends('admin.master')
@section('title') Course @endsection
@section('style')
<link href="{{asset('css/jquery-ui.min.css')}}" rel="stylesheet">
@endsection
@section('content')

<!-- Main content -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Course Create</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/course/create') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Course Title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required autofocus placeholder="Course Title">

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('lecturer') ? ' has-error' : '' }}">
                            <label for="lecturer" class="col-md-4 control-label">Lecturer</label>

                            <div class="col-md-6">
                                <input class="form-control" type="text" value="{{Auth::user()->name}}" readonly>
                                <input type="hidden" name="lecturer_id" value="{{Auth::user()->id}}">

                                @if ($errors->has('lecturer'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lecturer') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('category_id') ? ' has-error' : '' }}">
                            <label for="category_id" class="col-md-4 control-label">Category</label>

                            <div class="col-md-6">
                                <select name="category_id" class="form-control">
                                    <option value="">Course Category</option>
                                    @foreach($subcategory as $subcategories)
                                    <option value="{{$subcategories->id}}">{{$subcategories->name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('category_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                
                                <textarea class="form-control" name="description">{{old('description')}}</textarea>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('start_date') ? ' has-error' : '' }}">
                            <label for="start_date" class="col-md-4 control-label">Start Date</label>

                            <div class="col-md-6">
                                <input id="datepicker" type="text" class="form-control" name="start_date" required>

                                @if ($errors->has('start_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('start_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('duration') ? ' has-error' : '' }}">
                            <label for="duration" class="col-md-4 control-label">Duration (Days)</label>

                            <div class="col-md-6">
                                <input id="duration" type="text" class="form-control" name="duration" value="" required>

                                @if ($errors->has('duration'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('duration') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('course_fee') ? ' has-error' : '' }}">
                            <label for="course_fee" class="col-md-4 control-label">Course Fee</label>

                            <div class="col-md-4">
                                <input id="course_fee" type="text" class="form-control" name="course_fee" value="" required>

                                @if ($errors->has('course_fee'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('course_fee') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <label>Kyats</label>
                        </div>

                        <div class="form-group {{ $errors->has('img') ? ' has-error' : '' }}">
                            <label for="img" class="col-md-4 control-label">Course Image</label>

                            <div class="col-md-6">
                                <input type="file" class="image" name="img" value="" required>

                                @if ($errors->has('img'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('img') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row-->
</div>
@endsection
@section('script')
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/jquery-ui.min.js')}}"></script>
<script>
        $(function() {
            $('#datepicker').datepicker({ 
                dateFormat: 'yy-mm-dd',
                changeMonth: true,
                changeYear: true
            });
        });
    </script>
@endsection