<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<div class="container m-5">
    <button class="btn btn-primary " id="print" onclick="printf()">Print</button>
    <h4 class="container m-5 " style="text-align:center"> ډیپو {{$d->name}}</h4>
    <table class="table">
        <thead>
            <tr>
                <td>جنس</td>
                <td>مقدار</td>
                <td>واحد</td>
                <td>کتګوری</td>
            </tr>
        </thead>
        <tbody>
            @foreach($d->item as $key => $value)
            <tr>
                <td>{{$value->name}}</td>
                <td>{{$value->total_quntity}}</td>
                <td>{{$value->unit->name}}</td>
                <td>{{$value->catagory->name}}</td>
            </tr>
            @endforeach



        </tbody>
    </table>
</div>
<script>
    function printf() {
        var p = document.getElementById("print")
        p.style.visibility = "hidden";
        window.print();

        p.style.visibility = "visible";

    }
</script>