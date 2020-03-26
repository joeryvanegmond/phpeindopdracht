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
                        Toets aanmaken
                    </div>
                    <div class="card-body">

                        {!! Form::open(['route'=>'test.store', 'method'=>'POST']) !!}
                        {{Form::hidden('id', $id)}}
                        {{Form::hidden('version', $date)}}
                        <div class="form-group d-flex flex-column">
                            {{Form::label('cijfer', 'Cijfer')}}
                            {{Form::number('cijfer', 'value', ['class'=>'form-control', 'placeholder'=>'Voer cijfer in'])}}
                        </div>
                        {!! Form::submit('Toevoegen', ['class' => 'btn btn-success'] ) !!}
                        {!! Form::close() !!}
                    </div>
                </div>



            </div>
        </div>
    </div>
@endsection
