@extends('home')

@section('content_header')
    <h1>Employees</h1>
@stop

@section('content')
    <div class="jumbotron text-center">
        <div align="right">
            <a href="{{route('admin.employees.index')}}" class="btn btn-primary">Back</a>
        </div>
        <br />
        <h3>Name - {{ $data->name}}</h3>
{{--        <h3>Surname:{{$employee->surname}}</h3>--}}
{{--        <h3>Company:{{$employee->company}}</h3>--}}
{{--        <h3>Email:{{$employee->email}}</h3>--}}
{{--        <h3>Phone: {{$employe->phone}}</h3>--}}
    </div>
@endsection

