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
                        Beheer vakken
                    </div>
                    <div class="card-body">
                        <table class="table  mw-100">
                            <tr>
                                <th>Naam</th>
                                <th width="30">
                                    <a href="{{route('course.create')}}" class="btn btn-success btn-sm">
                                        <i class="fas fa-plus"></i>
                                    </a>
                                </th>
                            </tr>
                            @foreach($course as $key => $value)
                                <tr>
                                    <td>{{$value->name}}</td>
                                    <td class="d-flex">
                                        <a class="btn btn-info btn-sm mr-2" href="{{route('course.show', $value->id)}}">
                                            <i class="fas fa-eye text-light"></i>
                                        </a>
                                        <a class="btn btn-primary btn-sm mr-2" href="{{route('course.edit', $value->id)}}">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        {!! Form::open(['method'=>'DELETE','route'=>['course.destroy', $value->id]]) !!}
                                        <button type="submit" class="btn btn-danger btn-sm mr-2">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        {!! Form::close() !!}
                                        <a class="btn btn-success btn-sm " href="{{url("/test/{$value->id}")}}">
                                            <i class="fas fa-file-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>




@endsection
