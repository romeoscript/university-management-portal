@extends('layouts.master')
@section('title')
        SGS - {{ auth()->user()->surname }} {{ auth()->user()->other_names }}
@endsection
@section('body')
    {{-- Hero --}}
    <div class="container-fluid p-5 bg-white">
        <div class="row">
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-4">
                        <a style="text-decoration: none !important" href="{{ route('sgs.courses') }}">
                            <div class="btn-grad one fw-bold shadow gss">
                                 SGS Courses
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4">
                        <div class="btn-grad two fw-bold shadow gss">                            
                            SGS Fees
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <a href="{{ route('fees') }}">
                        <div class="btn-grad three fw-bold shadow gss">
                            SGS Results
                        </div>
                        </a>
                    </div>
                </div>
                <div class="row px-lg-5">                    
                    <ul class="my-3 list-group bg-light">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Title

                            <span class="text-dark"> Credit </span>
                            <span class="text-dark"> Semester </span>
                        </li>
                        @foreach ($gss as $course)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>{{ $course->code }} </span>
                                <span class="text-dark"> {{ $course->credit }} </span>
                                <span class="text-dark"> 
                                    @if ($course->semester == 1)
                                       &nbsp; &nbsp; &nbsp; First
                                    @else
                                        Second
                                    @endif 
                                Semester</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 ps-lg-5">                
                @auth
                    <button disabled class="btn btn-primary"><i class="fa fa-institution"> </i>
                        S.G.S
                    </button>
                    <a href="/"><button class="float-end btn btn-dark"><i class="fa fa-caret-left"> </i>
                            Back</button></a>
                    @include('partials.profile')
                @else
                    @include('partials.login')
                @endauth
            </div>
        </div>

    </div>
@endsection
