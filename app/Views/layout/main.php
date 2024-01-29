<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>SISTEM INFORMASI MASJID</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="Mannatthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" href="<?=base_url()?>/assets/images/users/masjid.png">

    <link href="<?=base_url()?>/assets/plugins/morris/morris.css" rel="stylesheet">
    <link href="<?=base_url()?>/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>/assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>/assets/css/style.css" rel="stylesheet" type="text/css">

    <!-- jQuery  -->
    <script src="<?=base_url()?>/assets/js/jquery.min.js"></script>
    <script src="<?=base_url()?>/assets/js/popper.min.js"></script>
    <script src="<?=base_url()?>/assets/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>/assets/js/modernizr.min.js"></script>
    <script src="<?=base_url()?>/assets/js/detect.js"></script>
    <script src="<?=base_url()?>/assets/js/fastclick.js"></script>
    <script src="<?=base_url()?>/assets/js/jquery.slimscroll.js"></script>
    <script src="<?=base_url()?>/assets/js/jquery.blockUI.js"></script>
    <script src="<?=base_url()?>/assets/js/waves.js"></script>
    <script src="<?=base_url()?>/assets/js/jquery.nicescroll.js"></script>
    <script src="<?=base_url()?>/assets/js/jquery.scrollTo.min.js"></script>

    <script src="<?=base_url()?>/assets/plugins/skycons/skycons.min.js"></script>
    <script src="<?=base_url()?>/assets/plugins/raphael/raphael-min.js"></script>
    <script src="<?=base_url()?>/assets/plugins/morris/morris.min.js"></script>

    <script src="<?=base_url()?>/assets/pages/dashborad.js"></script>


</head>


<body class="fixed-left">

    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner"></div>
        </div>
    </div>

    <!-- Begin page -->
    <div id="wrapper">

        <?=$this->rendersection('menu')?>

    </div>
    <!-- Left Sidebar End -->

    <!-- Start right Content here -->

    <div class="content-page">
        <!-- Start content -->
        <div class="content">

            <!-- Top Bar Start -->
            <div class="topbar">

                <nav class="navbar-custom #007bff;">

                    <ul class="list-inline float-right mb-0">
                        <!-- language-->
                        <li class="list-inline-item dropdown notification-list hide-phone">
                            <a class="nav-link dropdown-toggle arrow-none waves-effect text-white"
                                data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                                aria-expanded="false">
                                Indonesian <img src="<?=base_url()?>/assets/images/flags/indonesia_flag.png"
                                    class="ml-2" height="16" alt="" />
                            </a>
                            <div class="dropdown-menu dropdown-menu-right language-switch">
                                <a class="dropdown-item" href="#"><img
                                        src="<?=base_url()?>/assets/images/flags/italy_flag.jpg" alt=""
                                        height="16" /><span> Italian </span></a>
                                <a class="dropdown-item" href="#"><img
                                        src="<?=base_url()?>/assets/images/flags/french_flag.jpg" alt=""
                                        height="16" /><span> French </span></a>
                                <a class="dropdown-item" href="#"><img
                                        src="<?=base_url()?>/assets/images/flags/spain_flag.jpg" alt=""
                                        height="16" /><span> Spanish </span></a>
                                <a class="dropdown-item" href="#"><img
                                        src="<?=base_url()?>/assets/images/flags/russia_flag.jpg" alt=""
                                        height="16" /><span> Russian </span></a>
                            </div>
                        </li>
                        <li class="list-inline-item dropdown notification-list">
                            <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#"
                                role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="ti-email noti-icon"></i>
                                <span class="badge badge-danger noti-icon-badge">5</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg">
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5><span class="badge badge-danger float-right">745</span>Messages</h5>
                                </div>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon"><img src="<?=base_url()?>/assets/images/users/avatar-2.jpg"
                                            alt="user-img" class="img-fluid rounded-circle" /> </div>
                                    <p class="notify-details"><b>Charles M. Jones</b><small class="text-muted">Dummy
                                            text of the printing and typesetting industry.</small></p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon"><img src="<?=base_url()?>/assets/images/users/avatar-3.jpg"
                                            alt="user-img" class="img-fluid rounded-circle" /> </div>
                                    <p class="notify-details"><b>Thomas J. Mimms</b><small class="text-muted">You
                                            have 87 unread messages</small></p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon"><img src="<?=base_url()?>/assets/images/users/avatar-4.jpg"
                                            alt="user-img" class="img-fluid rounded-circle" /> </div>
                                    <p class="notify-details"><b>Luis M. Konrad</b><small class="text-muted">It is a
                                            long established fact that a reader will</small></p>
                                </a>

                                <!-- All-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    View All
                                </a>

                            </div>
                        </li>

                        <li class="list-inline-item dropdown notification-list">
                            <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#"
                                role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="ti-bell noti-icon"></i>
                                <span class="badge badge-success noti-icon-badge">23</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg">
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5><span class="badge badge-danger float-right">87</span>Notification</h5>
                                </div>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-primary"><i class="mdi mdi-cart-outline"></i></div>
                                    <p class="notify-details"><b>Your order is placed</b><small class="text-muted">Dummy
                                            text of the printing and typesetting
                                            industry.</small></p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-success"><i class="mdi mdi-message"></i></div>
                                    <p class="notify-details"><b>New Message received</b><small class="text-muted">You
                                            have 87 unread messages</small></p>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-warning"><i class="mdi mdi-martini"></i></div>
                                    <p class="notify-details"><b>Your item is shipped</b><small class="text-muted">It is
                                            a long established fact that a reader
                                            will</small></p>
                                </a>

                                <!-- All-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    View All
                                </a>

                            </div>
                        </li>

                        <?=$this->rendersection('foto')?>

                    </ul>

                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <button class="button-menu-mobile open-left waves-light waves-effect">
                                <i class="mdi mdi-menu"></i>
                            </button>
                        </li>
                        <li class="hide-phone app-search">
                            <form role="search" class="">
                                <input type="text" placeholder="Search..." class="form-control">
                                <a href=""><i class="fa fa-search"></i></a>
                            </form>
                        </li>
                    </ul>

                    <div class="clearfix"></div>

                </nav>

            </div>
            <!-- Top Bar End -->

            <div class="page-content-wrapper ">

                <div class="container-fluid">

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title-box">
                                <?=$this->rendersection('isi')?>
                            </div>
                        </div>
                    </div>
                    <!-- end page title end breadcrumb -->


                </div> <!-- Page content Wrapper -->

            </div> <!-- content -->

            <footer class="footer">
                © 2023 Sistem Informasi Masjid.
            </footer>

        </div>
        <!-- End Right content here -->

    </div>
    <!-- END wrapper -->




    <!-- App js -->
    <script src="<?=base_url()?>/assets/js/app.js"></script>
    <script>
    /* BEGIN SVG WEATHER ICON */
    if (typeof Skycons !== 'undefined') {
        var icons = new Skycons({
                "color": "#fff"
            }, {
                "resizeClear": true
            }),
            list = [
                "clear-day", "clear-night", "partly-cloudy-day",
                "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
                "fog"
            ],
            i;

        for (i = list.length; i--;)
            icons.set(list[i], list[i]);
        icons.play();
    };

    // scroll

    $(document).ready(function() {

        $("#boxscroll").niceScroll({
            cursorborder: "",
            cursorcolor: "#cecece",
            boxzoom: true
        });
        $("#boxscroll2").niceScroll({
            cursorborder: "",
            cursorcolor: "#cecece",
            boxzoom: true
        });

    });
    </script>

</body>

</html>