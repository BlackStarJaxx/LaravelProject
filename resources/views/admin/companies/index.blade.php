@extends('admin.companies')

{{--@section('content_header')--}}
{{--    <h1>Companies</h1>--}}
{{--@stop--}}

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Companies</div>
                   
                    <div class="card-body">
                        <a href="{{route('admin.companies.create')}}" class="btn btn-sm btn-primary">Add New </a>
                        <br /><br />
 
                        <table class="table">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Logo</th>
                                <th>WebSite</th>
                            </tr>
                            @forelse($companies as $company)
                                <tr>
                                    <td>{{$company->name}}</td>
                                    <td><a href="{{route('admin.companies.edit' , $company->id)}}" class="btn btn-sm btn-info"></a></td>
                                    <form method="POST" action="{{route('admin.companies.destroy', $company->id)}}"></form>
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <input type="submit" value="Delete" onclick="return confirm('Are You Sure?')" class="btn btn-sm btn-danger" />
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




