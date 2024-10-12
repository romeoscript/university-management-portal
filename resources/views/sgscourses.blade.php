@extends('layouts.master')
@section('title')
    SGS Courses - {{ auth()->user()->surname }} {{ auth()->user()->other_names }}
@endsection
@section('body')
    {{-- Hero --}}
    <div class="container-fluid p-5 bg-white">
        <div class="row">
            <div class="col-lg-9">

                <div class="row">
                    <div class="col-lg-4">
                        <a style="text-decoration: none !important" href="{{ route('sgs.courses') }}">
                            <div class="btn-grad fw-bold shadow btn-dark">
                                SGS Courses
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4">
                        <a style="text-decoration: none !important" href="{{ route('sgs.fees') }}">
                        <div class="btn-grad three fw-bold shadow gss">
                            SGS Fees
                        </div>
                        </a>
                    </div>
                    <div class="col-lg-4">
                        <a style="text-decoration: none !important" href="{{ route('sgs.results') }}">
                            <div class="btn-grad three fw-bold shadow gss">
                                SGS Results
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row px-lg-5">
                    @if (Session::has('alert'))
                        <div class="col-lg-12">
                            <div class="alert alert-danger  fw-bold">
                                {{ Session::get('alert') }}
                                <span class="float-end"><i class="fa fa-stop"> </i> </span>
                            </div>
                        </div>
                    @endif
                    @if (Session::has('success'))
                        <div class="col-lg-12">
                            <div class="alert alert-success  fw-bold">
                                {{ Session::get('success') }}
                                <span class="float-end"><i class="fa fa-stop"> </i> </span>
                            </div>
                        </div>
                    @endif

                    <div class="col-lg-6">
                        <h5>Registered Courses </h5>
                        <ul class="my-3 list-group bg-light">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Title
                                <span class="text-dark"> Semester </span>
                            </li>
                            @foreach ($regCourses as $course)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>{{ $course->code }} <small><i
                                                class="text-muted">{{ $course['type'] ?? null }}</i></small></span>
                                    <span class="text-dark"> {{ $course->credit }}
                                        <a href="{{ route('courses.delete', $course->id) }}"><i
                                                class="ps-2 fa fa-trash text-danger"></i></a> </span>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="col-lg-6">
                        <h5>Available Courses</h5>
                        <ul class="my-3 list-group bg-light">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Title
                                <span class="text-dark"> Semester </span>
                            </li>
                            @foreach (collect($gss)->sortBy('semester') as $course)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>{{ $course->code }} <small><i
                                                class="text-muted">{{ $course['type'] ?? null }}</i></small></span>
                                    <span class="text-dark"> 
                                         
                                    @if ($course->semester == 1)
                                    &nbsp; &nbsp; &nbsp; 1st
                                 @else
                                     2nd
                                 @endif 
                                        <i class="ps-2 fa fa-plus text-success"></i>
                                    </span>
                                </li>
                            @endforeach
                        </ul>                        
                        @if (collect($gss)->sum('credit') > 0)
                            <p><b>Total Credits:</b> {{ collect($gss)->sum('credit') }}</p>
                            <a href="{{ route('courses.add') }}"><button class="mx-auto btn btn-primary btn-sm "><i
                                        class="fa fa-plus"> </i> Register </button></a>
                        @endif

                    </div>
                </div>
            </div>

            <div class="col-lg-3 ps-lg-5">
                @auth
                    <button disabled class="btn btn-primary"><i class="fa fa-graduation-cap"> </i>
                        SGS Courses
                    </button>
                    <a href="{{route('sgs')}}"><button class="float-end btn btn-dark"><i class="fa fa-caret-left"> </i> Back</button></a>
                    @include('partials.profile')
                @else
                    @include('partials.login')
                @endauth
            </div>
        </div>

    </div>
@endsection
