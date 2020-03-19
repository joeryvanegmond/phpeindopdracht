@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            {!! Form::open(['route'=>'course.store', 'method'=>'POST']) !!}
                <div class="form-group">
                    {{Form::label('name', 'Vak')}}
                    {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Naam'])}}
                    {{Form::label('omschrijving', 'Omschrijving')}}
                    {{Form::textarea('omschrijving', '', ['class' => 'form-control', 'placeholder' => 'Omschrijving'])}}
                    {{Form::label('coordinator', 'Coordinator')}}
                    {{Form::select('coordinator', $teachers)}}
                </div>
            {!! Form::submit('Toevoegen', ['class' => 'btn btn-success'] ) !!}
            {!! Form::close() !!}
        </div>
    </div>

@endsection
