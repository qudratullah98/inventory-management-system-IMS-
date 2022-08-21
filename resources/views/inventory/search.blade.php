<body id="bodypage">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
    <div class="container m-5 p-5">
    <button id="print" class="btn btn-primary" onclick="printf()">print</button>

            <div class="container m-5 text-success" style="text-align:center">
                <?php $invoice=0; $remark=0; foreach($inv as $i){$invoice=$i->invoice->invoice_number;$remark=$i->invoice->remark;} ?>
                <div class="container m-5"><h4 class="form-contro">  <h5> <span>تعداد اجناس موجود در سیستم  با انوایس نمبر({{$invoice}}) وملاحضات ({{$remark}}) </span></h5></div>
        <table class="table">
            <thead>
                <tr>
                    <td>Item</td>
                    <td>Quntity</td>
                    <td>Catagoty</td>
                    <td>Depot</td>
                    <td>Unit</td>
                </tr>
            </thead>
            @foreach ($inv as $key => $value)
                <tr>
                    <td>
                        {{ $value->item->name }}
                    </td>
                  
                
                 
                    <td>
                        {{ $value->item->total_quntity }}
                    </td>
                    <td>
                        {{ $value->item->catagory->name }}
                    </td>
                    <td>
                        {{ $value->item->depot->name }}
                    </td> <td>
                        {{ $value->item->unit->name }}
                    </td>

                </tr>
            @endforeach
        </table>

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
