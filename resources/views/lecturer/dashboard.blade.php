@extends('layouts.dashmaster')

@section('body')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Lecturer Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
            </button>
        </div>
    </div>


    <section class="containter-fluid">
        <div class="row gx-2">
            <div class="col-md-4 mx-auto col-xs-6 mb-2 mt-4 p-4">
                <div class="row shadow">
                    <div class="col-lg-8 my-auto col-md-8 col-sm-8 col-8 p-4 fontsty">
                        <h5>Courses</h5>                        
                        <span class="text-dark">&nbsp;</span>

                    </div>
                    <div class="col-lg-4col-md-4 text-white fw-bold col-sm-4 col-4 p-3 text-center bg-dark">
                        <h2>{{ $stat['courses'] }}</h2>                        
                    </div>
                </div>
            </div>
            <div class="col-md-4 mx-auto col-xs-6 mb-2 mt-4 p-4">
                <div class="row shadow">
                    <div class="col-lg-8 my-auto col-md-8 col-sm-8 col-8 p-4 fontsty">
                        <h5>Department</h5>
                        <span class="text-dark">{{ $stat['department']}}</span>
                    </div>
                    <div class="col-lg-4 col-md-4 text-white fw-bold col-sm-4 col-4 p-3 text-center bg-theme-2">
                        <h2><i class="fa fa-institution"> </i></h2>                        
                    </div>
                </div>
            </div>
            <div class="col-md-4 mx-auto col-xs-6 mb-2 mt-4 p-4">
                <div class="row shadow">
                    <div class="col-lg-8 my-auto col-md-8 col-sm-8 col-8 p-4 fontsty">
                        <h5>Materials</h5>
                        <span class="text-dark">&nbsp;</span>
                    </div>
                    <div class="col-lg-4 col-md-4 text-white fw-bold col-sm-4 col-4 p-3 text-center bg-secondary">
                        <h2>{{ $stat['materials'] }}</h2>                        
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="containter-fluid my-5">
        <div class="row g-2">
            <div class="col-md-6 px-2">
                <div class="card shadow-sm border-0">
                    <h2 class="card-header bg-light">Recent Materials</h2>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Course</th>
                                        <th scope="col">Level</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($materials as $mat)
                                        <tr>
                                            <td>{{ $mat->name }}</td>
                                            <td>{{ \App\Models\Course::find($mat->course->course_id)->code }}</td>
                                            <td>{{ $mat->course->level }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 px-2">
                <div class="card shadow-sm border-0">
                    <h2 class="card-header bg-light">My Courses</h2>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Code</th>
                                        <th scope="col">Department</th>
                                        <th scope="col">Level</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($courses as $course)
                                        <tr>
                                            <td>{{ \App\Models\Course::find($course->course_id)->code }}</td>
                                            <td>{{  \App\Models\Department::find($course->department_id)->name }}</td>
                                            <td>{{ $course->level }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
