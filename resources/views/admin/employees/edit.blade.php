@extends('home')

@section('content_header')
    <h1>Employees</h1>
@stop

@section('content')
    <div align="right">
        <a href="{{route('admin.employees.index')}}" class="btn btn-default">Back</a>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Employee</div>

                    <div class="card-body">
                        <form method="post" action="{{route('admin.employees.update',$employee->id) }}">

                            @csrf
                            @method('PATCH')
                            Name:
                            <input type="text" name="name" value="{{$employee->name}}" class="form-control" />
                            Surname:
                            <input type="text" name="surname" value="{{$employee->surname}}" class="form-control" />
                            Company:
                            <input type="text" name="company" value="{{$employee->company}}" class="form-control" />
                            Email:
                            <input type="text" name="email" value="{{$employee->email}}" class="form-control" />
                            Phone:
                            <input type="text" name="phone" value="{{$employee->phone}}" class="form-control" />
                            <br />
                            <input type="submit" value="Save" class="btn btn-primary" />

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

