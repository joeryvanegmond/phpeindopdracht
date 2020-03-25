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

                    <div class="col-12 d-flex justify-content-center flex-wrap">
                        @foreach($courses as $key => $value)
                            <div class="col-5 d-flex border m-2 p-4 rounded">
                                <div class="col d-flex flex-column">
                                   <h4><strong>{{ $value->name }}</strong></h4>
                                    <span><strong>Omschrijving:</strong> {{$value->omschrijving}}</span>
                                </div>

                                <div class="col d-flex flex-column">
                                    <span><strong>Coördinator: </strong>
                                        @if($value->coordinator == null)
                                            Onbekend
                                            @else
                                            {{ $teachers->find($value->coordinator)->name }}
                                        @endif

                                    </span>
                                    <div>
                                        <strong>Docenten:</strong>
                                        @foreach($value->teachers()->get() as $key => $value)
                                            <div>
                                                {{$key +1}} {{$value->name}}
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






















{{--        <div class="col-12">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">Admin dashboard</div>--}}
{{--                <div class="card-body">--}}
{{--                    <div class="col-12 d-flex justify-content-between">--}}
{{--                        <div class="col-8">--}}
{{--                            <h3>Modules</h3>--}}

{{--                            @foreach($courses as $key => $value)--}}
{{--                                <div class="card m-4">--}}
{{--                                    <div class="card-header">--}}
{{--                                        <div class="d-flex justify-content-between">--}}
{{--                                            <div class="pull-left">--}}
{{--                                                {{$value->name}}--}}
{{--                                            </div>--}}
{{--                                            <div class="d-flex">--}}
{{--                                                <a class="btn btn-secondary btn-sm" href="{{route('course.edit', $value->id)}}"><i class="fas fa-pencil-alt text-white"></i></a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                    </div>--}}
{{--                                    <div class="card-body">--}}
{{--                                        <div class="d-flex">--}}
{{--                                            <div class="col-4 d-flex flex-column">--}}
{{--                                                <div>{{$value->omschrijving}}</div>--}}

{{--                                            </div>--}}
{{--                                            <div class="col-8 d-flex flex-column">--}}
{{--                                               <div class="col-4">--}}
{{--                                                   <div class="col-4">--}}
{{--                                                       Coördinator:--}}
{{--                                                   </div>--}}
{{--                                                   <div class="col-4">--}}
{{--                                                       {{$teachers->find($value->coordinator)->name }}--}}
{{--                                                   </div>--}}
{{--                                               </div>--}}

{{--                                                <div class="col-4">--}}
{{--                                                    <div class="col-4">--}}
{{--                                                        <div>Docenten:</div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-4">--}}
{{--                                                        <div>--}}
{{--                                                            @foreach($value->teachers()->get() as $key => $value)--}}
{{--                                                                {{$value->name}}--}}
{{--                                                            @endforeach--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}

{{--                        <div class="col-4">--}}
{{--                            <a class="pull-right btn btn-primary mr-2" href="{{route("course.index")}}"><i class="fas fa-book text-white"></i></a>--}}
{{--                            <a class="pull-right  btn btn-primary mr-2" href="{{route("teacher.index")}}"><i class="fas fa-users text-white"></i></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}



{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
@endsection
