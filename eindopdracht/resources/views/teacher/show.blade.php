@extends('layouts.app')

@section('content')
    <div class="row d-flex justify-content-center mt-5">
        <div class="col-lg-12 d-flex">
            <div class="col-2">
                <div class="pull-left">
                    <a href="{{route('teacher.index')}}">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                </div>
            </div>

            <div class="col-8">
                <h2 class="col-4">Vak details</h2>
                <div class="form-group d-flex">
                    <div class="font-weight-bold col-2">Naam: </div>
                    <div class="col-6">{{ $teacher->name }} {{$teacher->infix}} {{$teacher->lastname}}</div>
                </div>

                <div class="form-group d-flex">
                    <div class="font-weight-bold col-2">Docent van: </div>
                    <div class="col-6 d-flex flex-column">
                        @foreach($selectedCourses as $key => $value)
                            <div>
                                {{ $courses->find($value)->name}}
                            </div>
                        @endforeach
                    </div>
            </div>

            </div>
            </div>
        </div>





{{--        <div class="col-lg-8 d-flex border">--}}
{{--            <div class="pull-left">--}}
{{--                <a href="{{route('course.index')}}">--}}
{{--                    <i class="fas fa-arrow-left"></i>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--            <div class="col">--}}
{{--                <h2>Vak bekijken</h2>--}}
{{--                <div class="form-group">--}}
{{--                    <div class="font-weight-bold">Naam: </div>--}}
{{--                    <div>{{ $course->name }}</div>--}}

{{--                </div>--}}
{{--                <div class="form-group">--}}
{{--                    <div class="font-weight-bold">Omschrijving: </div>--}}
{{--                    <div>{{ $course->name }}</div>--}}
{{--                </div>--}}
{{--                <div class="form-group">--}}
{{--                    <div class="font-weight-bold">Coördinator: </div>--}}
{{--                    <div>--}}
{{--                        {{ $teacher->name }}--}}
{{--                        {{ $teacher->infix }}--}}
{{--                        {{ $teacher->lastname }}--}}
{{--                    </div>--}}
{{--            </div>--}}

{{--            </div>--}}

{{--        </div>--}}
{{--        <div class="row border">--}}
{{--            <div class="col">--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection
