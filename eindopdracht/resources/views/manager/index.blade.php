@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row d-flex mt-4">
            <div class="col-6">
                <div class="card shadow">
                    <div class="card-header bg-dark text-white"><i class="fas fa-clock text-white mr-2"></i>Deadlines</div>
                    <div class="card-body d-flex flex-wrap">
                         @foreach($tests as $key => $value)
                            @if($value->deadline != null)
                                    <div class="col-12 border-bottom d-flex justify-content-between mb-4">
                                        <strong class="col p-0">{{$value->course()->first()->name}}</strong>
                                        <span class="col">
                                             @if($value->tag()->first() == null)
                                                    ?
                                                @else
                                                    {{$value->tagName($value->tag()->first())}}
                                                @endif
                                        </span>
                                        <span class="pull-right">{{$value->deadline}}</span>
                                    </div>
{{--                                    <div class="col-12">--}}
{{--                                        <div class="col-md-6 p-0">--}}
{{--                                            {{$value->course()->first()->omschrijving}}--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-6 p-0">--}}
{{--                                            @if($value->tag()->first() == null)--}}
{{--                                                <span class="pull-right">?</span>--}}
{{--                                            @else--}}
{{--                                                {{$value->tag()->first()->tag}}--}}
{{--                                            @endif--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="card shadow">
                    <div class="card-header bg-dark text-white"><i class="fas fa-table text-white mr-2"></i>Beheren</div>
                    <div class="card-body">
                        <table class="table table-borderless">
                            @foreach($tests as $key => $value)
                                <tr>
                                    <td>{{$value->course()->first()->name}}</td>
                                    <td>
                                        <a class="btn btn-success btn-sm mr-2 pull-right" href="{{url("manager/edit/{$value->id}")}}">
                                            <i class="fas fa-pencil-alt text-white"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection
