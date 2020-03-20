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
                <h2>Bewerken</h2>
                    {!! Form::model($course, ['route'=>['course.update', $course->id], 'method'=>'PATCH']) !!}
                <div class="form-group">
                    {{Form::label('name', 'Vak')}}
                    {{Form::text('name', $course->name, ['class' => 'form-control', 'placeholder' => 'Naam'])}}
                </div>
                <div class="form-group">
                    {{Form::label('omschrijving', 'Omschrijving')}}
                    {{Form::textarea('omschrijving', $course->omschrijving, ['class' => 'form-control', 'placeholder' => 'Omschrijving'])}}
                </div>
                <div class="form-group">
                    {{Form::label('coordinator', 'Coordinator')}}
                    {!! Form::select('coordinator', $teachers, $course->coordinator, ['class'=>'form-control', 'placeholder'=>'Kies coördinator']) !!}
                </div>
                {!! Form::submit('Wijzigen', ['class' => 'btn btn-success'] ) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
