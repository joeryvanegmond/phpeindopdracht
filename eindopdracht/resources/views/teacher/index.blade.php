@extends('layouts.app')

@section('content')
    <div class="row d-flex justify-content-center mt-5">
        <div class="col-lg-12">
            <div class="full-right">
                <h2>Beheer docenten</h2>
            </div>
        </div>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>Nr</th>
            <th>Naam</th>
            <th width="30">
                <a href="{{route('teacher.create')}}" class="btn btn-success btn-sm">
                    <i class="fas fa-plus"></i>
                </a>
            </th>
        </tr>
        <?php $no=1; ?>
        @foreach($teacher as $key => $value)
            <tr>
                <td>{{$no++}}</td>
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

@endsection
