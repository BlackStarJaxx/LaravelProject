@extends('home')
@section('content_header')
    <h1>Employees</h1>
@stop

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
    @endif

    <div align="right">
    <a href="{{route('admin.employees.index')}}" class="btn btn-default">Back</a>
</div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add New Employee</div>
                    <br/>
                    <div class="card-body mb-1">
                        <form method="POST" action="{{route('admin.employees.store')}}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                               <label class="col-md-4 text-right">Name:</label>
                               <div class="col-md-8">
                                   <input type="text" name="name" class="form-control input-lg" />
                               </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 text-right">Surname:</label>
                                <div class="col-md-8">
                                    <input type="text" name="surname" class="form-control input-lg" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 text-right">Email:</label>
                                <div class="col-md-8">
                                    <input type="text" name="email" class="form-control input-lg" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 text-right">Phone:</label>
                                <div class="col-md-8">
                                    <input type="text" name="phone" class="form-control input-lg" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 text-right">Company:</label>
                                <div class="col-md-8">
                                    <select  class="form-control input-sm " id="selectCompany"  name="company" >
                                        <option value=""  disabled selected>Please select company</option>
                                        @foreach($companies as $company)
                                            <option value="{{$company->id}}">{{ $company->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group text-right ">
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
