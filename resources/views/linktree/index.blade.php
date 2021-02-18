@extends('linktree/layout/main')

@section('link')
<!-- <form method="POST" action=""> -->
<div id="gswd_linkInput">
    <!-- <div class="input-group mb-4">
        <input type="url" name="link" class="form-control rounded-25 field-link px-4 url" placeholder="Paste your link here">
        <div class="input-group-append ml-4">
            <button class="gswd_btnLinkSubmit btn btn-sm btn-primary rounded-25" type="button"><i class="fa-fw fa fa-plus"></i> Add New Link</button>
        </div>
    </div> -->
    <div class="input-group mb-4">
        <div class="input-group-prepend">
            <span class="input-group-text radiusChangeLeft field-link px-4"><i class="fa fa-link"></i></span>
        </div>
        <input type="text" name="link" style="outline:none;" class="form-control field-link url" placeholder="Paste your link here" aria-label="Amount (to the nearest dollar)">
        <div class="input-group-append">
            <button class="gswd_btnLinkSubmit btn btn-sm btn-primary radiusChangeRight" type="button"><i class="fa-fw fa fa-plus mr-2"></i>Add New Link</button>
        </div>
    </div>
    <!-- <div class="row">
        <div class="col">
            <div class="form-group mb-4">
                <span class="fa fa-link form-control-icon"></span>
                <input type="url" class="form-control field-link url" placeholder="Paste your link here">
                <div class=" input-group-append">
                    <button class="gswd_btnLinkSubmit btn btn-sm btn-primary rounded-25" type="button"><i class="fa-fw fa fa-plus"></i> Add New Link</button>
                </div>
            </div>
        </div>

    </div> -->


    <div id="gswd_linkBtn"></div>

    <div id="gswd_linkAlert" class="border bg-white rounded-15 shadow-sm p-3">
        <div class="gswd_linkAlert alert alert-success small text-center m-0 p-2">
            <i class="fa-fw fa fa-info-circle"></i> Please enter your link address in the input field above to add ..
        </div>
    </div>
</div>

<div id="gswd_fieldLink"></div>

<div id="gswd_fieldLinkAppend" class="gswd_fieldLinkAppendItem form-group d-none">
    <div class="border bg-white rounded-15 shadow-sm pl-3">
        <div class="row align-items-center">
            <div class="col-12 col-lg-3 col-xl-2 mb-3 mb-lg-0">
                <img src="" style="width:80%" class="gswd_linkThumbnail rounded shadow-sm img-fluid" alt="no-img">
            </div>

            <div class="col-12 col-lg-9 col-xl-7">
                <a id="gswd_linkHref" class="gswd_linkHref text-info text-center text-lg-left" href="" target="_blank">
                    <h6 class="gswd_linkTitle text-dark mb-1 font-weight-bold"></h6>
                    <span class="gswd_linkHrefAlt d-none d-md-block"></span>
                </a>


            </div>

            <div class="col-12 col-xl-3">
                <hr class="my-2 d-xl-none" />

                <div class="d-flex">

                    <div class="d-inline-block ml-auto">
                        <span class="dropdown mx-2">
                            <!-- <a class="text-muted-alt dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa-fw fa fa-share-alt fa-lg"></i></a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div> -->
                            <div class="custom-control custom-switch mt-3" style="line-height: 1.7;">
                                <input type="checkbox" class="gswd_linkSwitchId custom-control-input" id="" checked>
                                <label class="gswd_linkSwitchFor custom-control-label" for=""></label>
                                <a href="#" class="gswd_linkItemRemove text-danger mx-2" data-itemid=""><i class="fa-fw far fa-trash-alt fa-lg"></i></a>
                            </div>

                        </span>
                        <!-- <a href="#" class="text-muted-alt mx-2"><i class="fa-fw fa fa-share-square fa-lg"></i></a> -->


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
<input name="invisible" id="invisible" type="hidden" value="{{$nama ?? ''}}">
<!-- </form> -->
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
@endsection

@section('sosial')

