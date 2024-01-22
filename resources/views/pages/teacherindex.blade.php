@extends('layouts.app')

@section('content')

    <div class="container">

        <h3 align="center" class="mt-5">Employee Management</h3>

        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">

            <div class="form-area">
                <form method="POST" action="{{ route('teacher.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label>Teacher Name</label>
                            <input type="text" class="form-control" name="teacher_name">
                        </div>
                        <div class="col-md-6">
                            <label>Teacher Age</label>
                            <input type="text" class="form-control" name="teacher_age">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Teacher Address</label>
                            <input type="text" class="form-control" name="teacher_address">

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label>Teacher Department</label>
                            <input type="text" class="form-control" name="teacher_department">

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <input type="submit" class="btn btn-primary" value="Register">
                        </div>

                    </div>
                </form>
            </div>

                <table class="table mt-5">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Teacher Name</th>
                        <th scope="col">Teacher Age</th>
                        <th scope="col">Teacher Address</th>
                        <th scope="col">Teacher Department</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>

                        @foreach ( $teachers as $key => $teacher )

                        <tr>
                            <td scope="col">{{ ++$key }}</td>
                            <td scope="col">{{ $teacher->teacher_name }}</td>
                            <td scope="col">{{ $teacher->teacher_age }}</td>
                            <td scope="col">{{ $teacher->teacher_address }}</td>
                            <td scope="col">{{ $teacher->teacher_department }}</td>
                            
                            <td scope="col">

                            <a href="{{  route('teacher.edit', $teacher->id) }}">
                            <button class="btn btn-primary btn-sm">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                            </button>
                            </a>
                            
                            <form action="{{ route('teacher.destroy', $teacher->id) }}" method="POST" style ="display:inline">
                             @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                            </td>

                          </tr>

                        @endforeach




                    </tbody>
                  </table>
            </div>
        </div>
    </div>

@endsection


@push('css')
    <style>
        .form-area{
            padding: 20px;
            margin-top: 20px;
            background-color:#b3e5fc;
        }

        .bi-trash-fill{
            color:red;
            font-size: 18px;
        }

        .bi-pencil{
            color:green;
            font-size: 18px;
            margin-left: 20px;
        }
    </style>
@endpush