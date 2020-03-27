@extends('layouts.app')

@section('content')
    <div class="row d-flex justify-content-center mt-5">
        <div class="col-lg-12 d-flex">
            <div class="col-2">
                <div class="pull-left">
                    <a href="{{route('admin')}}">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                </div>
            </div>

            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        Vak aanmaken
                    </div>
                    <div class="card-body mw-100">

                        {!! Form::open(['route'=>'course.store', 'method'=>'POST']) !!}
                        <div class="form-group">
                            {{Form::label('name', 'Vak naam')}}
                            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Naam'])}}
                        </div>

                        <div class="form-group">
                            {{Form::label('omschrijving', 'Omschrijving')}}
                            {{Form::textarea('omschrijving', '', ['class' => 'form-control', 'placeholder' => 'Omschrijving'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('studiepunten', 'Studiepunten')}}
                            {{Form::number('studiepunten', 'value', ['class'=>'form-control', 'placeholder'=>'Vul te behalen studiepunten in'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('periode', 'Periode')}}
                            {{Form::number('periode', 'value', ['class'=>'form-control', 'placeholder'=>'Vul een periode in'])}}
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
        </div>
    </div>

@endsection
