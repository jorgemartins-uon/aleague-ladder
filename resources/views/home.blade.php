@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            @include('alerts.success')

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="panel panel-default text-center">
                <div class="panel-heading">A-League Ladder Update</div>

                <div class="panel-body">
                    
                    <div class="row">

                        {!! Form::open(['route' => ['ladder'], 'class' => 'form-horizontal']) !!}
                            @foreach($teams as $team)
                            <div class="form-group{{ $errors->has('team.'.$team->id) ? ' has-error' : '' }}">
                                <label for="team[{{ $team->id }}]" class="col-sm-6 control-label">{{ $team->name }}</label>
                                <div class="col-sm-2">
                                    {!! Form::number('team['.$team->id.']', $team->position, ['min' => '1', 'max' => '10', 'class' => 'form-control', 'id' => 'team['.$team->id.']']) !!}
                                </div>
                            </div>
                            @endforeach
                            <div class="form-group">
                                <div class="col-sm-offset-6 col-sm-2 text-left">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        {!! Form::close() !!}

                    </div>
                </div>

                <div class="panel-heading">Check the <a target="_blank" href="/">ladder</a> in realtime.</div>

            </div>
        </div>
    </div>
</div>
@endsection