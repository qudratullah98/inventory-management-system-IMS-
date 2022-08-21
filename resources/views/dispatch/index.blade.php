@extends('../welcome')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card card-md">
                @if (Session::has('message'))
                    <span class="alert alert-success">{{ Session::get('message') }}</span>
                    <script>
                                        $(document).ready(function() {
                                                $('#dispatch').css('display', 'block');
                                                $('#table3').css('display', 'none');
                                        });
                                    </script>
                @endif
                <div class="card-header">
                    <div class="card-tools">
                        <span class="card-title text-center"><button class="btn btn-primary btn-sm"
                                id="display">توزیع</button></span>
                        <span class="card-title text-center"><a class="btn btn-primary btn-sm" href="dispatch"
                                id="display_fiducial">لیست معتمدین</a></span>
                        <button id="search" class="btn btn-primary btn-sm">Search</button>

                        <div class="container" id="searchDiv">
                            <div class="row">

                                @if ($errors->any())
                                    {{-- {{ dd("sdfdsfdsf") }} --}}
                                    <script>
                                        $(document).ready(function() {
                                                $('#dispatch').css('display', 'block');
                                                $('#table3').css('display', 'none');
                                        });
                                    </script>
                                @endif
                                <div class="col-md-10">
                                    <form method="POST" action="fiducial_search">
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


                </div>
                <div class="card-body" style="display:none" id="dispatch">
                    @error('item.*')
                        <small class="text-danger">{{ $message }}<br></small>
                    @enderror
                    @error('catagory.*')
                        <small class="text-danger">{{ $message }}<br></small>
                    @enderror
                    @error('quntity.*')
                        <small class="text-danger">{{ $message }}<br></small>
                    @enderror
                    @error('fiducial')
                        <small class="text-danger">{{ $message }}<br></small>
                    @enderror
                    @error('unit.*')
                        <small class="text-danger">{{ $message }}<br></small>
                    @enderror


                    <form method="post" action="dispatch">
                        @csrf

                        <table class="table" id="table1">

                            <tr id="tr3">
                                <td>
                                    <span>نام جنس</span> <input id="hide_name" hidden>
                                    <select class="form-control text-danger" id="dropdown">
                                        @foreach ($item as $key => $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td> <span> کتګوری</span><input class="form-control text-danger" type="text"
                                        id="catagory" placeholder="Catagory"></td>
                                <td> <span>واحد جنس </span><input class="form-control text-danger" type="text"
                                        id="unit" placeholder="unit"></td>
                                <td> <span>مقدار جنس</span><input type="number" id="quntity"
                                        class="form-control text-danger" placeholder="Quntity"></td>
                            </tr>
                            <tr id="tr1">
                                <td><input id="add_more" type="button" class="btn btn-primary btn-sm form-control"
                                        value="اضافه کړی"></td>
                            </tr>
                            <tr id="tr2">
                                <td><input type="button" id="select" class="form-control" value="انتخاب">
                                </td>
                                <td><span class="text-success">
                                        <h4>معتمدین </h4>
                                    </span>
                                    <select class="form-control text-danger" name="fiducial">
                                        @foreach ($fid as $key => $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>

                                </td>
                                <td> <button class="btn btn-success" type="submit" id="submit" style="display:none">ثپت
                                        <i class="fas fa-save"></i></button>
                                </td>
                            </tr>
                        </table>

                </div>




                </form>

                {{-- End of Information Table --}}
            </div>

            <table class="table" id="table3">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Name</td>
                        <td>Father</td>
                        <td>Job</td>
                        <td>Department</td>
                    </tr>
                </thead>

                @foreach ($fid as $key => $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->Father }}</td>
                        <td>{{ $value->job }}</td>
                        <td>{{ $value->department }}</td>
                        <td><a class="btn btn-info" href="info/{{ $value->id }}">info</a></td>
                    </tr>
                @endforeach


            </table>

    </section>
    <script>
        $(document).ready(function() {



            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $("#searchDiv").hide();
            $("#search").click(function() {
                $("#searchDiv").toggle(100);
            })
            $("#display").click(function() {
                $('#dispatch').css('display', 'block');
                $('#table3').css('display', 'none');

            })
            $("#display_fiducial").click(function() {
                $('#table3').css('display', 'table');
                $('#dispatch').css('display', 'none');

            })
            $("#select").click(function() {
                $("#tr3").show();
                $("#tr1").show();
                $("h4").val("  معتمد انتخاب شو ");
            })
            var q;
            var u;
            var c;

            $("#dropdown").change(function() {


                $.ajax({
                    type: "get",
                    url: "selected/" + $(this).val(),
                    success: function(response) {
                        q = $("#quntity").val(response.item.total_quntity);
                        u = $("#unit").val(response.item.unit.name);
                        c = $("#catagory").val(response.item.catagory.name);
                        n = $("#hide_name").val(response.item.name);
                    },
                })
            })
            $("#add_more").click(function() {
                $("#submit").show();
                $("#table1").prepend(
                    "<tr>    <td><input name='remove' type='button'   class=' remove btn btn-danger' value='Remove')'></td>    <td><input  class='form-control' hidden value='" +
                    $('#dropdown').val() +
                    "' name='item[]'  ><input class='form-control' id='hide_nam' value='" + $(
                        "#hide_name").val() +
                    "' ></td>      <td><input name='catagory[]'  class='form-control' value='" +
                    $('#catagory')
                    .val() + "'></td>   <td><input name='unit[]'  class='form-control' value='" + $(
                        '#unit')
                    .val() + "'></td>   <td><input name=quntity[]  class='form-control' value='" + $(
                        '#quntity').val() + "'></td></tr>")
            })
            $(document).on('click', 'input.remove', function() {
                $(this).parent().parent().remove();
            })
            $("#submit").click(function() {
                $("#display").click();
            });




        });
    </script>
@endsection
