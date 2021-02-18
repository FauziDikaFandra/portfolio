<title>Company | Landing Page</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link rel="stylesheet" href="/assets/css/styletree.css">
<!-- <link rel="stylesheet" href="/assets/css/normalize.css"> -->
<link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!-- <link rel="stylesheet" href="/addons/Chart.js-2.9.3/dist/Chart.min.css"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">

<link href="https://fonts.googleapis.com/css?family=Cabin|Acme|Raleway:100,400" rel="stylesheet" />

<script src="/assets/vendor/jquery/jquery.min.js"></script>
<!-- <script src="/addons/Chart.js-2.9.3/dist/Chart.min.js"></script> -->
<style>
    .anyClass {
        height: 150px;
        /* limit biar scroll muncul */
        overflow: auto;
        /* munculkan scroll */
    }

    body {
        background-color: midnightblue;
        /* warna body */
        /* overflow: hidden; */
        /* hilangkan scroll */
    }

    /* untuk buat melengkung ke empat sisi element */
    .radiusChange {
        -webkit-border-radius: 20px !important;
        -moz-border-radius: 20px !important;
        border-radius: 20px !important;
        -webkit-border: 20px !important;
        -moz-border: 20px !important;
        border: 20px !important;
    }

    /* untuk buat melengkung sisi kiri element */
    .radiusChangeLeft {
        /* border: 2px solid red; */
        border-top-left-radius: 25px;
        border-bottom-left-radius: 25px;
    }

    /* untuk buat melengkung sisi kanan element */
    .radiusChangeRight {
        /* border: 2px solid red; */
        border-top-right-radius: 25px;
        border-bottom-right-radius: 25px;
    }

    /* untuk buat melengkung tapi tidak dipakai */
    .form-rounded {
        border-radius: 1rem;
    }

    /* modif font h4 */
    h4 {
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif !important;
        color: midnightblue;
        font-weight: bold;
    }

    /* untuk navigasi menu transparant dan ada line dibawah */
    .nav a {
        float: left;
        display: block;
        color: black;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 16px;
        border-bottom: 2px solid transparent;

    }

    /* ukuran line dibawah saat hover*/
    .nav a:hover {
        border-bottom: 2px solid lightgreen;
    }


    /* ukuran line dibawah saat active*/
    .nav a.active {
        border-bottom: 2px solid lightgreen;
    }

    /* kasih warna dan jarak di input*/
    .url {
        background-color: aliceblue;
        background-position: 10px 10px;
        background-repeat: no-repeat;
        padding-left: 40px;
    }


    /* .form-group .form-control {
        padding-left: 2.375rem;
    } */

    /* menambahkan icon di input*/
    .form-group .form-control-icon {
        position: absolute;
        z-index: 2;
        /* display: block; */
        width: 2.375rem;
        height: 2.375rem;
        line-height: 2.375rem;
        text-align: center;
        pointer-events: none;
        color: #aaa;
    }

    /* menghilangkan bayangan biru saat klik dll di input*/
    .form-control {
        box-shadow: none !important;
    }

    .float {
        position: fixed;
        /* width: 60px;
            height: 60px; */
        bottom: 40px;
        right: 40px;
        /* background-color: #0C9;
            color: #FFF;
            border-radius: 50px;
            text-align: center;
            box-shadow: 2px 2px 3px #999; */
    }
</style>

</head>

