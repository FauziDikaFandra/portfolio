@extends('goods/Layout/main')
<!-- ambil dari template main.blade.php harus pakai blade di file name dan tanpa blade di page -->

@section('title','Goods Return')
<!-- yield yang ada di main.blade.php -->

@section('container')
<!-- yield yang ada di main.blade.php karena lebih dari satu baris harus ada endsection di pling bawah -->


<h2 class="mt-3 mb-3">@yield('title')</h2> <!-- yield itu parameter dikirim ke page yg section nya title -->

<div class="starter-template mt-3  shadow p-3 mb-2 bg-white rounded">

    <form action="{{url('/goods/goods-return/createnew')}}" method="post">

        <div class="form-row">
            <div class="form-group col-md-3">
                <label>Document Date</label>
                <input type="date" class="form-control" id="docdate" name="docdate" value="{{date('Y-m-d')}}">
            </div>
            <div class="form-group col-md-3">
                <label for="status">Status</label>
                <select id="status" class="form-control" name="status">
                    <option selected>OPEN</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="vendor_code">Vendor</label>
                <select id="vendor_code" class="form-control" name="vendor_code">
                    @foreach ($vendorall ?? '' as $vnd)
                    <option>{{$vnd->name . ' - ' .  $vnd->vendor_code}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-10">
                <label for="remarks">Remarks</label>
                <input type="text" class="form-control" id="remarks" placeholder="Remarks" name="remarks">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3 pt-1">
                <button type="submit" class="btn btn-primary mt-1"><span class="mr-2 mt-1" data-feather="save"> </span>Create</button>
                <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
            </div>
        </div>
    </form>
</div>




@endsection