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
                <h2>Toets wijzigen</h2>
                @dd($test)
                {!! Form::model($test, ['route'=>['test.update', $test->id], 'method'=>'PATCH']) !!}
                {!! Form::open(['route'=>'test.update', 'method'=>'POST']) !!}
{{--                {{Form::hidden('id', $test->id)}}--}}
{{--                {{Form::hidden('version', $test->version)}}--}}
{{--                <div class="form-group d-flex flex-column">--}}
{{--                    {{Form::label('cijfer', 'Cijfer')}}--}}
{{--                    {{Form::number('cijfer', $test->cijfer, 'value', ['class'=>'form-control', 'placeholder'=>'Voer cijfer in'])}}--}}
{{--                </div>--}}
{{--                {!! Form::submit('Wijzigen', ['class' => 'btn btn-success'] ) !!}--}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
