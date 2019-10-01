@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Welcome to my test Task guys</h1>
@stop

@section('content')
    <p>Look this shit plz ;)</p>
@stop
@section('css')
{{--    <link rel="stylesheet" href="/css/admin_custom.css">--}}
    <link rel="stylesheet"
          href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet"
          href="http://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

@stop

@section('js')
    <script src="http://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="http://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="http://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>



    <script
            src="http://code.jquery.com/jquery-3.4.1.js"
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
@stop