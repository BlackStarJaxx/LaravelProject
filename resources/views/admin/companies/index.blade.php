@extends('home')

@section('content_header')
    <h1>Companies</h1>
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
                        <a href="{{route('admin.companies.create')}}" class="btn btn-sm btn-primary">Add New </a>
                        <br /><br />

                        <table class="table table-bordered table-hover">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Logo</th>
                                <th>WebSite</th>
                                <th>Active</th>

                            </tr>
                            @forelse($data as $companies)
                                <tr>
                                    <td>{{$companies->name}}</td>
                                    <td>{{$companies->email}}</td>
                                    <td>{{$companies->logo}}</td>
                                    <td>{{$companies->website}}</td>

                                    <td>
                                        {{--                                        <a href="{{route('admin.employees.show', $employee->id)}}" class="btn btn-primary">Show</a>*/--}}
                                        <a href="{{route('admin.companies.edit',$companies->id)}}"
                                           class="btn btn-sm btn-info">Edit</a>
                                        <form method="POST" action="{{route('admin.companies.destroy', $companies->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button align="right" type="submit" class="btn btn-danger " onclick="return confirm('Are You Sure?')">Delete</button>
                                        </form>
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2">No records found. </td>
                                </tr>
                            @endforelse
                        </table>
                        {!! $data->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




