@extends('welcome')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-tools">
                <a class="btn btn-danger" href="fiducial">back</a>
                <button id="search" class="btn btn-primary" disabled>Search</button>
                <button id="search" disibaled class="btn btn-success" disabled>ADD</button>
                <div class="container" id="searchDiv">
                    <div class="row">


                        <div class="col-md-10" style="display:none">
                            <form method="POST" action="search_fiducial">
                                @csrf
                                <table class="table">
                                    <tr>
                                        <td><button class="form-control ">Search</button></td>
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
                            <td>Information</td>

                        </tr>
                    </thead>
                    @foreach ($depot as $key => $value)
                        <tr>
                            <td>{{ $id = $value->id }}</td>
                            <td>{{ $value->name }}</td>
                            <td><a href="depot_info/{{ $value->id }}" class="btn btn-info">Info</a></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>

    </div>
    <script>
        $(document).ready(function() {
            $("#searchDiv").hide();
            $("#search").click(function() {
                $("#searchDiv").show();
            })
        })
    </script>
@stop
