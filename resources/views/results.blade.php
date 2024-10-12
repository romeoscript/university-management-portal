@extends('layouts.master')
@section('title')
    Result - {{ auth()->user()->surname }} {{ auth()->user()->other_names }}
@endsection
@section('body')
    {{-- Hero --}}
    <div class="container-fluid p-5 bg-white">
        <div class="row">
            <div class="col-lg-9">
                <div class="row">
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
                    <div class="row gx-5">
                        @for ($i = 1; $i < auth()->user()->level; $i++)
                            <div class="col-lg-3 me-3">
                                <span class="fw-bold pb-2 mb-5">{{ $i }}00 Level Result</span>
                                <div class="mt-4">
                                    <p>
                                        <b class="d-flex justify-content-between border-bottom border-primary mb-2">
                                            <span>Course</span>
                                            <span class="text-dark"> Score </span>
                                            <span class="text-dark"> Grade </span>
                                        </b>
                                    </p>
                                    @forelse ($courses as $course)
                                        @if ($course->pivot->level == $i)
                                            <p class="d-flex justify-content-between border-bottom border-primary">
                                                <span>{{ $course->code }}</span>
                                                <span class="text-dark"> {{ $course->pivot->score }} </span>
                                                @php
                                                    $getGrade = new \App\Http\Controllers\DashboardController();
                                                @endphp
                                                <span class="text-dark"> {{ $getGrade->grade($course->pivot->score) }}
                                                </span>
                                            </p>
                                        @endif
                                        @empty
                                        
                            <div class="alert alert-success  fw-bold">
                                No Results available
                                <span class="float-end"><i class="fa fa-stop"> </i> </span>
                            </div>
                                    @endforelse
                                    @php
                                        $getCGPA = new \App\Http\Controllers\DashboardController();
                                    @endphp
                                    <p class="mt-4">GPA: <b>{{ $getCGPA->cgpa($i) }}</b></p>
                                </div>
                            </div>
                        @endfor
                    </div>
                    <button class="btn btn-primary mt-3"> Calculate CGPA</button>
                    <h4 class="text-center p-3">Total CPGA = <b>4.09</b></h4>
                </div>
            </div>
            <div class="col-lg-3 ps-lg-5">
                @auth
                    <button disabled class="btn btn-primary"><i class="fa fa-braille"> </i>
                        My Results
                    </button>
                    <a href="/"><button class="float-end btn btn-dark"><i class="fa fa-caret-left"> </i> Back</button></a>
                    @include('partials.profile')
                @else
                    @include('partials.login')
                @endauth
            </div>
        </div>

    </div>
@endsection
