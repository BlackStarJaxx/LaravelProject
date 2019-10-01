@extends('home')

@section('content_header')
    <h1>Employees</h1>
@stop

@section('content')


    @if($message = Session::get('success'))
        <p>{{$message}}</p>
    @endif




    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <br/>

                    <div class="card-body">
                        <a href="{{route('admin.employees.create')}}" class="btn btn-sm btn-primary">Add New </a>
                        <br /><br />

                        <table class="table table-bordered table-hover" id="table">
                            <tr>
                                <th>Name</th>
                                <th>Surname</th>
                                <th>Company</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Active</th>

                            </tr>
                            @forelse($data as $employee)
                                <tr>
                                     <td>{{$employee->name}}</td>
                                     <td>{{$employee->surname}}</td>
                                     <td>{{$employee->companies->name}}</td>
                                     <td>{{$employee->email}}</td>
                                     <td>{{$employee->phone}}</td>

                                    <td>
{{--                                        <a href="{{route('admin.employees.show', $employee->id)}}" class="btn btn-primary">Show</a>--}}
                                        <a href="{{route('admin.employees.edit',$employee->id)}}"
                                           class="btn btn-sm btn-info">Edit</a>
                                        <form method="POST" action="{{route('admin.employees.destroy', $employee->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button align="right" type="submit" class="btn btn-danger "onclick="return confirm('Are You Sure?')" >Delete</button>
                                        </form>
                                    </td>

                                </tr>
                            @empty
                            <tr>
                                <td colspan="2">No records found. </td>
                            </tr>
                          @endforelse
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




