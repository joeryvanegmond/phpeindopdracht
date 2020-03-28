@extends('layouts.app')

@section('content')
    <div class="row d-flex mt-5">
                <div class="h1">Studievoortgang</div>
        <div class="col-lg-12">
            <div class="col-12 d-flex justify-content-center">
                <progress class="progress-bar w-100 mt-4 mb-4" style="height: 40px;" value="{{$modules->first()->totalEarnedPoints()}}" max="{{$modules->first()->totalPoints()}}"></progress>
                <span class="position-absolute text-white" style="margin-top: 31px;">{{$modules->first()->totalEarnedPoints()}} / {{$modules->first()->totalPoints()}}</span>
            </div>

            @foreach($periods as $periode)
                <div class="col-12 mb-4">
                    <div class="card shadow">
                        <div class="card-header">
                            Leerjaar {{$periode}}
                        </div>
                        <div class="card-body d-flex">
                            @foreach($blocks as $block)
                                <div class="col-3 border-left border-right">
                                    <div class="h5 font-weight-bold">Blok {{$blockCounter++}}</div>
                                        <progress class="progress-bar w-100" value="{{$modules->first()->earnedPoints($blockCounter - 1)}}" max="{{$modules->first()->totalPointsInBlock($blockCounter - 1)}}"></progress>
                                        <div class="d-flex flex-column">
                                            <span class="font-weight-bold">Modules:</span>
                                            <span class="border-bottom d-flex flex-column">

                                                @foreach($modules->where('periode', '=', $blockCounter - 1) as $module)
                                                    @if($module->tests()->whereYear('version', '=', now()->year)->first() != null && $module->tests()->whereYear('version', '=', now()->year)->first()->cijfer != null)
                                                        @if($module->tests()->whereYear('version', '=', now()->year)->first()->cijfer > 5)
                                                                <span>{{$module->name}} <span class="pull-right text-success font-weight-bold">Cijfer: {{$module->tests()->whereYear('version', '=', now()->year)->first()->cijfer}}</span></span>
                                                            @else
                                                                <span>{{$module->name}} <span class="pull-right text-danger font-weight-bold">{{$module->tests()->whereYear('version', '=', now()->year)->first()->cijfer}}</span></span>
                                                            @endif
                                                        @else
                                                        <span>{{$module->name}}</span>
                                                        @endif
                                                @endforeach
                                            </span>
                                                    <span>

                                                        <strong>Punten:</strong>
                                                        @if($modules->first()->earnedPoints($blockCounter - 1) != $modules->first()->totalPointsInBlock($blockCounter - 1) || $modules->first()->totalPointsInBlock($blockCounter - 1) == 0)
                                                                <strong class="text-danger"> {{$modules->first()->earnedPoints($blockCounter - 1)}} / {{$modules->first()->totalPointsInBlock($blockCounter - 1)}}</strong>
                                                            @else
                                                                <strong class="text-success"> {{$modules->first()->earnedPoints($blockCounter - 1)}} / {{$modules->first()->totalPointsInBlock($blockCounter - 1)}}</strong>
                                                        @endif
                                                    </span>
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