<body>

    <div class="container-fluid m-4">
        <div class="row">
            <div class="col-md-8 rounded-lg bg-white radiusChange pr-5">
                <div class="container-fluid m-4">
                    <div class="row">
                        <div class="col-md-3 d-flex align-items-center">
                            <img src="\logo.png" style="width:20%" class="img-fluid mb-2" alt="my logo">
                            <h4> linktree.<span>com</span></h4>
                        </div>
                        <div class="col-md-6 d-flex align-items-center">
                            <div type="input" style="width:450px;" class="form-control form-rounded">linktree.com/<a href="">fauzi</a></div>
                        </div>
                        <div class="col-md-2 d-flex align-items-center">
                            <button type="button" class="btn btn-primary rounded-pill"><i class="fa-fw fa fa-unlock-alt mr-1"></i>PRO</button>
                        </div>
                        <div class="col-md-1 d-flex align-items-center">
                            <img src="/profile.png" class="gswd_linkThumbnail rounded img-fluid mt-2 mb-2 mr-2" alt="no-img" style="width:80%">
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <nav class="navbar navbar-expand-lg border-bottom py-0">
                                <!-- <a class="text-white d-inline d-lg-none" href="#">My Menu</a> -->
                                <button class="navbar-toggler ml-auto my-1 px-1" type="button" data-toggle="collapse" data-target="#navbarSupportedContent_01" aria-controls="navbarSupportedContent_01" aria-expanded="false" aria-label="Toggle navigation">
                                    <i class="fa-fw fa fa-list"></i>
                                </button>

                                <div class="collapse navbar-collapse" id="navbarSupportedContent_01">
                                    <ul class="nav" id="pills-tab" role="tablist">
                                        <li class="nav-item pr-5" role="presentation">
                                            <a class="nav-link text-dark active rounded-0" id="pills-a-tab" data-toggle="pill" href="#pills-a" role="tab" aria-controls="pills-a" aria-selected="true"><span style="color: Dodgerblue;"><i class="fa-fw fa fa-link mr-1"></i></span> Link</a>
                                        </li>
                                        <li class="nav-item pr-5" role="presentation">
                                            <a class="nav-link text-dark  rounded-0" id="pills-b-tab" data-toggle="pill" href="#pills-b" role="tab" aria-controls="pills-b" aria-selected="false"><span style="color: Dodgerblue;"><i class="fa-fw fa fa-users mr-1"></i></span> Social Link</a>
                                        </li>
                                        <li class="nav-item pr-5" role="presentation">
                                            <a class="nav-link text-dark  rounded-0" id="pills-c-tab" data-toggle="pill" href="#pills-c" role="tab" aria-controls="pills-c" aria-selected="false"><span style="color: Dodgerblue;"><i class="fa-fw fa fa-desktop mr-1"></i></span> Appearance</a>
                                        </li>
                                        <li class="nav-item pr-5" role="presentation">
                                            <a class="nav-link text-dark  rounded-0" id="pills-e-tab" data-toggle="pill" href="#pills-e" role="tab" aria-controls="pills-e" aria-selected="false"><span style="color: Dodgerblue;"><i class="fa-fw fa fa-chart-bar"></i></span> Analytics</a>
                                        </li>
                                    </ul>

                                    <!-- <ul class="nav ml-auto">
                                        <li class="nav-item">
                                            <a class="nav-link px-3 text-dark" href="#"><i class="fa-fw fa fa-link"></i> {{$nama ?? ''}}.my.id</a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link px-3 text-dark dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa-fw fa fa-share-alt"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                            </div>
                                        </li>
                                    </ul> -->
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="container-fluid m-4">

                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-a" role="tabpanel" aria-labelledby="pills-a-tab">
                            <!-- <h4> Link</h4> -->
                            @yield('link')
                        </div>
                        <div class="tab-pane fade" id="pills-b" role="tabpanel" aria-labelledby="pills-b-tab">
                            <!-- <h4> Social Link</h4> -->
                            @yield('sosial')
                        </div>
                        <div class="tab-pane fade" id="pills-c" role="tabpanel" aria-labelledby="pills-c-tab">
                            <!-- <h4> Appearance</h4> -->
                            @yield('appearance')
                        </div>
                        <div class="tab-pane fade" id="pills-e" role="tabpanel" aria-labelledby="pills-e-tab">
                            <!-- <h4> Analytics</h4> -->
                            @yield('analytics')
                        </div>
                    </div>
                </div>




                <!-- <div class="modal fade" id="gswd_modalFeature" tabindex="-1" aria-labelledby="gswd_modalFeatureLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content ">
                            <div class="modal-body text-center py-5">
                                <div class="d-inline-block py-3 px-2">
                                    <h6><b>E-Mail</b></h6>
                                    <a href="#" class="text-danger"><i class="fa-fw fa fa-envelope fa-5x"></i></a>
                                </div>
                                <div class="d-inline-block py-3 px-2">
                                    <h6><b>Tautan</b></h6>
                                    <a href="#" class="text-danger"><i class="fa-fw fa fa-link fa-5x"></i></a>
                                </div>
                                <div class="d-inline-block py-3 px-2">
                                    <h6><b>E-Resume</b></h6>
                                    <a href="#" class="text-danger"><i class="fa-fw fa fa-address-card fa-5x"></i></a>
                                </div>
                                <div class="d-inline-block py-3 px-2">
                                    <h6><b>Lainnya</b></h6>
                                    <a href="#" class="text-danger"><i class="fa-fw fa fa-cubes fa-5x"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

                <!-- <div class="modal fade" id="gswd_modalResponse" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="gswd_modalResponseLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div id="gswd_responseBody" class="modal-body">
                                ...
                            </div>
                            <div id="gswd_responseFooter" class="modal-footer">
                                <button type="button" class="gswd_btnSave btn btn-sm btn-danger"><i class="fa-fw fa fa-save"></i> Simpan</button>
                                <button type="button" class="gswd_btnClose btn btn-sm btn-secondary" data-dismiss="modal"><i class="fa-fw fa fa-times"></i> Tutup</button>
                            </div>
                        </div>
                    </div>
                </div> -->

            </div>
            <div class="col-md-4">
                <div class="col-12 col-sm-6 col-lg-5 col-xl-4 mb-4">
                    <section class="form-dark scrollbar-dusty-grass thin square">
                        <div class="smartphone mx-auto mx-sm-0 ml-sm-auto anyClass">
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-6">
                                    <img src="/profile.png" class="gswd_linkThumbnail rounded img-fluid mt-2 mb-2 mr-2" alt="no-img">
                                    <figcaption class="figure-caption text-center">{{$nama ?? ''}}</figcaption>
                                </div>
                            </div>
                            <div id="tampilan"></div>
                            <div class="row">
                                <div id="tampilanhp" class="d-none bg-white shadow-sm mt-2 ml-2 mr-2 rounded">
                                    <div class="row">
                                        <div class="col-3 pt-2 pl-4" style="height: 50px;">
                                            <!-- <img src="img/no-image.png" class="hp_linkThumbnail rounded img-fluid mt-2 mb-2 mr-2" alt="no-img"> -->
                                        </div>
                                        <div class="col-9 pt-2">
                                            <a id="hp_linkHref" class="hp_linkHref" href="" target="_blank">
                                                <h6 class="hp_linkTitle text-dark"></h6>
                                                <span class="hp_linkHrefAlt d-none d-md-block"></span>
                                            </a>
                                        </div>
                                    </div>


                                </div>

                            </div>
                            <!-- <div class="form-row">
                                <div id="tampilanhp" class="form-group col-md-3 d-none border bg-white shadow-sm mt-1 ml-2">
                                    <img src="img/no-image.png" class="gswd_linkThumbnail rounded img-fluid mt-2 mb-2 mr-2" alt="no-img">
                                </div>
                            </div> -->
                        </div>
                </div>
            </div>

        </div>
        <!-- <hr> -->
        <!-- <footer>
            <div class="row">
                <div class="col-md-6">
                    <p>Copyright © 2019 Tutorial Republic</p>
                </div>
                <div class="col-md-6 text-md-right">
                    <a href="#" class="text-dark">Terms of Use</a>
                    <span class="text-muted mx-2">|</span>
                    <a href="#" class="text-dark">Privacy Policy</a>
                </div>
            </div>
        </footer> -->
    </div>
    <a href="/">
        <!-- <i class="fas fa-magic mr-1 my-float"></i> Back to Portfolio -->
        <!-- <span class="fas fa-magic my-float"></span> Back to Portfolio -->
        <button type="submit" class="btn btn-outline-primary float"><i class="fa fa-fast-backward" aria-hidden="true"></i>
            Back to Portfolio</button>
        <!-- <button type="button" class="btn btn-info">
                    <span class="glyphicon glyphicon-search" aria-hidden="true">Back to Portfolio</span>
                </button> -->
    </a>
</body>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="/assets/js/functions.js"></script>
<!-- <script src="/js/ajax.js"></script> -->
<!-- <script src="/addons/bootstrap-4.5.2-dist/js/popper.min.js"></script> -->
<script src="/assets/vendor/bootstrap/js/bootstrap.min.js"></script>

</html>