<?php
$sosmedInit = [
    ['id' => 1, 'name' => 'whatsapp', 'slug' => 'whatsapp', 'icon' => 'fa-fw fab fa-lg fa-whatsapp', 'placeholder' => '+62 xxxxxxxxxxx', 'color' => 'success'],
    ['id' => 2, 'name' => 'facebook', 'slug' => 'facebook', 'icon' => 'fa-fw fab fa-lg fa-facebook-f', 'placeholder' => 'https://www.facebook.com/public/your-account', 'color' => 'blue'],
    ['id' => 3, 'name' => 'twitter', 'slug' => 'twitter', 'icon' => 'fa-fw fab fa-lg fa-twitter', 'placeholder' => 'https://www.twitter.com/your-account', 'color' => 'blue-alt-1'],
    ['id' => 4, 'name' => 'youtube', 'slug' => 'youtube', 'icon' => 'fa-fw fab fa-lg fa-youtube', 'placeholder' => 'https://www.youtube.com/channel/your-id-channel', 'color' => 'red'],
    ['id' => 5, 'name' => 'pinterest', 'slug' => 'pinterest', 'icon' => 'fa-fw fab fa-lg fa-pinterest-p', 'placeholder' => 'https://www.pinterest.com/your-account', 'color' => 'red-alt-1'],
    ['id' => 6, 'name' => 'yahoo', 'slug' => 'yahoo', 'icon' => 'fa-fw fab fa-lg fa-yahoo', 'placeholder' => 'your-account@yahoo.com', 'color' => 'purple'],
    ['id' => 7, 'name' => 'wordpress', 'slug' => 'wordpress', 'icon' => 'fa-fw fab fa-lg fa-wordpress', 'placeholder' => 'https://www.your-wordpress-id.wordpress.com/', 'color' => 'blue-alt-2'],
    ['id' => 8, 'name' => 'linkedin', 'slug' => 'linkedin', 'icon' => 'fa-fw fab fa-lg fa-linkedin-in', 'placeholder' => 'https://www.id.linkedin.com/in/your-account', 'color' => 'blue-alt-2'],
    ['id' => 9, 'name' => 'line', 'slug' => 'line', 'icon' => 'fa-fw fab fa-lg fa-line', 'placeholder' => 'your-line-id', 'color' => 'green-alt-1'],
    ['id' => 10, 'name' => 'github', 'slug' => 'github', 'icon' => 'fa-fw fab fa-lg fa-github', 'placeholder' => 'https://www.github.com/XXX/your-account', 'color' => 'secondary'],
    ['id' => 11, 'name' => 'dropbox', 'slug' => 'dropbox', 'icon' => 'fa-fw fab fa-lg fa-dropbox', 'placeholder' => 'https://www.dropbox.com', 'color' => 'blue-alt-3'],
    ['id' => 12, 'name' => 'google-drive', 'slug' => 'google-drive', 'icon' => 'fa-fw fab fa-lg fa-google-drive', 'placeholder' => 'https://www.drive.google.com/file/d/XXX/view', 'color' => 'green-alt-2'],
    ['id' => 13, 'name' => 'at', 'slug' => 'at', 'icon' => 'fa-fw fa fa-lg fa-at', 'placeholder' => 'your-account@your-domain.com', 'color' => 'warning'],
];
?>
<div id="gswd_sosmedItem" class="form-group">
    <div class="border bg-white rounded-15 shadow-sm py-3 px-4 mb-4">
        <div class="form-row align-items-center">
            <div class="col-12 col-xl-8 mb-3 mb-xl-0 text-center text-lg-left">
                <?php foreach ($sosmedInit as $row) { ?>
                    <a href="#" class="btn btn-sm btn-outline-<?php print $row['color'] ?> mr-1 my-1" data-sosmed='<?php print json_encode($row); ?>'><i class="<?php print $row['icon'] ?>"></i></a>
                <?php } ?>
            </div>

            <div class="col-12 col-xl-4 text-right">
                <div class="custom-control custom-switch d-inline-block ml-4" style="line-height: 1.7;">
                    <input type="checkbox" class="custom-control-input" id="customSwitch_sosmed">
                    <label class="custom-control-label" for="customSwitch_sosmed">Tampilkan sebagai ikon</label>
                </div>
            </div>
        </div>
    </div>

    <div id="gswd_linkBtn"></div>

    <div id="gswd_sosmedAlert" class="border bg-white rounded-15 shadow-sm p-3">
        <div class="gswd_sosmedAlert alert alert-success small text-center m-0 p-2">
            <i class="fa-fw fa fa-info-circle"></i> Silahkan klik salah satu tombol media sosial di atas untuk menambahkan
        </div>
    </div>
