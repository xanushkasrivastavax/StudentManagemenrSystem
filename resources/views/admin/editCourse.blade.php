@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Course</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/editcourse/{{$course->id}}">
                        {{ csrf_field() }}
                        {{method_field("PATCH")}}

                        <div class="form-group{{ $errors->has('cname') ? ' has-error' : '' }}">
                            <label for="cname" class="col-md-4 control-label">Course Name</label>

                            <div class="col-md-6">
                                <input id="cname" type="text" class="form-control" name="cname" value="{{$course->cname}}" required autofocus>

                                @if ($errors->has('cname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('duration') ? ' has-error' : '' }}">
                            <label for="duration" class="col-md-4 control-label">Course Duration</label>

                            <div class="col-md-6">
                                <input id="duration" type="text" class="form-control" name="duration" value="{{ $course->duration}}" required>

                                @if ($errors->has('duration'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('duration') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
