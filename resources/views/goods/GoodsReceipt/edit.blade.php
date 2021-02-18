@extends('goods/Layout/main')
<!-- ambil dari template main.blade.php harus pakai blade di file name dan tanpa blade di page -->

@section('title','Goods Receipt')
<!-- yield yang ada di main.blade.php -->

@section('container')
<!-- yield yang ada di main.blade.php karena lebih dari satu baris harus ada endsection di pling bawah -->

<div class="starter-template mt-3  shadow p-3 mb-5 bg-white rounded">
    <!-- <form action="/goods-receipt/update" method="post"> -->
    <form action="{{url('/goods/goods-receipt/change')}}" method="post">

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="gr_code">GR Code</label>
                <input type="text" class="form-control" id="gr_code" placeholder="GR Code" name="gr_code" value="{{$goodsreceipt[0]->gr_code}}" readonly>
            </div>
            <div class="form-group col-md-4">
                <label for="status">Status</label>
                <select id="status" name="status" class="form-control">
                    @if ($goodsreceipt[0]->status === 'POST')
                    <option selected>POST</option>
                    <option>OPEN</option>
                    <option>CLOSE</option>
                    <option>CANCEL</option>
                    @elseif ($goodsreceipt[0]->status === 'OPEN')
                    <option>POST</option>
                    <option selected>OPEN</option>
                    <option>CLOSE</option>
                    <option>CANCEL</option>
                    @elseif ($goodsreceipt[0]->status === 'CLOSE')
                    <option>POST</option>
                    <option>OPEN</option>
                    <option selected>CLOSE</option>
                    <option>CANCEL</option>
                    @else
                    <option>OPEN</option>
                    <option>POST</option>
                    <option>CLOSE</option>
                    <option selected>CANCEL</option>
                    @endif
                </select>
            </div>

        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label>Document Date</label>
                <input type="date" class="form-control" id="docdate" name="docdate" value="{{date('Y-m-d', strtotime($goodsreceipt[0]->documentdate))}}">
            </div>
            <div class="form-group col-md-6">
                <label for="vendor_code">Vendor</label>
                <select id="vendor_code" class="form-control" name="vendor_code">
                    @foreach ($vendorall ?? '' as $vnd)
                    @if ($vnd->name . ' - ' . $vnd->vendor_code === $vendor)
                    <option selected>{{$vnd->name . ' - ' .  $vnd->vendor_code}}</option>
                    @else
                    <option>{{$vnd->name . ' - ' .  $vnd->vendor_code}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
        </div>

        <div class=" form-row">
            <div class="form-group col-md-10">
                <label for="remarks">Remarks</label>
                <input type="text" class="form-control" id="remarks" name="remarks" placeholder="Remarks" value="{{$goodsreceipt[0]->remarks}}">
            </div>
        </div>
        <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
        <button type=" submit" class="btn btn-primary">Update</button>
        <span class="mr-5" style="color: red;">{{$status ?? '' != '' ?  'Please Entry Receipt Detail First !!!' : ''}}</span>
    </form>
</div>

@endsection