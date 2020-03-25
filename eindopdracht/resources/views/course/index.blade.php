@extends('layouts.app')

@section('content')
    <div class="row d-flex justify-content-center mt-5">
        <div class="col-lg-12">
            <div class="full-right">
                <h2>Beheer vakken</h2>
            </div>
        </div>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>Nr</th>
            <th>Naam</th>
            <th width="30">
                <a href="{{route('course.create')}}" class="btn btn-success btn-sm">
                    <i class="fas fa-plus"></i>
                </a>
            </th>
        </tr>
        <?php $no=1; ?>
        @foreach($course as $key => $value)
            <tr>
                <td>{{$no++}}</td>
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

@endsection
