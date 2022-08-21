<body id="bodypage">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <div class="container m-5 p-5">
        <button id="print" class="btn btn-primary" onclick="printf()">print</button>
        <div class="container m-5">
            <table class="table" border="0">
                <thead class=" m-5">
                    <tr>
                        <td>Id</td>
                        <td>Name</td>
                        <td>Father</td>
                        <td>Department</td>
                    </tr>
                    <tr class=" bg-secondary">
                        <td>{{ $info->id }}</td>
                        <td>{{ $info->name }}</td>
                        <td>{{ $info->Father }}</td>
                        <td>{{ $info->department }}</td>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="container m-5">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <td>item</td>
                        <td>Catagoty</td>
                        <td>Depot</td>
                        <td>Unit</td>
                        <td>Quntity</td>
                        <td>date</td>
                    </tr>
                </thead>

                @foreach ($info->order as $key => $value)
                    <tr>
                       <td> {{ $value->item->name }}</td>
                        <td> {{ $value->item->catagory->name }}</td>
                        <td> {{ $value->item->depot->name }}</td>
                        <td> {{ $value->item->unit->name }}</td>
                         <td> {{ $value->quntity }}</td>
                        <td> {{ $value->item->created_at }}</td>
                    </tr>
                @endforeach


            </table>
        </div>

    </div>


</body>



<script>
    function printf() {
        var p = document.getElementById("print")
        p.style.visibility = "hidden";
        window.print();

        p.style.visibility = "visible";

    }
</script>
