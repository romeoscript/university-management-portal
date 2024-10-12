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
                            <div class="btn-grad three fw-bold shadow gss">
                                SGS Courses
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4">
                        <a style="text-decoration: none !important" href="{{ route('sgs.fees') }}">
                        <div class="btn-grad fw-bold shadow btn-dark">
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

                    
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link text-theme-2 active" id="profile-tab" data-bs-toggle="tab"
                                data-bs-target="#profile" type="button" role="tab" aria-controls="profile"
                                aria-selected="true">Generate Ref</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link text-theme-2" id="contact-tab" data-bs-toggle="tab"
                                data-bs-target="#contact" type="button" role="tab" aria-controls="contact"
                                aria-selected="false">Fee history</button>
                        </li>
                    </ul>

                    <div class="tab-content my-5" id="myTabContent">
                        <div class="tab-pane fade show active" id="profile" role="tabpanel"
                            aria-labelledby="profile-tab">
                            <div class="row mb-3">
                                <form class="px-md-5" method="POST" action="{{route('generate.ref')}}">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label>Session</label>
                                        <select class="form-select" aria-label="Select Session" name="year" required>
                                            <option disabled>Select session</option>
                                            @for ($i = auth()->user()->level; $i >= 1; $i--)
                                                <option
                                                    value="{{ \carbon\Carbon::parse(auth()->user()->year)->addYears($i) }}">
                                                    {{ $i }}00 level -
                                                    {{ \carbon\Carbon::parse(auth()->user()->year)->addYears($i)->format('Y') }}/{{ \carbon\Carbon::parse(auth()->user()->year)->addYears($i + 1)->format('Y') }}
                                                    - ₦{{ number_format(\App\Models\Fee::where('faculty_id', auth()->user()->department->faculty_id)->where('level', $i)->first()->amount)}}
                                                </option>
                                            @endfor
                                        </select>

                                        <button class="my-5 btn btn-primary fw-bold" type="submit">Generate
                                            REF</button>
                                    </div>
                                </form>

                                <div class="row mb-3 px-md-5">
                                    <h4>Unconfirmered Refs</h4>
                                    {{-- @forelse ($pending as $ref)
                                        <div class="row mt-3">
                                            <div class="col-auto mt-2 pt-2">
                                                Session: <b>2019/2020</b>
                                            </div>

                                            <div class="col-auto">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control"
                                                        value="{{ $ref->rrr }}" aria-describedby="button-addon2">
                                                    <button class="btn btn-dark" type="button" id="button-addon2">
                                                        <i class="fa fa-copy"> </i> Copy
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                    @empty

                                        <div class="col-lg-12">
                                            <div class="alert alert-primary  fw-bold">
                                                You have no pending Refs
                                            </div>
                                        </div>
                                    @endforelse --}}
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        </div>
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
