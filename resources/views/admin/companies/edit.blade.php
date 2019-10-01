@extends('home')

@section('content_header')
    <h1>Companies</h1>
@stop

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br />
    @endif

    <div align="right">
        <a href="{{route('admin.companies.index')}}" class="btn btn-default">Back</a>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Company</div>
                    <br />

                    <div class="card-body">
                        <form method="POST" action="{{route('admin.companies.update',[$companies->id]) }}"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            Name:
                            <input type="text" name="name" value="{{$companies->name}}" class="form-control" />
                            Email:
                            <input type="text" name="email" value="{{$companies->email}}" class="form-control" />
                            Logo:
                            <input type="file" name="logo"  value="{{$companies->logo}}" class="form-control" >
                            WebSite:
                            <input type="text" name="website" value="{{$companies->website}}" class="form-control" />
                            <br />
                            <input type="submit" value="Edit" class="btn btn-primary" />
                        </form>

                    </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

