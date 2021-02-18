<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">

    <title>
        @if (App\Helpers\Menu::titleName() === 'goods')
        COMPANY NAME
        @elseif (str_contains(App\Helpers\Menu::titleName(), 'inventory'))
        COMPANY | Inventory
        @elseif (str_contains(App\Helpers\Menu::titleName(), 'goods-receipt'))
        COMPANY | Goods Receipt
        @elseif (str_contains(App\Helpers\Menu::titleName(), 'goods-return'))
        COMPANY | Goods Return
        @endif
    </title>

    <link rel="canonical" href="/assets/vendor/bootstrap/css/dashboard/">


    <!-- Bootstrap core CSS -->
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
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

        .my-float {
            margin-top: 22px;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="/assets/vendor/bootstrap/css/dashboard.css" rel="stylesheet">
    <!-- tambahan dropdown table -->
    <script type='text/javascript' src='/assets/vendor/jquery/jquery.min.js'></script>

    <script type='text/javascript' src='/assets/vendor/bootstrap/js/bootstrap.min.js'></script>

</head>

<body>



    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="{{url('/goods')}}"><img src="" class="img-fluid rounded float-left mr-2" alt=""> COMPANY NAME </a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link  {{App\Helpers\Menu::active('/')}}" href="{{url('/goods/logout')}}">Sign out</a>
            </li>
        </ul>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="sidebar-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{App\Helpers\Menu::active('inventory')}}" href="/goods/inventory">
                                <span data-feather="bar-chart-2"></span>
                                Inventory <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{App\Helpers\Menu::active('goods-receipt')}}" href="/goods/goods-receipt">
                                <span data-feather="trending-down"></span>
                                Goods Receipt <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{App\Helpers\Menu::active('goods-return')}}" href="/goods/goods-return">
                                <span data-feather="trending-up"></span>
                                Goods Return <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" id="inventorytf" data-toggle="modal" data-target="#progress">
                                <span data-feather="send"></span>
                                Inventory Transfer <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="shopping-cart"></span>
                                Products
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="users"></span>
                                Customers
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="bar-chart-2"></span>
                                Reports
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="layers"></span>
                                Integrations
                            </a>
                        </li> -->
                    </ul>

                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>Reports</span>
                        <!-- <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
                            <span data-feather="plus-circle"></span>
                        </a> -->
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a class="nav-link" href="#" id="mutasir" data-toggle="modal" data-target="#progress">
                                <span data-feather="sliders"></span>
                                Mutasi Report <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" id="lista" data-toggle="modal" data-target="#progress">
                                <span data-feather="list"></span>
                                List Article <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="file-text"></span>
                                Social engagement
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="file-text"></span>
                                Year-end sale
                            </a>
                        </li> -->
                    </ul>
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <!-- <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Inventory</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group mr-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                            <span data-feather="calendar"></span>
                            This week
                        </button>
                    </div>
                </div> -->

                <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->
                <a href="/">
                    <!-- <i class="fas fa-magic mr-1 my-float"></i> Back to Portfolio -->
                    <!-- <span class="fas fa-magic my-float"></span> Back to Portfolio -->
                    <button type="submit" class="btn btn-outline-secondary float"><span class="mr-2" data-feather="skip-back"> </span>Back to Portfolio</button>
                    <!-- <button type="button" class="btn btn-info">
                    <span class="glyphicon glyphicon-search" aria-hidden="true">Back to Portfolio</span>
                </button> -->
                </a>

                @yield('container')
            </main>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="progress" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Is still ongoing .....
                </div>
            </div>
        </div>
    </div>
    <!-- <script>
        window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')
    </script> -->
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>

    <script src="/assets/vendor/bootstrap/js/dashboard.js"></script>

    <!-- <script>
        $(document).on('click', '#inventorytf,#mutasir,#lista', function(e) {
            e.preventDefault();
            alert("Progress !!!")
        });
    </script> -->

</body>

</html>