<!doctype html>
<html lang="en">

<head>

</head>

<body>

    <div class="table-responsive mt-3 shadow p-3 mb-5 bg-white rounded">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th width="150px">GR Code</th>
                    <th width="80px">Status</th>
                    <th width="150px">Document Date</th>
                    <th width="130px">Vendor Code</th>
                    <th width="250px">Vendor Name</th>
                    <th>Remarks</th>

                </tr>
            </thead>
            <tbody>

                @if (count($goodsreceipt) > 0)
                @foreach ($goodsreceipt as $gr)
                <tr>
                    <td>{{$gr->gr_code}}</td>
                    <td>{{$gr->status}}</td>
                    <td>{{date("d F Y", strtotime($gr->documentdate))}}</td>
                    <td>{{$gr->vendor_code}}</td>
                    <td>{{$gr->vendorname}}</td>
                    <td>{{$gr->remarks}}</td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="7" class="text-center font-italic"><span style="color: black;">No record found !!!'</span></td>
                </tr>
                @endif
            </tbody>
        </table>
        <div>
</body>

</html>