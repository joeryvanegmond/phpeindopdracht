{{--@extends('layouts.app')--}}

{{--@section('content')--}}

{{--    <div class="row d-flex justify-content-center mt-5">--}}
{{--        <div class="col-lg-12 d-flex">--}}
{{--            <div class="col-2">--}}
{{--                <div class="pull-left">--}}
{{--                    <a href="{{route('course.index')}}">--}}
{{--                        <i class="fas fa-arrow-left"></i>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="col-8">--}}
{{--                <h2 class="col-6">Toetsen voor {{$courseName}}</h2>--}}
{{--                    <table class="table table-bordered">--}}
{{--                        <tr>--}}
{{--                            <th>Nr</th>--}}
{{--                            <th>Versie</th>--}}
{{--                            <th>Cijfer</th>--}}
{{--                            <th width="30">--}}
{{--                                <a href="{{route('test.create/{id}')}}" class="btn btn-success btn-sm">--}}
{{--                                    <i class="fas fa-plus"></i>--}}
{{--                                </a>--}}
{{--                            </th>--}}
{{--                        </tr>--}}
{{--                        <?php $no=1; ?>--}}
{{--                        @foreach($tests->find($id)->tests()->get() as $key => $value)--}}
{{--                            <tr>--}}
{{--                                <td>{{$no++}}</td>--}}
{{--                                <td>{{$value->versie}}</td>--}}
{{--                                <td>{{$value->cijfer}}</td>--}}

{{--                                <td class="d-flex">--}}
{{--                                    <a class="btn btn-primary btn-sm mr-2" href="{{route('course.edit', $value->id)}}">--}}
{{--                                        <i class="fas fa-pencil-alt"></i>--}}
{{--                                    </a>--}}
{{--                                    {!! Form::open(['method'=>'DELETE','route'=>['course.destroy', $value->id]]) !!}--}}
{{--                                    <button type="submit" class="btn btn-danger btn-sm mr-2">--}}
{{--                                        <i class="fas fa-trash"></i>--}}
{{--                                    </button>--}}
{{--                                    {!! Form::close() !!}--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                        @endforeach--}}
{{--                    </table>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}





{{--        <div class="col-lg-8 d-flex border">--}}
{{--            <div class="pull-left">--}}
{{--                <a href="{{route('course.index')}}">--}}
{{--                    <i class="fas fa-arrow-left"></i>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--            <div class="col">--}}
{{--                <h2>Vak bekijken</h2>--}}
{{--                <div class="form-group">--}}
{{--                    <div class="font-weight-bold">Naam: </div>--}}
{{--                    <div>{{ $course->name }}</div>--}}

{{--                </div>--}}
{{--                <div class="form-group">--}}
{{--                    <div class="font-weight-bold">Omschrijving: </div>--}}
{{--                    <div>{{ $course->name }}</div>--}}
{{--                </div>--}}
{{--                <div class="form-group">--}}
{{--                    <div class="font-weight-bold">Coördinator: </div>--}}
{{--                    <div>--}}
{{--                        {{ $teacher->name }}--}}
{{--                        {{ $teacher->infix }}--}}
{{--                        {{ $teacher->lastname }}--}}
{{--                    </div>--}}
{{--            </div>--}}

{{--            </div>--}}

{{--        </div>--}}
{{--        <div class="row border">--}}
{{--            <div class="col">--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}
