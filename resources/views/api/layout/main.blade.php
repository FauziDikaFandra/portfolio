<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Fauzi | API</title>

    <script src="/assets/vendor/jquery/jquery.min.js"></script>
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <style>
        body {
            background-color: lavender;
            /* warna body */
            /* overflow: hidden; */
            /* hilangkan scroll */
        }

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
            <div class="col-md-11 rounded-lg bg-white radiusChange pr-5 shadow">
                <div class="container-fluid m-4">
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
                                            <a class="nav-link text-dark active rounded-0" id="pills-a-tab" data-toggle="pill" href="#pills-a" role="tab" aria-controls="pills-a" aria-selected="true"><span style="color: Dodgerblue;"><i class="fa-fw fa fa-compress mr-1"></i></span> Local API</a>
                                        </li>
                                        <li class="nav-item pr-5" role="presentation">
                                            <a class="nav-link text-dark  rounded-0" id="pills-b-tab" data-toggle="pill" href="#pills-b" role="tab" aria-controls="pills-b" aria-selected="false"><span style="color: Dodgerblue;"><i class="fa-fw fa fa-imdb mr-1" style="color:#f3c921"></i></span> Public API (IMDB)</a>
                                        </li>
                                        <li class="nav-item pr-5" role="presentation">
                                            <a class="nav-link text-dark  rounded-0" id="pills-c-tab" data-toggle="pill" href="#pills-c" role="tab" aria-controls="pills-c" aria-selected="false"><span style="color: Dodgerblue;"><i class="fa-fw fa fa-youtube-play mr-1" style="color:red"></i></span> Public API (Youtube)</a>
                                        </li>
                                    </ul>

                                </div>
                            </nav>
                        </div>
                    </div>
                </div>

                <div class="container-fluid m-4">

                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-a" role="tabpanel" aria-labelledby="pills-a-tab">
                            @yield('localapi')
                        </div>
                        <div class="tab-pane fade" id="pills-b" role="tabpanel" aria-labelledby="pills-b-tab">

                            @yield('publicapiimdb')
                        </div>
                        <div class="tab-pane fade" id="pills-c" role="tabpanel" aria-labelledby="pills-c-tab">

                            @yield('publicapiytb')
                        </div>
                    </div>
                </div>

            </div>

        </div>

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
<script src="/assets/js/api.js"></script>



</html>