</div>

<div id="gswd_fieldSosmed" class="form-group" style="display:none;">
    <div class="border bg-white rounded-15 shadow-sm py-3 px-4">
        <div class="media">
            <div class="gswd_fieldSosmed media-body"></div>
        </div>
    </div>
</div>

<div id="gswd_fieldSosmedAppend" class="gswd_fieldSosmedItem form-group py-3 m-0 d-none">
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="gswd_sosmedColor input-group-text bg-white border-0 pl-0"></div>
        </div>
        <input name="" type="text" class="gswd_sosmedFieldInput form-control" placeholder="">
        <div class="input-group-append">
            <a href="#" class="gswd_sosmedItemRemove input-group-text bg-white text-danger border-0 pr-0 pt-3 pb-0" data-itemid=""><i class="fa-fw far fa-trash-alt"></i></a>
        </div>
    </div>
</div>


@endsection

@section('appearance')
<div class="form-group mb-4">
    <label>Nama Akun</label>
    <div class="border bg-white rounded-15 shadow-sm py-3 px-4">
        <div class="media">
            <div class="media-body">
                <h5 class="text-dark mb-0">{{$nama ?? ''}}<span class="text-muted">.my.id</span></h5>
                <div class="text-muted">Nama domain Anda</div>
            </div>
            <div class="align-self-center ml-3">
                <a href="#" class="text-muted-alt ml-2" data-slug="account" target="_blank"><i class="fa-fw fa fa-external-link-alt"></i></a>
            </div>
        </div>
    </div>
</div>

<div class="form-group mb-4">
    <label>Avatar</label>
    <div class="border bg-white rounded-15 shadow-sm py-3 px-4">
        <div class="media mb-3 mb-lg-0">
            <div class="align-self-center mr-4">
                <i class="fa fa-user-circle fa-7x"></i>
            </div>
            <div class="media-body">
                <h5 class="text-dark mb-0">{{$nama ?? ''}}</h5>
                <div class="text-muted">Nama akun profil</div>

                <br />

                <div class="d-none d-lg-block">
                    <a href="#" class="btn btn-sm btn-danger rounded-15"><i class="fa-fw fa fa-upload"></i> Upload Foto</a>
                    <a href="#" class="btn btn-sm btn-outline-secondary rounded-15"><i class="fa-fw fa fa-times"></i> Hapus Foto</a>
                </div>
            </div>
            <div class="align-self-center d-none d-lg-block ml-3">
                <a href="#" class="gswd_displayEdit text-muted-alt ml-2" data-slug="avatar"><i class="fa-fw fa fa-pencil-alt"></i></a>
            </div>
        </div>

        <div class="d-flex d-lg-none">
            <a href="#" class="btn btn-sm btn-danger rounded-15 mr-1"><i class="fa-fw fa fa-upload"></i> Upload</a>
            <a href="#" class="btn btn-sm btn-outline-secondary rounded-15"><i class="fa-fw fa fa-times"></i> Remove</a>
            <a href="#" class="gswd_displayEdit text-muted-alt ml-auto mt-1" data-slug="avatar"><i class="fa-fw fa fa-pencil-alt"></i></a>
        </div>
    </div>
</div>

<div class="form-group mb-4">
    <label>Warna Aksen</label>
    <div id="accent_color" class="row justify-content-center">
        <?php
        for ($i = 1; $i <= 6; $i++) {
        ?>
            <div class="col-6 col-lg-4 col-xl-2 mb-4">
                <a href="#">
                    <div class="accent_color accent_0<?php print $i; ?> border rounded shadow-sm mx-auto"></div>
                </a>
            </div>
        <?php } ?>
    </div>
</div>

