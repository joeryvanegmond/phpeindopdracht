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
                <h2>Toets aanmaken</h2>
                {!! Form::open(['route'=>'test.store', 'method'=>'POST']) !!}
                {{Form::hidden('id', $id)}}
                {{Form::hidden('version', $date)}}
{{--                <div class="form-group d-flex flex-column">--}}
{{--                    {{Form::label('deadline', 'Deadline')}}--}}
{{--                    {{Form::date('deadline', \Carbon\Carbon::now())}}--}}
{{--                </div>--}}
{{--                <div class="form-group d-flex flex-column">--}}
{{--                    {{Form::label('', 'Tag')}}--}}
{{--                    {!! Form::select('tag', $tags, ['class'=>'form-control', 'placeholder'=>'Kies tag']) !!}--}}
{{--                </div>--}}
                <div class="form-group d-flex flex-column">
                    {{Form::label('cijfer', 'Cijfer')}}
                    {{Form::number('cijfer', 'value', ['class'=>'form-control', 'placeholder'=>'Voer cijfer in'])}}
                </div>
                {!! Form::submit('Toevoegen', ['class' => 'btn btn-success'] ) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
