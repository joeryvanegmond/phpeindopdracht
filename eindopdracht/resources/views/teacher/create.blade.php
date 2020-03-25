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
                        Docent aanmaken
                    </div>
                    <div class="card-body">
                        {!! Form::open(['route'=>'teacher.store', 'method'=>'POST']) !!}
                        <div class="form-group">
                            {{Form::label('name', 'Voornaam')}}
                            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Voornaam'])}}
                        </div>

                        <div class="form-group">
                            {{Form::label('infix', 'Tussenvoegsel')}}
                            {{Form::text('infix', '', ['class' => 'form-control', 'placeholder' => 'Tussenvoegsel'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('lastname', 'Achternaam')}}
                            {{Form::text('lastname', '', ['class' => 'form-control', 'placeholder' => 'Achternaam'])}}
                        </div>
                        <div class="form-group d-flex flex-column mt-4">
                            <div>
                                <div class="h5">Welk(e) vak(ken) geeft de docent?</div>
                            </div>
                            @if($courses->count() > 0)
                                @foreach($courses as $key => $value)
                                    <div>
                                        {!! Form::checkbox('course_array[]', $value->id) !!}
                                        {{Form::label('', $value->name)}}
                                    </div>
                                @endforeach
                            @else
                                <p>geen vakken beschikbaar</p>
                            @endif
                        </div>
                        {!! Form::submit('Toevoegen', ['class' => 'btn btn-success'] ) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
