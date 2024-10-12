@extends('layouts.dashmaster')

@section('body')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Students</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <button type="button" class="btn bg-theme text-white me-2" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                    class="fa fa-plus"> </i> New</button>
        </div>
    </div>

    <section class="containter-fluid my-5">
        <div class="row">
            <div class="col-md-12 px-2">
                <div class="card shadow-sm border-0">
                    <h4 class="card-header bg-light">Registered Students</h4>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Reg Number</th>
                                        <th scope="col">Department</th>
                                        <th scope="col">Faculty</th>
                                        <th scope="col">Level</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->surname }} {{ $user->other_names }}</td>
                                            <td>{{ $user->reg_no }}</td>
                                            <td>{{ $user->department->name }}</td>
                                            <td>{{ $user->faculty->name }}</td>
                                            <td>{{ $user->level }}00</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>{{ $user->gender ?? null }}</td>
                                            <td>
                                                <a href="javascript:void(0)" id="' + data.id + '" role="button"
                                                    class="ml-1 editPack"><i class="text-success fa fa-eye"> <span
                                                            class="d-none d-md-inline-block"> </span></i></a>
                                                <a href="javascript:void(0)" id="' + data.id + '" role="button"
                                                    class="ml-1 editPack"><i class="text-primary fa fa-edit"> <span
                                                            class="d-none d-md-inline-block"> </span></i></a>
                                                <a href="javascript:void(0)" class="delPack" id="' + data.id + '"><i
                                                        class="text-danger fa fa-trash"> <span
                                                            class="d-none d-md-inline-block"> </span></i></a>
                                            </td>
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



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-2">
                        <label>Full name</label>
                        <input class="form-control" id="write_name" type="text" placeholder="Surname Firstname Lastname">
                    </div>
                    <div class="mb-2">
                        <label>Reg Number</label>
                        <input class="form-control" id="write_regno" type="text" placeholder="1234567890">
                    </div>
                    <div class="mb-2">
                        <label>Faculty</label>
                        <select class="form-select" aria-label="Select Gender" name="type">
                            <option>Faculty 1</option>
                            <option>Faculty 2</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label>Department</label>
                        <select class="form-select" aria-label="Select Gender" name="type">
                            <option>Department 1</option>
                            <option>Department 2</option>
                        </select>                    </div>
                    <div class="mb-2">
                        <label>Email</label>
                        <input class="form-control" id="write_email" type="text" placeholder="email@example.com">
                    </div>
                    <div class="mb-2">
                        <label>Phone Number</label>
                        <input class="form-control" id="write_phone" type="text" placeholder="08012345678">
                    </div>
                    <div class="mb-2">
                        <label>Gender</label>
                        <select class="form-select" aria-label="Select Gender" name="type">
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="add_student" class="btn btn-primary">Add Student</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
