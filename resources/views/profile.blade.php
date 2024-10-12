@extends('layouts.master')
@section('title')
    Profile - {{ auth()->user()->surname }} {{ auth()->user()->other_names }}
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
                    <div class="col-md-9">
                        @include('partials.profile')
                        <p class="border-bottom"><b>Phone Number:</b> <span>{{ auth()->user()->phone ?? '080765542987'}}</span>
                        </p>
                        <p class="border-bottom"><b>Date of birth:</b> <span>{{ \Carbon\Carbon::parse(auth()->user()->created_at)->format('d, M, Y') }}</span></p>
                        <p class="border-bottom"><b>Programme:</b> <span>{{ auth()->user()->programme ?? 'First Degree' }}</span></p>
                        <p class="border-bottom"><b>Gender:</b> <span>{{ auth()->user()->gender ?? 'Male'}}</span></p>
                    </div>
                    <div class="col-md-3 text-center">
                        <img src="{{asset('assets/images/user.png')}}" height="320" width="280" class="img-fluid img-thumbnail p-2" title="Passport" alt="Passport">
                        <b>Passport</b>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 ps-lg-5">
                @auth
                    <button disabled class="btn btn-primary"><i class="fa fa-user"> </i>
                        My Profile
                    </button>
                    <a href="/"><button class="float-end btn btn-dark"><i class="fa fa-caret-left"> </i> Back</button></a>
                @else
                    @include('partials.login')
                @endauth
            </div>
        </div>

    </div>
@endsection
