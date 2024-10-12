@extends('layouts.dashmaster')

@section('body')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Admin Dashboard</h1>
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
            <div class="col-md-3 mx-auto col-xs-6 mb-2 mt-4 p-4">
                <div class="row shadow">
                    <div class="col-lg-8 my-auto col-md-8 col-sm-8 col-8 p-4 fontsty">
                        <h5>Students</h5>
                    </div>
                    <div class="col-lg-4 my-auto col-md-4 text-white fw-bold col-sm-4 col-4 p-3 text-center bg-dark">
                        <h2>{{ $stat['users'] }}</h2>                        
                    </div>
                </div>
            </div>
            <div class="col-md-3 mx-auto col-xs-6 mb-2 mt-4 p-4">
                <div class="row shadow">
                    <div class="col-lg-8 my-auto col-md-8 col-sm-8 col-8 p-4 fontsty">
                        <h5>Lecturers</h5>
                    </div>
                    <div class="col-lg-4  my-autocol-md-4 text-white fw-bold col-sm-4 col-4 p-3 text-center bg-theme-2">
                        <h2>{{ $stat['lecturers'] }}</h2>                        
                    </div>
                </div>
            </div>
            <div class="col-md-3 mx-auto col-xs-6 mb-2 mt-4 p-4">
                <div class="row shadow">
                    <div class="col-lg-8 my-auto col-md-8 col-sm-8 col-8 p-4 fontsty">
                        <h5>Faculties</h5>
                    </div>
                    <div class="col-lg-4  my-autocol-md-4 text-white fw-bold col-sm-4 col-4 p-3 text-center bg-secondary">
                        <h2>{{ $stat['faculties'] }}</h2>                        
                    </div>
                </div>
            </div>
            <div class="col-md-3 mx-auto col-xs-6 mb-2 mt-4 p-4">
                <div class="row shadow">
                    <div class="col-lg-8 my-auto col-md-8 col-sm-8 col-8 p-4 fontsty">
                        <h5>Departments</h5>
                    </div>
                    <div class="col-lg-4 co my-autol-md-4 text-white fw-bold col-sm-4 col-4 p-3 text-center bg-theme">
                        <h2>{{ $stat['departments'] }}</h2>                        
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="containter-fluid my-5">
        <div class="row g-2">
            <div class="col-md-6 px-2">
                <div class="card shadow-sm border-0">
                    <h2 class="card-header bg-light">Recent Users</h2>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Reg Number</th>
                                        <th scope="col">Department</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->other_names }} {{ $user->surname }}</td>
                                            <td>{{ $user->reg_no }}</td>
                                            <td>{{ $user->department->name }}</td>
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
                    <h2 class="card-header bg-light">Lecturers</h2>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Department</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lecturers as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->department->name }}</td>
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
