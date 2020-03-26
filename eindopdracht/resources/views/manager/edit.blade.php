@extends('layouts.app')

@section('content')
    <div class="row d-flex justify-content-center mt-5">
        <div class="col-lg-12 d-flex">
            <div class="col-2">
                <div class="pull-left">
                    <a href="{{url('manager')}}">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                </div>
            </div>

            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        Beheer toets
                    </div>
                    <div class="card-body">
                        {!! Form::model($test, ['route'=>['test.update', $test->id], 'method'=>'PATCH']) !!}
                        <div class="form-group d-flex flex-column">
                            {{form::hidden('type', "deadline")}}
                            <div class="form-group d-flex flex-column">
                                {{Form::label('deadline', 'Deadline')}}
                                {{Form::date('deadline', \Carbon\Carbon::now())}}
                            </div>
                            <div class="form-group d-flex flex-column">
                                {{Form::label('', 'Tag')}}
                                {!! Form::select('tag', $tags, $test->tag, ['class'=>'form-control', 'placeholder'=>'Kies tag']) !!}
                            </div>
                        </div>
                        {!! Form::submit('Opslaan', ['class' => 'btn btn-success'] ) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
