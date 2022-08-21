@extends('../welcome')
@section('content')
<div class="col-md-12 stretch-card">

    <div class="card">

        @if (Session::has('message'))
        <span class="alert alert-success">{{ Session::get('message') }}</span>
        @endif
        @if (Session::has('error'))
        <span class="alert alert-error">{{ Session::get('message') }}</span>
        @endif
        <div class="card-header">

            <div class="card-tools">
                <button class="form-contro btn m-1 btn-primary float-start" data-bs-toggle="modal" data-bs-target="#studenteModal" id="add-inventory">اضافه کول</button>



                <form method="post" action="search">
                    @csrf
                    <a href="#" class="form-contro btn m-1 btn-success float-start " id="addINV"> پلټنه
                    </a><br>
                    <div class="row container p-2" id="search" style="display:none">
                        <div class="col-md-1"><button class="btn btn-secondary">پلټل</button></div>
                        <div class="col-md-11"><input class="form-control" name="search" placeholder="د بل نمبر داخل کړی ">
                        </div>
                    </div>


                </form>
            </div>
        </div>

        <div class="card-body">

            <form method="POST" action="Save_Data">
                @csrf
                <table class='table' id="table1" style="display:none">

                    <thead>
                        <tr>
                            <td>
                                <div class="alert alert-error">
                                    @error('invoice')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    @error('remark')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    @error('name.*')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    @error('catagory.*')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    @error('quntity.*')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                            </td>
                        </tr>
                    </thead>
                    <tr>
                        <td collapse="4"><button type='submit' class='btn btn-primary m-1 ' id='back_btn'>Save</button>
                        </td>
                        <td><a class='btn btn-success m-1 ' id='back_btn2'>Add More</a></td>
                    </tr>

                    <tr>
                        <td><label class="text-primary"> انوایس نمبر</label><input class='form-control' type='text' name='invoice'></td>
                        <td><label class="text-primary">ملاحضات </label><input class='form-control' name='remark' type='text'></td>
                        <td><label class="text-primary"> عکس</label><input class='form-control' name="image" type='file'></td>

                    </tr>
                    <tr>

                        <td><label class="text-primary">نوم </label><input class='form-control' type='text' name='name[]'></td>

                        <td><label class="text-primary">ډیپو </label><select name="depot[]" class="form-control">
                                @foreach ($depot as $key => $value)
                                <option value='{{ $value->id }}'>{{ $value->name }}</option>
                                @endforeach
                            </select></td>
                        <td><label class="text-primary">اندازه </label>
                            <input class='form-control' name="quntity[]" type='number'>
                        </td>

                        <td><label class="text-primary">واحد </label><select name="unit[]" class="form-control">
                                @foreach ($unit as $key => $value)
                                <option value='{{ $value->id }}'>{{ $value->name }}</option>
                                @endforeach
                            </select></td>

                        </td>
                        <td><label class="text-primary">کتګوری</label><select name="catagory[]" class="form-control">
                                @foreach ($catagory as $key => $value)
                                <option value='{{ $value->id }}'>{{ $value->name }}</option>
                                @endforeach
                            </select></td>
                        <td><label class="text-primary">نوع</label> <select name="type[]" class="form-control">
                                <option>سلاح</option>
                                <option>البسه</option>
                            </select></td>

                    </tr>
                </table>



                <div class="container">
                    <table class="table" id="table2" style="display:table">
                        <thead>
                            <tr>
                                <td>Invoic</td>
                                <td>Remark</td>
                            </tr>
                        </thead>
                        @foreach ($data as $key => $value)
                        <tr>
                            <td>{{ $value->invoice_number }}</td>
                            <td>{{ $value->remark }}</td>
                            <td><a class="btn btn-info" href="search/{{ $value->id }}">Info</a></td>
                        </tr>
                        @endforeach

                    </table>
                </div>
            </form>

        </div>
    </div>
</div>






<script>
    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });



        $("#addINV").click(function(e) {

            $("#search").toggle(0);
        });
        var index = 0;
        $("#table2").show("fast");
        $("#add-inventory").click(function() {
            $("#table1").toggle(10);
            $("#table2").toggle(100);

        })
        $("#back_btn2").click(function() {
            $("#table1").append(
                " <tr><td><label class='text-primary' >نوم </label><input class='form-control'placeholder='name' type='text' name='name[]'></td><td><label class='text-primary'>ډیپو </label><select name='depot[]' class='form-control'><option value='{{$value->id}}'>@foreach ($depot as $key => $value) <option value='{{$value->id}}'>{{$value->name}}</option> @endforeach</select></td><td><label class='text-primary'>اندازه </label><input class='form-control' name='quntity[]' type='number'></td> <td><label class='text-primary'>واحد </label><select name='unit[]' class='form-control' placeholder='َunit'>@foreach ($unit as $key => $value)<option value='{{$value->id}}'>{{ $value->name }}</option> @endforeach</select></td> <td><label class='text-primary'>کتګوری</label><select name='catagory[]' class='form-control' placeholder='catagory'>@foreach ($catagory as $key => $value)<option value='{{ $value->id }}'>{{$value->name}}</option> @endforeach </select></td></td><td><label class='text-primary'>نوع</label><select name='type[]' class='form-control' placeholder='Type'><option>سلاح</option><option>البسه</option></select></td><td><label>.</label><a id='delete' class='btn btn-sm btn-danger'>DEll</a></td></tr>"
            );
        })



        function sweet() {

            Swal.fire({
                position: 'bottom-end'
                , icon: 'success'
                , title: 'Your work has been saved'
                , showConfirmButton: false
                , timer: 1700
            });
        }
        $(document).on("click","#delete",function() {
            $(this).parent().parent().remove();
        })

    });

</script>
@endsection
