@extends('layouts.app')
<script>
    function checkSelected(){
        let selected = document.getElementById("soort");
        if(selected.options[selected.selectedIndex].value == 1 && selected)
        {
            if(document.getElementById("file-upload") != null)
            {
                document.getElementById("file-upload").classList.remove("d-flex");
                document.getElementById("file-upload").classList.remove("flex-column");
                document.getElementById("file-upload").classList.add("d-none");
            } else
            {
                document.getElementById("file-download").classList.remove("d-flex");
                document.getElementById("file-download").classList.remove("flex-column");
                document.getElementById("file-download").classList.add("d-none");
            }
        } else
        {
            if(document.getElementById("file-upload") != null)
            {
                document.getElementById("file-upload").classList.remove("d-none");
                document.getElementById("file-upload").classList.add("d-flex");
                document.getElementById("file-upload").classList.add("flex-column");
            } else
            {
                document.getElementById("file-download").classList.remove("d-none");
                document.getElementById("file-download").classList.add("d-flex");
                document.getElementById("file-download").classList.add("flex-column");
            }
        }
    }
</script>
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
                        Beheer vakken
                    </div>
                    <div class="card-body">
                        {!! Form::model($test, ['route'=>['test.update', $test->id], 'method'=>'PATCH']) !!}
                        {{Form::hidden('version', $test->version)}}
                        {{Form::hidden('type', "test")}}
                        <div class="form-group d-flex flex-column">
                            {{Form::label('cijfer', 'Cijfer')}}
                            {{Form::number('cijfer', $test->cijfer, ['class'=>'form-control', 'placeholder'=>'Voer cijfer in'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('soort', 'Toetsing')}}
                            {!! Form::select('soort', ["Assessment", "Tentamen"], $test->soort, ['class'=>'form-control', 'placeholder'=>'Kies toetsing', 'onClick'=>'checkSelected()']) !!}
                        </div>

                        @if($test->file != null)
                            <div class="form-group d-flex flex-column" id="file-download">
                                {{Form::label('file', 'Assessment downloaden')}}
                                <a href="/uploads/{{$test->file}}" download="/uploads/{{$test->file}}" class="btn btn-primary w-25 btn-sm">Download</a>
                            </div>
                            @else
                            <div class="form-group d-none" id="file-upload">
                                {{Form::label('file', 'Assessment uploaden')}}
                                {!! Form::file('file')!!}
                            </div>
                        @endif



                        {!! Form::submit('Wijzigen', ['class' => 'btn btn-success'] ) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
