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
                        Toetsen voor {{$courseName}}
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless">
                            <tr>
                                <th>Versie</th>
                                <th>Cijfer</th>
                                <th width="30">
                                    @if($duplicates == 0)
                                        <a href="{{url("/test/create/{$id}")}}" class="btn btn-success btn-sm">
                                            <i class="fas fa-plus"></i>
                                        </a>
                                    @else
                                        <div href="" class="btn btn-secondary btn-sm">
                                            <i class="fas fa-plus"></i>
                                        </div>
                                    @endif
                                </th>
                            </tr>

                            @foreach($tests as $key => $value)
                                <tr>
                                    <td>{{$value->version}}</td>
                                    <td>{{$value->cijfer}}</td>

                                    <td class="d-flex">
                                        <a class="btn btn-primary btn-sm mr-2" href="{{url("test/edit/{$value->id}")}}">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        {!! Form::open(['method'=>'DELETE','route'=>['test.destroy', $value->id]]) !!}
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
        </div>
    </div>
@endsection
