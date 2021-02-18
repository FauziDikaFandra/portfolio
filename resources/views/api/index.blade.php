@extends('api/layout/main')

@section('localapi')

<div class="menu border rounded mb-5">
    <form action="#" class="px-4 py-3" method="post">
        <div class="form-row">
            <div class="form-group col-md-6">
                <input type="text" class="form-control" id="newplu" placeholder="Enter New PLU">
            </div>
            <div class="form-group col-md-6">
                <input type="text" class="form-control" id="newdescription" placeholder="Enter New Description">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <input type="text" class="form-control" id="newprice" placeholder="Enter New Price">
            </div>
            <div class="form-group col-md-6">
                <input type="text" class="form-control" id="newbrand" placeholder="Enter New Brand">
            </div>
        </div>
        <button type="submit" class="btn btn-primary" id="save">Submit</button>

    </form>
    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
</div>

<div class="input-group mb-3">
    <input type="text" id="splu" class="form-control" placeholder="Insert PLU here" aria-label="Insert PLU" aria-describedby="button-addon2">
    <div class="input-group-append">
        <button class="btn btn-outline-secondary" type="button" id="search">Search</button>
    </div>
</div>
<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col">No.</th>
            <th scope="col">PLU</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
            <th scope="col">MC</th>
            <th scope="col">Brand</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody id="hasil">
        <tr>
            <th colspan="6" class="text-center font-italic font-weight-normal">no record ...</th>

        </tr>

    </tbody>
</table>
<hr>

@endsection

@section('publicapiimdb')

<div class="container">

    <div class="page-header mt-4">
        <h3>Search Movie</h3>
    </div>

    <div class="row">
        <div class="col">
            <form class="form-inline">
                <input id="input-movie" class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Enter Movie Title Here.." aria-label="Search">
                <a id="click-movie" href="#"> <i class="fa fa-search" aria-hidden="true"></i> </a>
            </form>
        </div>
    </div>
    <hr>

    <div class="row" id="movie-list">


    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('publicapiytb')

<div class="container">

    <div class="page-header mt-4">
        <h3>Search Video</h3>
    </div>

    <div class="row">
        <div class="col">
            <form class="form-inline">
                <input id="input-video" class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Enter Video Description Here.." aria-label="Search">
                <a id="click-video" href="#"> <i class="fa fa-search" aria-hidden="true"></i> </a>
            </form>
        </div>
    </div>
    <hr>

    <div class="row" id="video-list">


    </div>
</div>

<!-- Modal -->
<!-- <div class="modal fade" id="exampleModalCenterVideo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitleVideo">Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> -->

@endsection