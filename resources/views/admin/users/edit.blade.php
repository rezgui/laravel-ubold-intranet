@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/') }}"><i class="fe-user-plus"></i><span> @lang('templates.user control') </span></a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.users.index') }}"> @lang('templates.users') </a>
                        </li>
                        <li class="breadcrumb-item active">@lang('templates.edit user')</li>
                    </ol>
                </div>
                <h4 class="page-title">@lang('templates.edit user')</h4>
            </div>
        </div>
    </div>
    
    <div class="card">
        <div class="pt-4 pl-4">
            <a href="{{ route('admin.users.index') }}"><i class="mdi mdi-arrow-left-drop-circle"></i> @lang('templates.back to users') </a>
        </div>
        <div class="card-body">
            {!! Form::model($user, ['method' => 'PUT', 'route' => ['admin.users.update', $user->id]]) !!}
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="form-group row mb-3">
                        {!! Form::label('roles', trans('templates.roles'), ['class' => 'col-md-3']) !!}
                        <div class="col-md-9">
                            {!! Form::select('roles[]', $roles, old('roles') ? old('roles') : $user->roles()->pluck('name', 'name'), ['id' => 'roles', 'class' => 'form-control']) !!}
                            @if($errors->has('roles'))
                                <strong class="text-danger">{{ $errors->first('roles') }}</strong>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        {!! Form::label('name', trans('templates.name'), ['class' => 'col-md-3']) !!}
                        <div class="col-md-9">
                            {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                            @if($errors->has('name'))
                                <strong class="text-danger">{{ $errors->first('name') }}</strong>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        {!! Form::label('email', trans('templates.email'), ['class' => 'col-md-3']) !!}
                        <div class="col-md-9">
                            {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => '']) !!}
                            @if($errors->has('email'))
                                <strong class="text-danger">{{ $errors->first('email') }}</strong>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        {!! Form::label('password', trans('templates.password'), ['class' => 'col-md-3']) !!}
                        <div class="col-md-9">
                            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '']) !!}
                            @if($errors->has('password'))
                                <strong class="text-danger">{{ $errors->first('password') }}</strong>
                            @endif
                        </div>
                    </div>

{{--                    <div class="form-group row mb-3">--}}
{{--                        {!! Form::label('title', trans('templates.title'), ['class' => 'col-md-3']) !!}--}}
{{--                        <div class="col-md-9">--}}
{{--                            {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => '']) !!}--}}
{{--                            @if($errors->has('title'))--}}
{{--                                <strong class="text-danger">{{ $errors->first('title') }}</strong>--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="form-group row mb-3">--}}
{{--                        {!! Form::label('rank', trans('templates.rank'), ['class' => 'col-md-3']) !!}--}}
{{--                        <div class="col-md-9">--}}
{{--                            {!! Form::text('rank', old('rank'), ['class' => 'form-control', 'placeholder' => '']) !!}--}}
{{--                            @if($errors->has('rank'))--}}
{{--                                <strong class="text-danger">{{ $errors->first('rank') }}</strong>--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <div class="form-group mb-0 justify-content-end row">
                        <div class="col-9">
                            {!! Form::submit(trans('templates.save change user'), ['class' => 'btn btn-danger col-12']) !!}
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('javascript')
    <script>
        $("document").ready(function(){
            init();
            
            $("#roles").on("change", function(e){
                var roleName = $("#roles").val();
                showCustomer(roleName);
            });
        });

        function showCustomer(roleName){
            if (roleName == "User"){
                $("#customerDiv").show();
            }else{
                $("#customerDiv").hide();
            }
        }

        function init(){
            var roleName = $("#roles").val();
            showCustomer(roleName);
        }

        function showCustomer(roleName){
            if (roleName == "User"){
                $("#customerDiv").show();
            }else{
                $("#customerDiv").hide();
            }
        }
    </script>
@endsection
