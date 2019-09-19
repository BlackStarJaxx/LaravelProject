@extends('home')
@section('content_header')
    <h1>Companies</h1>
@stop

@section('content')
    {{--    if($erros->any())--}}
    {{--        <div class="alert alert-danger">--}}
    {{--            <ul>--}}
    {{--                @foreach($errors ->all() as $error)--}}
    {{--                    <li>{{ $error }} </li>--}}
    {{--                @endforeach--}}
    {{--            </ul>--}}
    {{--        </div>--}}
    {{--    @endif--}}

    <div align="right">
        <a href="{{route('admin.companies.index')}}" class="btn btn-default">Back</a>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add New Company</div>
                    <br/>
                    <div class="card-body">
                        <form method="POST" action="{{route('admin.companies.store')}}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label class="col-md-4 text-right">Name:</label>
                                <div class="col-md-8">
                                    <input type="text" name="name" class="form-control input-lg" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 text-right">Email:</label>
                                <div class="col-md-8">
                                    <input type="text" name="email" class="form-control input-lg" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 text-right">Logo:</label>
                                <div class="col-md-8">
                                    <input type="text" name="logo" class="form-control input-lg" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 text-right">WebSite:</label>
                                <div class="col-md-8">
                                    <input type="text" name="website" class="form-control input-lg" />
                                </div>
                            </div>

                            <div class="form-group text-right">
                                <input type="submit" name="add"  class="btn btn-primary input-lg" value="Add" />
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