<div id="gswd_displayProfileAppend" class="gswd_displayProfileItem form-group py-3 m-0 d-none">
    <div class="row">
        <div class="col-12 col-lg-3 mb-4">
            <h6><i class="fa-fw fa fa-image"></i> Foto Profil</h6>

            <div class="border rounded shadow-sm bg-light text-center p-3">
                <i class="fa fa-user-circle fa-10x"></i>
            </div>
        </div>

        <div class="col-12 col-lg-9">
            <h6><i class="fa-fw fa fa-address-card"></i> Biodata</h6>
            <div class="card bg-light shadow-sm">
                <div class="card-body">
                    <div class="row form-group">
                        <label class="col-12 col-sm-4 col-lg-3 col-form-label text-left text-sm-right">Nama Profil</label>
                        <div class="col-12 col-sm-8 col-lg-9">
                            <input name="" type="text" class="form-control form-control-sm" placeholder="Nama Profil...">
                        </div>
                    </div>

                    <div class="row form-group">
                        <label class="col-12 col-sm-4 col-lg-3 col-form-label text-left text-sm-right">Alamat Email</label>
                        <div class="col-12 col-sm-8 col-lg-9">
                            <input name="" type="text" class="form-control form-control-sm" placeholder="Email...">
                        </div>
                    </div>

                    <div class="row form-group">
                        <label class="col-12 col-sm-4 col-lg-3 col-form-label text-left text-sm-right">Nomor HP</label>
                        <div class="col-12 col-sm-8 col-lg-9">
                            <input name="" type="text" class="form-control form-control-sm" placeholder="Nomor HP...">
                        </div>
                    </div>

                    <div class="row form-group">
                        <label class="col-12 col-sm-4 col-lg-3 col-form-label text-left text-sm-right">Alamat</label>
                        <div class="col-12 col-sm-8 col-lg-9">
                            <textarea name="" type="text" class="form-control form-control-sm" placeholder="Alamat..." rowspan=2></textarea>
                        </div>
                    </div>

                    <div class="row form-group">
                        <label class="col-12 col-sm-4 col-lg-3 col-form-label text-left text-sm-right">Jenis Kelamin</label>
                        <div class="col-12 col-sm-8 col-lg-9">
                            <select name="" class="custom-select custom-select-sm">
                                <option value="">--- Select ---</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    /* Display-Display Edit | START *****************/
    $(document).on('click', 'a.gswd_displayEdit', function(e) {
        e.preventDefault();
        gswd_displayEdit($(this));
    });

    function gswd_displayEdit(th) {
        var slug = th.attr('data-slug');
        var divClone = $('#gswd_displayProfileAppend').clone().removeClass('d-none');

        $('#gswd_modalResponse #gswd_responseBody').html('');
        divClone.appendTo('#gswd_modalResponse #gswd_responseBody');

        $('#gswd_modalResponse').modal('show');
    }

    $('#gswd_modalResponse').on('hidden.bs.modal', function(e) {
        $('#gswd_modalResponse #gswd_responseBody').html('...');
    })
</script>
@endsection

