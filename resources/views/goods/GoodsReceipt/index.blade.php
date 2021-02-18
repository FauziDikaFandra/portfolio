@extends('goods/Layout/main')
<!-- ambil dari template main.blade.php harus pakai blade di file name dan tanpa blade di page -->

@section('title','Goods Receipt')
<!-- yield yang ada di main.blade.php -->

@section('container')
<!-- yield yang ada di main.blade.php karena lebih dari satu baris harus ada endsection di pling bawah -->


<h2 class="mt-3 mb-3">@yield('title')</h2> <!-- yield itu parameter dikirim ke page yg section nya title -->

<div class="starter-template mt-3  shadow p-3 mb-2 bg-white rounded">

    <form action="{{url('goods/goods-receipt/view')}}" method="post">

        <div class="form-row">
            <div class="form-group col-md-3">
                <label>Document Date</label>
                <input type="date" class="form-control" id="docdate" name="docdate" value="<?= $docdate ?>">
            </div>
            <div class="form-group col-md-3">
                <label for="status">Status</label>
                <select id="status" class="form-control" name="status">
                    @if ($status === 'ALL STATUS')
                    <option selected>ALL STATUS</option>
                    <option>OPEN</option>
                    <option>POST</option>
                    <option>CLOSE</option>
                    <option>CANCEL</option>
                    @elseif ($status === 'POST')
                    <option>ALL STATUS</option>
                    <option selected>POST</option>
                    <option>OPEN</option>
                    <option>CLOSE</option>
                    <option>CANCEL</option>
                    @elseif ($status === 'OPEN')
                    <option>ALL STATUS</option>
                    <option>POST</option>
                    <option selected>OPEN</option>
                    <option>CLOSE</option>
                    <option>CANCEL</option>
                    @elseif ($status === 'CLOSE')
                    <option>ALL STATUS</option>
                    <option>POST</option>
                    <option>OPEN</option>
                    <option selected>CLOSE</option>
                    <option>CANCEL</option>
                    @else
                    <option>ALL STATUS</option>
                    <option>OPEN</option>
                    <option>POST</option>
                    <option>CLOSE</option>
                    <option selected>CANCEL</option>
                    @endif
                </select>
            </div>

            <div class="form-group col-md-4">
                <label for="vendor_code">Vendor Code</label>
                <select id="vendor_code" class="form-control" name="vendor_code">
                    <option>**ALL VENDOR**</option>
                    @foreach ($vendorall as $vnd)
                    @if ($vnd->name . ' - ' . $vnd->vendor_code === $vendor)
                    <option selected>{{$vnd->name . ' - ' .  $vnd->vendor_code}}</option>
                    @else
                    <option>{{$vnd->name . ' - ' .  $vnd->vendor_code}}</option>
                    @endif
                    @endforeach
                </select>
            </div>



        </div>
        <div class="form-row">

            <div class="form-group col-md-6">

                <button type="submit" class="btn btn-primary"><span class="mr-2" data-feather="monitor"> </span>Show</button>
                <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                <!-- <div class="dropdown"> -->
                <button class="btn btn-primary" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span data-feather="printer"></span> Export
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="{{route('export.excelGoodsReceipt',['date'=>$docdate ?? '','status' => $status, 'vendor' => $vendor])}}"><span class="mr-2" data-feather="paperclip"></span>Excel</a>
                    <a class="dropdown-item" href="{{route('export.pdfGoodsReceipt',['date'=>$docdate ?? '','status' => $status, 'vendor' => $vendor])}}"><span class="mr-2" data-feather="paperclip"></span>PDF</a>
                </div>
                <!-- </div> -->

            </div>

        </div>
    </form>
</div>

<div class="table-responsive mt-3  shadow p-3 mb-5 bg-white rounded">
    <a class="btn btn-primary btn-sm mb-2" href="/goods/goods-receipt/create"><span class="mr-2" data-feather="plus"></span>Add New</a>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th width="150px">GR Code</th>
                <th width="80px">Status</th>
                <th width="150px">Document Date</th>
                <th width="130px">Vendor Code</th>
                <th width="250px">Vendor Name</th>
                <th>Remarks</th>
                <th width="70px"></th>

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
                <td>
                    <div class="dropdown">
                        <button class="btn btn-default border btn-sm " type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span data-feather="menu"></span>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="/goods/goods-receipt/{{$gr->gr_code}}" <?= ($gr->status != 'OPEN') ? 'hidden' : '' ?>><span class="mr-2" data-feather="edit"></span>Edit</a>
                            <a class="dropdown-item" href="/goods/goods-receipt-details/{{$gr->gr_code}}"><span class="mr-2" data-feather="file-text"></span>Details</a>
                            <a class="dropdown-item" href="/goods/goods-receipt/delete/{{$gr->gr_code}}" <?= ($gr->status != 'OPEN') ? 'hidden' : '' ?>><span class="mr-2" data-feather="delete"></span>Delete</a>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="7" class="text-center font-italic"><span style="color: black;">No record found !!!'</span></td>
            </tr>
            @endif
        </tbody>
    </table>
    {{-- Pagination --}}
    <div>


        {{$goodsreceipt->links()}}






    </div>
</div>


@endsection