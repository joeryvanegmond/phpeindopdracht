@extends('layouts.app')

@section('content')
<?php $courses = App\Course::all(); $teachers = App\Teacher::all(); ?>
<div class="container">
    <div class="row justify-content-center m-4">
        <div class="col-12 m-2 ">
            <div class="card shadow">
                <div class="card-body p-0">
                    <table class="table mw-100">
                        <thead class="thead-dark">
                            <tr>
                                <th><i class="fas fa-book text-white mr-2"></i>Beheer vakken</th>
                                <th width="30">
                                    <a href="{{route('course.create')}}" class="btn btn-success btn-sm pull-right">
                                        <i class="fas fa-plus"></i>
                                    </a>
                                </th>
                            </tr>
                        </thead>
                        @foreach($courses as $key => $value)
                            <tr>
                                <td>{{$value->name}}</td>
                                <td class="d-flex">
                                    <a class="btn btn-success btn-sm mr-2" href="{{url("/test/{$value->id}")}}">
                                        toets
                                    </a>
                                    <a class="btn btn-primary btn-sm mr-2" href="{{route('course.edit', $value->id)}}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    {!! Form::open(['method'=>'DELETE','route'=>['course.destroy', $value->id]]) !!}
                                    <button type="submit" class="btn btn-danger btn-sm mr-2">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>

        <div class="col-12 m-2">
            <div class="card shadow">
                <div class="card-body p-0">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th><i class="fas fa-users text-white mr-2"></i>Beheer docenten</th>
                                <th width="30">
                                    <a href="{{route('teacher.create')}}" class="btn btn-success btn-sm pull-right">
                                        <i class="fas fa-plus"></i>
                                    </a>
                                </th>
                            </tr>
                        </thead>
                        <?php $no=1; ?>
                        @foreach($teachers as $key => $value)
                            <tr>
                                <td>
                                    {{$value->name}}
                                    {{$value->infix}}
                                    {{$value->lastname}}
                                </td>
                                <td class="d-flex">
                                    <a class="btn btn-info btn-sm mr-2" href="{{route('teacher.show', $value->id)}}">
                                        <i class="fas fa-eye text-light"></i>
                                    </a>
                                    <a class="btn btn-primary btn-sm mr-2" href="{{route('teacher.edit', $value->id)}}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    {!! Form::open(['method'=>'DELETE','route'=>['teacher.destroy', $value->id]]) !!}
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>

        <div class="col-12 m-2">
            <div class="card shadow">
                <div class="card-body p-0">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th><i class="fas fa-users text-white mr-2"></i>Modules</th>
                            </tr>
                        </thead>
                    </table>

                    <div class="col-12 d-flex justify-content-between flex-wrap">
                        @foreach($courses as $key => $value)
                            <div class="col-5 d-flex border m-2 p-4 rounded">
                                <div class="col d-flex flex-column">
                                   <h4><strong>{{ $value->name }}</strong></h4>
                                    <span><strong>Omschrijving:</strong> {{$value->omschrijving}}</span>
                                </div>

                                <div class="col d-flex flex-column">
                                    <span><strong>Coördinator: </strong>
                                        @if($value->coordinator == null)
                                            ?
                                            @else
                                            {{ $teachers->find($value->coordinator)->name }}
                                        @endif
                                    </span>
                                    <div>
                                        <strong>Docenten:</strong>
                                        @foreach($value->teachers()->get() as $key => $value)
                                            <div>
                                                <strong> > </strong> {{$value->name}}
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
