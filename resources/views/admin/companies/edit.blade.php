@extends('admin/companies')

{{--@section('content_header')--}}
{{--    <h1>Companies</h1>--}}
{{--@stop--}}

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Company</div>

                    <div class="card-body">
                        <form method="post" action="{{route('admin.companies.update', $company->id) }}">
                            {{method_field('PUT')}}
                            @csrf

                            Name:
                            <input type="name" name="name" value="{{$company->name}}"    class="form-control" />
                            <br />
                            <input type="submit" value="Save" class="btn btn-primary" />

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



