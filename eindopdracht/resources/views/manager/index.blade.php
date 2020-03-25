@extends('layouts.app')

@section('content')
    <?php $courses = App\Course::all(); $teachers = App\Teacher::all(); ?>
    <div class="container">
        <div class="row justify-content-center m-4">
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
@endsection