@section('analytics')
<div class="row">
    <div class="col-12 mb-5">
        <h6 class="mb-3"><i class="fa-fw fa fa-user"></i> Pengunjung</h6>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link text-secondary px-2 px-lg-3 active" id="a-tab" data-toggle="tab" href="#a" role="tab" aria-controls="a" aria-selected="true"><i class="fa-fw fa fa-calendar-day"></i> Harian</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link text-secondary px-2 px-lg-3" id="b-tab" data-toggle="tab" href="#b" role="tab" aria-controls="b" aria-selected="false"><i class="fa-fw fa fa-calendar-alt"></i> Bulanan</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link text-secondary px-2 px-lg-3" id="c-tab" data-toggle="tab" href="#c" role="tab" aria-controls="c" aria-selected="false"><i class="fa-fw fa fa-calendar"></i> Tahunan</a>
            </li>
        </ul>

        <div class="tab-content border border-top-0 rounded-bottom bg-white p-3" id="gswd_tabStatVisitor">
            <div class="tab-pane fade show active" id="a" role="tabpanel" aria-labelledby="a-tab"><canvas id="gswd_dailyStatVisitor" height="120"></canvas></div>
            <div class="tab-pane fade" id="b" role="tabpanel" aria-labelledby="b-tab"><canvas id="gswd_monthlyStatVisitor" height="120"></canvas></div>
            <div class="tab-pane fade" id="c" role="tabpanel" aria-labelledby="c-tab"><canvas id="gswd_annualyStatVisitor" height="120"></canvas></div>
        </div>
    </div>

    <div class="col-12 mb-5">
        <h6 class="mb-3"><i class="fa-fw fa fa-external-link-alt"></i> Tautan</h6>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link text-secondary px-2 px-lg-3 active" id="d-tab" data-toggle="tab" href="#d" role="tab" aria-controls="d" aria-selected="true"><i class="fa-fw fa fa-calendar-day"></i> Harian</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link text-secondary px-2 px-lg-3" id="e-tab" data-toggle="tab" href="#e" role="tab" aria-controls="e" aria-selected="false"><i class="fa-fw fa fa-calendar-alt"></i> Bulanan</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link text-secondary px-2 px-lg-3" id="f-tab" data-toggle="tab" href="#f" role="tab" aria-controls="f" aria-selected="false"><i class="fa-fw fa fa-calendar"></i> Tahunan</a>
            </li>
        </ul>

        <div class="tab-content border border-top-0 rounded-bottom bg-white p-3" id="gswd_tabStatLink">
            <div class="tab-pane fade show active" id="d" role="tabpanel" aria-labelledby="d-tab"><canvas id="gswd_dailyStatLink" height="120"></canvas></div>
            <div class="tab-pane fade" id="e" role="tabpanel" aria-labelledby="e-tab"><canvas id="gswd_monthlyStatLink" height="120"></canvas></div>
            <div class="tab-pane fade" id="f" role="tabpanel" aria-labelledby="f-tab"><canvas id="gswd_annualyStatLink" height="120"></canvas></div>
        </div>
    </div>

    <div class="col-12 mb-5">
        <h6 class="mb-3"><i class="fa-fw fa fa-users"></i> Sosial Media</h6>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link text-secondary px-2 px-lg-3 active" id="g-tab" data-toggle="tab" href="#g" role="tab" aria-controls="g" aria-selected="true"><i class="fa-fw fa fa-calendar-day"></i> Harian</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link text-secondary px-2 px-lg-3" id="h-tab" data-toggle="tab" href="#h" role="tab" aria-controls="h" aria-selected="false"><i class="fa-fw fa fa-calendar-alt"></i> Bulanan</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link text-secondary px-2 px-lg-3" id="i-tab" data-toggle="tab" href="#i" role="tab" aria-controls="i" aria-selected="false"><i class="fa-fw fa fa-calendar"></i> Tahunan</a>
            </li>
        </ul>

        <div class="tab-content border border-top-0 rounded-bottom bg-white p-3" id="gswd_tabStatSosmed">
            <div class="tab-pane fade show active" id="g" role="tabpanel" aria-labelledby="g-tab"><canvas id="gswd_dailyStatSosmed" height="120"></canvas></div>
            <div class="tab-pane fade" id="h" role="tabpanel" aria-labelledby="h-tab"><canvas id="gswd_monthlyStatSosmed" height="120"></canvas></div>
            <div class="tab-pane fade" id="i" role="tabpanel" aria-labelledby="i-tab"><canvas id="gswd_annualyStatSosmed" height="120"></canvas></div>
        </div>
    </div>
</div>

