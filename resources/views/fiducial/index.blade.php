@extends('welcome')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-tools">
                <a class="btn btn-danger" href="fiducial">back</a>
                 <button id="search" class="btn btn-primary">Search</button>
                 <button id="search" disabled class="btn btn-success">ADD</button>
                <div class="container" id="searchDiv">
                    <div class="row">


                        <div class="col-md-10">
                            <form method="POST" action="search_fiducial">
                                @csrf
                                <table class="table">
                                    <tr>
                                        <td><button class="form-control">Search</button></td>
                                        <td></td>
                                        <td> <input type="text" id="searchBox" name="search"
                                                class="form-control bg-white text-success">
                                        </td>
                                        <td></td>
                                    </tr>
                                </table>
                            </form>
                        </div>



                    </div>
                </div>
                

            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Name</td>
                            <td>Father Name</td>
                            <td>Phone </td>
                            <td>email</td>
                            <td>Job</td>
                            <td>Department</td>
                            <td>Info</td>
                        </tr>
                    </thead>
                    @foreach ($fid as $key => $value)
                        <tr>
                            <td>{{ $value->id }}</td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->Father }}</td>
                            <td>{{ $value->phone }}</td>
                            <td>{{ $value->email }}</td>
                            <td>{{ $value->job }}</td>
                            <td>{{ $value->department }}</td>
                            <td><a href="info/{{ $value->id }}" class="btn btn-info">Info</a></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>

    </div>
    <script>
        $(document).ready(function() {
            $("#search").hide();
            $("#search").click(function() {
                $("#searchDiv").show();
            })
        })
    </script>
@stop
