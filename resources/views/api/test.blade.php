<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <title>Fauzi | API</title>

    <script src="/assets/vendor/jquery/jquery.min.js"></script>
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

</body>
<script src="/assets/js/api.js"></script>


</html>