@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="full-right">
                <h2>Beheer vakken</h2>
            </div>
        </div>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>id</th>
            <th>Naam</th>
            <th>Omschrijving</th>
            <th>Coördinator</th>
            <th>
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
                <td>{{$value->omschrijving}}</td>
                <td>{{$value->coordinator}}</td>
                <td>
                    <a class="btn btn-info btn-sm" href="{{route('course.show', $value->id)}}">
                        <i class="fas fa-th-large text-light"></i>
                    </a>
                    <a class="btn btn-primary btn-sm" href="{{route('course.edit', $value->id)}}">
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </table>

@endsection
