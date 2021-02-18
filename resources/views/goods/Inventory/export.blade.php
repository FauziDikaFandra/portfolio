<!doctype html>
<html lang="en">

<head>

</head>

<body>
    <?php
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Inventory.xls");
    header("Pragma: no-cache");
    header("Expires: 0");
    ?>
    <div class="table-responsive mt-3 shadow p-3 mb-5 bg-white rounded">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>Article Code</th>
                    <th>First Stock</th>
                    <th>Sales</th>
                    <th>Refund</th>
                    <th>Return</th>
                    <th>Receipt</th>
                    <th>Adjust +</th>
                    <th>Adjust -</th>
                    <th>Receipt</th>
                    <th>Transfer Out</th>
                    <th>Transfer In</th>
                    <th>Last Stock</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($inventory as $iv)
                <tr>
                    <td>{{$iv->plu}}</td>
                    <td>{{$iv->first_stok}}</td>
                    <td>{{$iv->sales}}</td>
                    <td>{{$iv->refund}}</td>
                    <td>{{$iv->retur}}</td>
                    <td>{{$iv->receipt_po}}</td>
                    <td>{{$iv->retur}}</td>
                    <td>{{$iv->issue}}</td>
                    <td>{{$iv->receipt}}</td>
                    <td>{{$iv->transferOut}}</td>
                    <td>{{$iv->transferIn}}</td>
                    <td>{{$iv->last_stok}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div>
</body>

</html>