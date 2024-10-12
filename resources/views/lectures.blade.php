@extends('layouts.master')
@section('title')
    Courses - {{ auth()->user()->surname }} {{ auth()->user()->other_names }}
@endsection
@section('body')
    {{-- Hero --}}
    <div class="container-fluid p-5 bg-white">
        <div class="row">
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-danger  fw-bold">
                            You have to register your courses first.
                            <span class="float-end"><i class="fa fa-stop"> </i> </span>
                        </div>
                    </div>

                    <div class="col-lg-9 mt-3">
                        <h5>Available Lecture Materials </h5>
                        <ul class="my-3 list-group bg-light">
                            @forelse ($materials as $material)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $material->name }}
                                    <a download="{{ $material->file }}"><button class="btn btn-secondary rounded"> <i
                                                class="fa fa-download"> </i> Download</button></a>
                                </li>
                            @empty
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 ps-lg-5">
                @auth
                    <button disabled class="btn btn-primary"><i class="fa fa-book"> </i>
                        My Lectures
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
