@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row d-flex mt-4">
            <div class="col-8 mb-4">
                <div class="card shadow">
                    <div class="card-header bg-danger text-white">
                        <span>
                            <i class="fas fa-tasks text-white mr-2"></i>
                            Taken
                        </span>
                    </div>
                        <div class="col d-flex justify-content-end bg-light">
                            <span>
                                <a class="btn btn-light btn-sm ml-2" href="/manager?tag=docent">docent</a>
                                <a class="btn btn-light btn-sm ml-2" href="/manager?tag=module">module</a>
                                <a class="btn btn-light btn-sm ml-2" href="/manager?tag=tijdstip">tijdstip</a>
                                <a class="btn btn-light btn-sm ml-2" href="/manager?tag=categorie">categorie</a>
                            </span>
                        </div>
                        <form method="POST" action="/completed" class="card-body d-flex flex-wrap flex-column">
                            @csrf
                            @method('PATCH')
                             @forelse($uncompleted as $key => $value)
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
                                        <span class="pull-right">{{date('d-m-Y H:i', strtotime($value->deadline))}}</span>
                                        <input type="checkbox" class="form-check-input" value="{{$value->id}}" name="completed" id="completed" onclick="this.form.submit()">
                                    </div>
                                @endif
                                 @empty
                                 <p>Geen taken gevonden</p>
                            @endforelse
                        </form>
                    </div>

                <div class="card shadow mt-5">
                    <div class="card-header bg-success text-white d-flex justify-content-between">
                        <span>
                            <i class="fas fa-check text-white mr-2"></i>
                            Voltooid
                        </span>
                    </div>

                    <div class="card-body d-flex flex-wrap">
                        @forelse($completed as $key => $value)
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
                                    <span class="pull-right">{{date('d-m-Y H:i', strtotime($value->deadline))}}</span>
                                </div>
                            @endif
                        @empty
                            <p>Geen voltooide taken</p>
                        @endforelse
                    </div>
                </div>

            </div>

            <div class="col-4">
                <div class="card shadow">
                    <div class="card-header bg-dark text-white"><i class="fas fa-table text-white mr-2"></i>Beheren</div>
                    <div class="card-body">
                        <table class="table table-borderless">
                            @forelse($tests as $key => $value)
                                <tr>
                                    <td class="border-bottom">{{$value->course()->first()->name}}</td>
                                    <td class="border-bottom">
                                            @if($value->deadline != null)
                                                    <a class="btn btn-info btn-sm mr-2 pull-right" href="{{url("manager/edit/{$value->id}")}}">
                                                        <i class="fas fa-pencil-alt text-white"></i>
                                                    </a>
                                                @else
                                                    <a class="btn btn-success btn-sm mr-2 pull-right" href="{{url("manager/edit/{$value->id}")}}">
                                                        <i class="fas fa-plus text-white"></i>
                                                    </a>
                                            @endif


                                    </td>
                                </tr>
                            @empty
                                <p>Geen toetsen gevonden</p>
                            @endforelse
                        </table>
                    </div>
                </div>
            </div>


            <div class="col-8">

            </div>

        </div>



@endsection
