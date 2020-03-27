@extends('layouts.app')

@section('content')
    <div class="row d-flex justify-content-center mt-5">
        <div class="col-lg-12">

            @foreach($periods as $periode)
                <div class="col-12 m-3">
                    <div class="card">
                        <div class="card-header">
                            Leerjaar {{$periode}}
                        </div>
                        <div class="card-body d-flex">
                            @foreach($blocks as $block)
                                <div class="col-3">
                                    <div class="h5">Blok {{$blockCounter++}}</div>
                                        <div class="d-flex flex-column">
                                            <span class="font-weight-bold">Modules:</span>
                                            @foreach($modules->where('periode', '=', $blockCounter - 1) as $module)
                                                <span>{{$module->name}}</span>
                                            @endforeach
                                            //get totalstudypoints
                                        </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            @endforeach

        </div>
    </div>
@endsection
