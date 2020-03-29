@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row d-flex mt-4">
            <div class="col-8 mb-4">
                <div class="card shadow">
                    <div class="card-header bg-danger text-white">
                        <span>
                            <i class="fas fa-clock text-white mr-2"></i>
                            Deadlines
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
                                 <p>Geen deadlines gevonden</p>
                            @endforelse
                        </form>
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
                                        <a class="btn btn-success btn-sm mr-2 pull-right" href="{{url("manager/edit/{$value->id}")}}">
                                            <i class="fas fa-pencil-alt text-white"></i>
                                        </a>
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
                <div class="card shadow">
                    <div class="card-header bg-success text-white d-flex justify-content-between">
                        <span>
                            <i class="fas fa-clock text-white mr-2"></i>
                            Deadlines voltooid
                        </span>
                    </div>

                    <div class="col d-flex justify-content-end bg-light">
                        <span>
                            <a class="btn btn-light btn-sm" href="/manager?complete=docent">docent</a>
                            <a class="btn btn-light btn-sm" href="/manager?complete=module">module</a>
                            <a class="btn btn-light btn-sm" href="/manager?complete=tijdstip">tijdstip</a>
                            <a class="btn btn-light btn-sm" href="/manager?complete=categorie">categorie</a>
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
                            <p>Geen voltooide deadlines</p>
                        @endforelse
                    </div>
                </div>
            </div>

        </div>



@endsection