<script>
    var gswd_dailyStatVisitor = $('#gswd_dailyStatVisitor');
    var gswd_monthlyStatVisitor = $('#gswd_monthlyStatVisitor');
    var gswd_annualyStatVisitor = $('#gswd_annualyStatVisitor');

    var gswd_dailyStatLink = $('#gswd_dailyStatLink');
    var gswd_monthlyStatLink = $('#gswd_monthlyStatLink');
    var gswd_annualyStatLink = $('#gswd_annualyStatLink');

    var gswd_dailyStatSosmed = $('#gswd_dailyStatSosmed');
    var gswd_monthlyStatSosmed = $('#gswd_monthlyStatSosmed');
    var gswd_annualyStatSosmed = $('#gswd_annualyStatSosmed');

    var dailyStatVisitorData_01 = [];
    var dailyStatVisitorData_02 = [];
    var dailyStatVisitorData_03 = [];
    var dailyStatVisitorData_04 = [];
    var dailyStatLinkData_01 = [];
    var dailyStatLinkData_02 = [];
    var dailyStatLinkData_03 = [];
    var dailyStatLinkData_04 = [];
    var dailyStatSosmedData_01 = [];
    var dailyStatSosmedData_02 = [];
    var dailyStatSosmedData_03 = [];
    var dailyStatSosmedData_04 = [];
    for (i = 1; i <= 7; i++) {
        dailyStatVisitorData_01.push(Math.floor((Math.random() * 100) + 10));
        dailyStatVisitorData_02.push(Math.floor((Math.random() * 100) + 10));
        dailyStatVisitorData_04.push(Math.floor((Math.random() * 100) + 10));
        dailyStatLinkData_01.push(Math.floor((Math.random() * 100) + 10));
        dailyStatLinkData_02.push(Math.floor((Math.random() * 100) + 10));
        dailyStatLinkData_04.push(Math.floor((Math.random() * 100) + 10));
        dailyStatSosmedData_01.push(Math.floor((Math.random() * 100) + 10));
        dailyStatSosmedData_02.push(Math.floor((Math.random() * 100) + 10));
        dailyStatSosmedData_04.push(Math.floor((Math.random() * 100) + 10));
    }
    for (i = 1; i <= 12; i++) {
        dailyStatVisitorData_03.push(Math.floor((Math.random() * 100) + 10));
        dailyStatLinkData_03.push(Math.floor((Math.random() * 100) + 10));
        dailyStatSosmedData_03.push(Math.floor((Math.random() * 100) + 10));
    }

    // VISITOR
    var chart = new Chart(gswd_dailyStatVisitor, {
        // The type of chart we want to create
        type: 'line',
        // The data for our dataset
        data: {
            labels: ['01 Nov 2020', '02 Nov 2020', '03 Nov 2020', '04 Nov 2020', '05 Nov 2020', '06 Nov 2020', '07 Nov 2020'],
            datasets: [{
                    label: 'Minggu Ini',
                    backgroundColor: 'rgba(220, 53, 69, .3)',
                    borderColor: 'rgba(220, 53, 69, .3)',
                    borderWidth: 2,
                    pointBorderWidth: 3,
                    lineTension: '.2',
                    data: dailyStatVisitorData_01
                },
                {
                    label: 'Minggu Kemarin',
                    backgroundColor: 'rgba(108, 117, 125, .3)',
                    borderColor: 'rgba(108, 117, 125, .3)',
                    borderWidth: 2,
                    pointBorderWidth: 3,
                    lineTension: '.2',
                    data: dailyStatVisitorData_02
                }
            ]
        },
        // Configuration options go here
        options: {}
    });

    var chart = new Chart(gswd_monthlyStatVisitor, {
        // The type of chart we want to create
        type: 'line',
        // The data for our dataset
        data: {
            labels: ['Jan 2020', 'Feb 2020', 'Mar 2020', 'Apr 2020', 'Mei 2020', 'Jun 2020', 'Jul 2020', 'Aug 2020', 'Sep 2020', 'Oct 2020', 'Nov 2020', 'Des 2020'],
            datasets: [{
                label: '',
                backgroundColor: 'rgba(220, 53, 69, .3)',
                borderColor: 'rgba(220, 53, 69, .3)',
                borderWidth: 2,
                pointBorderWidth: 3,
                lineTension: '.2',
                data: dailyStatVisitorData_03
            }, ]
        },
        // Configuration options go here
        options: {}
    });

    var chart = new Chart(gswd_annualyStatVisitor, {
        // The type of chart we want to create
        type: 'bar',
        // The data for our dataset
        data: {
            labels: ['2014', '2015', '2016', '2017', '2018', '2019', '2020'],
            datasets: [{
                label: '',
                backgroundColor: 'rgba(220, 53, 69, .3)',
                borderColor: 'rgba(220, 53, 69, .3)',
                borderWidth: 2,
                pointBorderWidth: 3,
                lineTension: '.2',
                data: dailyStatVisitorData_04
            }, ]
        },
        // Configuration options go here
        options: {}
    });



    // LINK
    var chart = new Chart(gswd_dailyStatLink, {
        // The type of chart we want to create
        type: 'line',
        // The data for our dataset
        data: {
            labels: ['01 Nov 2020', '02 Nov 2020', '03 Nov 2020', '04 Nov 2020', '05 Nov 2020', '06 Nov 2020', '07 Nov 2020'],
            datasets: [{
                    label: 'Minggu Ini',
                    backgroundColor: 'rgba(220, 53, 69, .3)',
                    borderColor: 'rgba(220, 53, 69, .3)',
                    borderWidth: 2,
                    pointBorderWidth: 3,
                    lineTension: '.2',
                    data: dailyStatLinkData_01
                },
                {
                    label: 'Minggu Kemarin',
                    backgroundColor: 'rgba(108, 117, 125, .3)',
                    borderColor: 'rgba(108, 117, 125, .3)',
                    borderWidth: 2,
                    pointBorderWidth: 3,
                    lineTension: '.2',
                    data: dailyStatLinkData_02
                }
            ]
        },
        // Configuration options go here
        options: {}
    });

    var chart = new Chart(gswd_monthlyStatLink, {
        // The type of chart we want to create
        type: 'line',
        // The data for our dataset
        data: {
            labels: ['Jan 2020', 'Feb 2020', 'Mar 2020', 'Apr 2020', 'Mei 2020', 'Jun 2020', 'Jul 2020', 'Aug 2020', 'Sep 2020', 'Oct 2020', 'Nov 2020', 'Des 2020'],
            datasets: [{
                label: '',
                backgroundColor: 'rgba(220, 53, 69, .3)',
                borderColor: 'rgba(220, 53, 69, .3)',
                borderWidth: 2,
                pointBorderWidth: 3,
                lineTension: '.2',
                data: dailyStatLinkData_03
            }, ]
        },
        // Configuration options go here
        options: {}
    });

    var chart = new Chart(gswd_annualyStatLink, {
        // The type of chart we want to create
        type: 'bar',
        // The data for our dataset
        data: {
            labels: ['2014', '2015', '2016', '2017', '2018', '2019', '2020'],
            datasets: [{
                label: '',
                backgroundColor: 'rgba(220, 53, 69, .3)',
                borderColor: 'rgba(220, 53, 69, .3)',
                borderWidth: 2,
                pointBorderWidth: 3,
                lineTension: '.2',
                data: dailyStatLinkData_04
            }, ]
        },
        // Configuration options go here
        options: {}
    });



    // SOSMED
    var chart = new Chart(gswd_dailyStatSosmed, {
        // The type of chart we want to create
        type: 'line',
        // The data for our dataset
        data: {
            labels: ['01 Nov 2020', '02 Nov 2020', '03 Nov 2020', '04 Nov 2020', '05 Nov 2020', '06 Nov 2020', '07 Nov 2020'],
            datasets: [{
                    label: 'Minggu Ini',
                    backgroundColor: 'rgba(220, 53, 69, .3)',
                    borderColor: 'rgba(220, 53, 69, .3)',
                    borderWidth: 2,
                    pointBorderWidth: 3,
                    lineTension: '.2',
                    data: dailyStatSosmedData_01
                },
                {
                    label: 'Minggu Kemarin',
                    backgroundColor: 'rgba(108, 117, 125, .3)',
                    borderColor: 'rgba(108, 117, 125, .3)',
                    borderWidth: 2,
                    pointBorderWidth: 3,
                    lineTension: '.2',
                    data: dailyStatSosmedData_02
                }
            ]
        },
        // Configuration options go here
        options: {}
    });

    var chart = new Chart(gswd_monthlyStatSosmed, {
        // The type of chart we want to create
        type: 'line',
        // The data for our dataset
        data: {
            labels: ['Jan 2020', 'Feb 2020', 'Mar 2020', 'Apr 2020', 'Mei 2020', 'Jun 2020', 'Jul 2020', 'Aug 2020', 'Sep 2020', 'Oct 2020', 'Nov 2020', 'Des 2020'],
            datasets: [{
                label: '',
                backgroundColor: 'rgba(220, 53, 69, .3)',
                borderColor: 'rgba(220, 53, 69, .3)',
                borderWidth: 2,
                pointBorderWidth: 3,
                lineTension: '.2',
                data: dailyStatSosmedData_03
            }, ]
        },
        // Configuration options go here
        options: {}
    });

    var chart = new Chart(gswd_annualyStatSosmed, {
        // The type of chart we want to create
        type: 'bar',
        // The data for our dataset
        data: {
            labels: ['2014', '2015', '2016', '2017', '2018', '2019', '2020'],
            datasets: [{
                label: '',
                backgroundColor: 'rgba(220, 53, 69, .3)',
                borderColor: 'rgba(220, 53, 69, .3)',
                borderWidth: 2,
                pointBorderWidth: 3,
                lineTension: '.2',
                data: dailyStatSosmedData_04
            }, ]
        },
        // Configuration options go here
        options: {}
    });
</script>
@endsection