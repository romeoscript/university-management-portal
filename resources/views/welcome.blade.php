@extends('layouts.master')
@section('title')
    @auth
        {{ auth()->user()->surname }} {{ auth()->user()->other_names }}
    @else
        Start
    @endauth
@endsection
@section('body')
    {{-- Hero --}}
    <div class="container-fluid p-5 bg-white">
        <div class="row">
            <div class="col-lg-9">
                <div class="row">
                    @auth
                        <div class="col-lg-12">
                            <div class="alert alert-danger  fw-bold">
                                You have to confirm your fees first.
                                <span class="float-end"><i class="fa fa-stop"> </i> </span>
                            </div>
                        </div>
                    @endauth
                    @if (Session::has('login'))
                        <div class="col-lg-12">
                            <div class="alert alert-danger  fw-bold">
                                {{ Session::get('login') }}
                                <span class="float-end"><i class="fa fa-stop"> </i> </span>
                            </div>
                        </div>
                    @endif

                    <div class="col-lg-4">
                        <a  style="text-decoration: none !important" href="{{ route('courses') }}">
                            <div class="btn-grad one fw-bold shadow">
                                <i class="fa fa-graduation-cap fa-2x"> </i>
                                <br> my Courses
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4">
                        <a style="text-decoration: none !important" href="{{ route('sgs') }}">
                        <div class="btn-grad two fw-bold shadow">
                            <i class="fa fa-institution fa-2x"> </i> <br> S.G.S
                        </div>
                        </a>
                    </div>
                    <div class="col-lg-4">
                        <a  style="text-decoration: none !important" href="{{ route('fees') }}">
                        <div class="btn-grad three fw-bold shadow">
                            <i class="fa fa-money fa-2x"> </i> <br> MY Fees
                        </div>
                        </a>
                    </div>
                    <div class="col-lg-4">
                        <a  style="text-decoration: none !important" href="{{ route('lectures') }}" class="">
                            <div class="btn-grad four fw-bold shadow">
                                <i class="fa fa-book fa-2x"> </i> <br> My Lectures
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4">
                        <a  style="text-decoration: none !important" href="{{ route('results') }}">
                            <div class="btn-grad five fw-bold shadow">
                                <i class="fa fa-braille fa-2x"> </i> <br> My Results
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4">
                        <a  style="text-decoration: none !important" href="{{ route('profile') }}">
                        <div class="btn-grad six fw-bold shadow">
                            <i class="fa fa-user fa-2x"> </i> <br> my Profile
                        </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 ps-lg-5">
                @auth
                    @include('partials.profile')
                @else
                    @include('partials.login')
                @endauth
            </div>
        </div>

    </div>
@endsection
