@extends('home')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
@section('content_header')
    <h1>Companies</h1>
@stop
@section('content')
    @if($message = Session::get('success'))
        <p>{{$message}}</p>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <br/>

                    <div class="card-body">
                        <a href="{{route('admin.companies.create')}}" class="btn btn-sm btn-primary">Add New </a>
                        <br /><br />
                        <table class="table table-bordered table-hover "  id="table">
                            <thead>
                            <tr>
                                <th class="text-center ">Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Logo</th>
                                <th class="text-center">Website</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($companies))
                            @forelse($companies as $company)
                                <tr>
                                    <td>{{$company->name}}</td>
                                    <td>{{$company->email}}</td>
                                    <td><img class="img-thumbnail img-rounded "  src="{{$company->logo}}" width=""  alt=""></td>
                                    <td>{{$company->website}}</td>
                                    <td>
                                        <a href="{{route('admin.companies.edit',$company->id)}}"
                                           class="btn btn-sm btn-info">Edit</a> <br><br>
                                        <form method="POST" action="{{route('admin.companies.destroy', $company->id)}}">
                                            @csrf
                                            {{method_field('DELETE')}}
                                            <input  type="submit" value="Delete" class="btn btn-danger " onclick="
                                            return confirm('Are You Sure?')" />
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2">No records found. </td>
                                </tr>
                            @endforelse
                                @endif
                            </tbody>
                        </table>

                        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
                        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
                        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>



                        <script
                                src="https://code.jquery.com/jquery-3.4.1.js"
                                integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
                                crossorigin="anonymous"></script>
                        <script
                                src="http://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"

                                crossorigin="anonymous"></script>

                        <script>
                            $(document).ready(function() {
                                $('#table').DataTable();
                            } );
                        </script>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




