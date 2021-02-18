@extends('goods/Layout/main')
<!-- ambil dari template main.blade.php harus pakai blade di file name dan tanpa blade di page -->

@section('title','Goods Receipt Details')
<!-- yield yang ada di main.blade.php -->

@section('container')
<!-- yield yang ada di main.blade.php karena lebih dari satu baris harus ada endsection di pling bawah -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
    .box {
        width: 600px;
        margin: 0 auto;
    }
</style>

<h2 class="mt-3 mb-3">@yield('title')</h2> <!-- yield itu parameter dikirim ke page yg section nya title -->


<div class="starter-template mt-3  shadow p-3 mb-2 bg-white rounded">
    <form action="{{url('/goods/goods-receipt-details/create')}}" method="post">
        <div class="form-row">
            <div class="form-group col-md-2">
                <label for="gr_code">GR Code</label>
                <input type="text" class="form-control" id="gr_code" name="gr_code" value="{{$gr_code}}" readonly>
            </div>


            <div class="form-group col-md-7">
                <label for="gr_code">Item Code</label>
                <input type="text" name="item" id="item" class="form-control {{ $errors->has('item') ? 'is-invalid' : '' }}" placeholder="Enter ItemCode / Description" value="{{ old('item') }}" autofocus />
                @if ($errors->has('item'))
                <span class=" text-danger">{{ $errors->first('item') }}</span>
                @endif
                <div class="dropdown-menu" id="itemList">
                </div>
            </div>
            {{ csrf_field() }}


            <div class="form-group col-md-1">
                <label for="quantity">Quantity</label>
                <input type="text" class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" id="quantity" placeholder="Qty" name="quantity" value="{{ old('quantity') }}">
                @if ($errors->has('quantity'))
                <span class="text-danger">{{ $errors->first('quantity') }}</span>
                @endif
            </div>

            <div class="form-group col-md-2 pt-4 mt-1">
                <button type="submit" class="btn btn-primary"><span class="mr-2" data-feather="plus"> </span>Add</button>
                <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
            </div>




        </div>
    </form>
</div>

<div class="table-responsive mt-3  shadow p-3 mb-5 bg-white rounded">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th width="60px">No</th>
                <th width="80px">Article Code</th>
                <th width="270px">Description</th>
                <th width="60px">Price</th>
                <th width="100px">Brand</th>
                <th width="60px">Quantity</th>
                <th width="90px"></th>

            </tr>
        </thead>
        <tbody>
            <?php $line = 0;
            $total = 0; ?>
            @foreach ($goodsreceiptdetails ?? '' as $gr)
            <?php $line++;
            $total += $gr->qty ?>
            <tr>
                <td>{{$line}}</td>
                <td>{{$gr->article_code}}</td>
                <td>{{$gr->description}}</td>
                <td>{{$gr->price}}</td>
                <td>{{$gr->brand}}</td>
                <td>{{$gr->qty}}</td>
                <td>
                    <div class="dropdown">
                        <button class="btn btn-default border btn-sm " type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span data-feather="menu"></span>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="{{route('delete.detailGR',['id'=>$gr->gr_code,'article'=>$gr->article_code])}}"><span class="mr-2" data-feather="delete"></span>Delete</a>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
            <tr>
                <td colspan="5" class="font-weight-bold">Total</td>
                <td class="font-weight-bold">
                    {{$total}}
                </td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function() {

        $('#item').keyup(function() {

            var query = $(this).val();
            if (query != '') {

                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ route('autocomplete.fetch') }}",
                    method: "POST",
                    data: {
                        query: query,
                        _token: _token
                    },
                    success: function(data) {
                        $('#itemList').fadeIn();
                        $('#itemList').html(data);
                    }
                });
            }
        });

        $(document).on('click', 'a', function() {
            $('#item').val($(this).text());
            $('#itemList').fadeOut();
        });

    });
</script>

@endsection