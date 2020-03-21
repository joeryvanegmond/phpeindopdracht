@extends('layouts.app')

@section('content')
    <div class="row d-flex justify-content-center mt-5">
        <div class="col-lg-12 d-flex">
            <div class="col-2">
                <div class="pull-left">
                    <a href="{{route('course.index')}}">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                </div>
            </div>

            <div class="col-8">
                <h2>Aanmaken</h2>
                {!! Form::open(['route'=>'course.store', 'method'=>'POST']) !!}
                    <div class="form-group">
                        {{Form::label('name', 'Vak')}}
                        {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Naam'])}}
                    </div>

                    <div class="form-group">
                        {{Form::label('omschrijving', 'Omschrijving')}}
                        {{Form::textarea('omschrijving', '', ['class' => 'form-control', 'placeholder' => 'Omschrijving'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('coordinator', 'Coordinator')}}
                        {!! Form::select('coordinator', $teachers, '', ['class'=>'form-control', 'placeholder'=>'Kies coördinator']) !!}
                    </div>
                {!! Form::submit('Toevoegen', ['class' => 'btn btn-success'] ) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection
