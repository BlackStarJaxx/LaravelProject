@extends('admin/companies')

{{--@section('content_header')--}}
{{--    <h1>Companies</h1>--}}
{{--@stop--}}

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add New Company</div>

                    <div class="card-body">
                        <form method="post" action="{{route('admin.companies.store')}}">
                            @csrf

                            Name:
                            <input type="text" name="name" class="form-control" />
                            <br />
                            <input type="submit" value="Save" class="btn btn-primary" />

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



