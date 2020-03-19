@extends('layouts.app')

@section('content')
    <div class="row d-flex justify-content-center mt-5">
        <div class="col-lg-8">
            {!! Form::open(['route'=>'course.store', 'method'=>'POST']) !!}
                <div class="form-group">
                    {{Form::label('name', 'Vak')}}
                    {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Naam'])}}
                    {{Form::label('omschrijving', 'Omschrijving')}}
                    {{Form::textarea('omschrijving', '', ['class' => 'form-control', 'placeholder' => 'Omschrijving'])}}
                    {{Form::label('coordinator', 'Coordinator')}}
                    {!! Form::select('coordinator', $teachers, 'dirk', ['class'=>'form-control', 'placeholder'=>'Kies coördinator']) !!}

{{--                    {!! Form::select('country',['Albania' => 'Albania','Kosovo'=>'Kosovo','Germany'=>'Germany','France'=>'France'],'Kosovo',['class'=>'form-control','placeholder'=>'Select Country']) !!}--}}


                </div>
            {!! Form::submit('Toevoegen', ['class' => 'btn btn-success'] ) !!}
            {!! Form::close() !!}
        </div>
    </div>

@endsection
