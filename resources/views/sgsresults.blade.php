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
                            <div class="btn-grad  three fw-bold shadow gss">
                                SGS Courses
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4">
                        <a style="text-decoration: none !important" href="{{ route('sgs.fees') }}">
                            <div class="btn-grad  three fw-bold shadow gss">
                                SGS Fees
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4">
                        <a style="text-decoration: none !important" href="{{ route('sgs.results') }}">
                            <div class="btn-grad  fw-bold shadow btn-dark">
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
                </div>
                <div class="row gx-5">
                    @for ($i = 1; $i < auth()->user()->level; $i++)
                        @if (collect($courses)->where('level', $i)->count() > 0)
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
                                </div>
                            </div>
                        @endif
                    @endfor
                </div>
            </div>

            <div class="col-lg-3 ps-lg-5">
                @auth
                    <button disabled class="btn btn-primary"><i class="fa fa-graduation-cap"> </i>
                        SGS Results
                    </button>
                    <a href="{{ route('sgs') }}"><button class="float-end btn btn-dark"><i class="fa fa-caret-left"> </i>
                            Back</button></a>
                    @include('partials.profile')
                @else
                    @include('partials.login')
                @endauth
            </div>
        </div>

    </div>
@endsection
