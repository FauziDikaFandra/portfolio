@extends('goods/Layout/main')
<!-- ambil dari template main.blade.php harus pakai blade di file name dan tanpa blade di page -->

@section('title','Inventory')
<!-- yield yang ada di main.blade.php -->

@section('container')
<!-- yield yang ada di main.blade.php karena lebih dari satu baris harus ada endsection di pling bawah -->

<h2 class="mb-3 mt-3">@yield('title')</h2> <!-- yield itu parameter dikirim ke page yg section nya title -->

<div class="starter-template mt-3  shadow p-3 mb-2 bg-white rounded">
    <form action="{{url('/goods/inventory/view')}}" method="post">
        <div class="form-row">
            <div class="form-group col-md-3">
                <label>Document Date</label>
                <input type="date" class="form-control" id="docdate" name="docdate" value="{{$docdate ?? ''}}">
            </div>

            <div class="form-group col-md-3">
                <label for="brand">Brand</label>
                <select id="brand" class="form-control" name="brand">
                    <option>**ALL BRAND**</option>
                    @foreach ($brandall ?? '' as $brn)
                    @if ($brn->brand === $brand)
                    <option selected>{{$brn->brand}}</option>
                    @else
                    <option>{{$brn->brand}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                <button type="submit" class="btn btn-primary"><span class="mr-2" data-feather="monitor"> </span>Show</button>
                <!-- <div class="dropdown"> -->
                <button class="btn btn-primary" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span data-feather="printer"></span> Export
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="{{route('export.excel',['brand'=>$brand,'date'=>$docdate ?? ''])}}"><span class="mr-2" data-feather="paperclip"></span>Excel</a>
                    <a class="dropdown-item" href="{{route('export.pdf',['brand'=>$brand,'date'=>$docdate ?? ''])}}"><span class="mr-2" data-feather="paperclip"></span>PDF</a>
                </div>
                <!-- </div> -->
            </div>


        </div>

        <!-- <a class="btn btn-primary" href="{{route('export.excel',['brand'=>$brand,'date'=>$docdate ?? ''])}}" role="button">Export Excel</a>
        <a class="btn btn-primary" href="{{route('export.pdf',['brand'=>$brand,'date'=>$docdate ?? ''])}}" role="button">Export PDF</a> -->
    </form>


</div>

<!-- <h6 class="float-right mt-5 font-weight-bold">{{$nama ?? ''}}</h6>  $nama diambil dari router web.php -->
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
    {{-- Pagination --}}
    <div>

        @if ($brand === '**ALL BRAND**')
        {{$inventory->links()}}
        <!--apabila menggunakan GET -->
        @else
        {{ $inventory->appends(request()->except('page'))->links() }}
        <!--apabila menggunakan POST-->
        @endif




    </div>
</div>

@endsection