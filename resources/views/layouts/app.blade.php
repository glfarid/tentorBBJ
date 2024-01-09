<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sistem Rekrutmen Tentor</title>

    <!-- Global stylesheets -->



    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{ asset('global_assets/css/icons/icomoon/styles.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/layout.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/components.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/colors.min.css') }}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="{{ asset('global_assets/js/main/jquery.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/main/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/loaders/blockui.min.js') }}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="{{ asset('global_assets/js/plugins/visualization/d3/d3.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/visualization/d3/d3_tooltip.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/forms/styling/switchery.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/forms/selects/bootstrap_multiselect.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/ui/moment/moment.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/pickers/daterangepicker.js') }}"></script>

    <script src="{{ asset('global_assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>

    <script src="assets/js/app.js"></script>
    <script src="{{ asset('global_assets/js/demo_pages/dashboard.js') }}"></script>
    <script src="{{ asset('global_assets/js/demo_pages/datatables_basic.js') }}"></script>
    <script src="{{ asset('global_assets/js/demo_pages/form_select2.js') }}"></script>

    <!-- Theme JS files -->
    <script src="{{ asset('global_assets/js/plugins/forms/wizards/steps.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/forms/inputs/inputmask.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/forms/validation/validate.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/extensions/cookie.js') }}"></script>
    <script src="{{ asset('global_assets/js/demo_pages/form_validation.js') }}"></script>
    <script src="{{ asset('global_assets/js/demo_pages/form_checkboxes_radios.js') }}"></script>

    <script src="{{ asset('global_assets/js/plugins/notifications/sweet_alert.min.js') }}"></script>





    <!-- /theme JS files -->

</head>

<body>



    <!-- Main navbar -->
    <div class="navbar navbar-expand-md navbar-dark">
        <div class="navbar-brand">
            <a href="index.html" class="d-inline-block">
                <img src="global_assets/images/logo_light.png" alt="">
            </a>
        </div>

        <div class="d-md-none">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
                <i class="icon-tree5"></i>
            </button>
            <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
                <i class="icon-paragraph-justify3"></i>
            </button>
        </div>

        @auth

            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
                            <i class="icon-paragraph-justify3"></i>
                        </a>
                    </li>


                </ul>

                <span class="ml-md-3 mr-md-auto"></span>

                <ul class="navbar-nav">
                    <li class="nav-item dropdown">



                    </li>


                    <li class="nav-item dropdown dropdown-user">
                        <a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle"
                            data-toggle="dropdown">
                            <img src="{{ Auth::user()->profile->getPhoto() }}" class="rounded-circle mr-2" height="34"
                                alt="">
                            <span>{{ Auth::user()->name }}</span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="{{ route('profile.index') }}" class="dropdown-item"><i class="icon-user-plus"></i> My
                                profile</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                                <i class="icon-switch2"></i>
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
        <!-- /main navbar -->


        <!-- Page content -->
        <div class="page-content">

            <!-- Main sidebar -->
            <div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

                <!-- Sidebar mobile toggler -->
                <div class="sidebar-mobile-toggler text-center">
                    <a href="#" class="sidebar-mobile-main-toggle">
                        <i class="icon-arrow-left8"></i>
                    </a>
                    Navigation
                    <a href="#" class="sidebar-mobile-expand">
                        <i class="icon-screen-full"></i>
                        <i class="icon-screen-normal"></i>
                    </a>
                </div>
                <!-- /sidebar mobile toggler -->


                <!-- Sidebar content -->
                <div class="sidebar-content">

                    <!-- User menu -->
                    <div class="sidebar-user">
                        <div class="card-body">
                            <div class="media">
                                <div class="mr-3">
                                    <a href=""><img src="{{ Auth::user()->profile->getPhoto() }}" width="38"
                                            height="38" class="rounded-circle" alt=""></a>
                                </div>

                                <div class="media-body">
                                    <div class="media-title font-weight-semibold">{{ Auth::user()->name }}</div>
                                    <div class="font-size-xs opacity-50">
                                        <i class="icon-pin font-size-sm"></i> &nbsp; {{ Auth::user()->usertype }}
                                    </div>


                                </div>

                                <div class="ml-3 align-self-center">
                                    <a href="{{ route('profile.index') }}" class="text-white"><i
                                            class="icon-cog3"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /user menu -->


                    <!-- Main navigation -->
                    <div class="card card-sidebar-mobile">
                        <ul class="nav nav-sidebar" data-nav-type="accordion">

                            <!-- Main -->

                            <li class="nav-item">


                            </li>

                            <li class="nav-item-header">
                                <div class="text-uppercase font-size-xs line-height-xs">Master Data</div> <i
                                    class="icon-menu" title="Main"></i>
                            </li>
                            <li class="nav-item">
                                @if (auth()->user()->usertype == 'Admin')
                                    <a href="home" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
                                        <i class="icon-home4"></i>
                                        <span>
                                            Dashboard
                                        </span>
                                    </a>


                                    <a href="{{ route('aspek.index') }}"
                                        class="nav-link {{ Request::is('aspek') ? 'active' : '' }}">
                                        <i class="icon-cube"></i>
                                        <span>
                                            Data Aspek
                                        </span>
                                    </a>

                                    <a href="{{ route('kriteria.index') }}"
                                        class="nav-link {{ Request::is('kriteria') ? 'active' : '' }}">
                                        <i class="icon-cube3"></i>
                                        <span>
                                            Data Kriteria
                                        </span>
                                    </a>

                                    <a href="{{ route('konversi.index') }}"
                                        class="nav-link {{ Request::is('konversi') ? 'active' : '' }}">
                                        <i class="icon-clipboard"></i>
                                        <span>
                                            Data Konversi GAP
                                        </span>
                                    </a>

                                    <a href="{{ route('alternatif.index') }}"
                                        class="nav-link {{ Request::is('alternatif') ? 'active' : '' }}">
                                        <i class="icon-users4"></i>
                                        <span>
                                            Data Alternatif
                                        </span>
                                    </a>

                                    <a href="{{ route('penilaian.index') }}"
                                        class="nav-link {{ Request::is('penilaian') ? 'active' : '' }}">
                                        <i class="icon-pencil7"></i>
                                        <span>
                                            Data Penilaian
                                        </span>
                                    </a>

                                    <a href="{{ route('perhitungan.index') }}"
                                        class="nav-link {{ Request::is('perhitungan') ? 'active' : '' }}">
                                        <i class="icon-calculator3"></i>
                                        <span>
                                            Data Perhitungan
                                        </span>
                                    </a>

                                    <a href="{{ route('peserta.index') }}"
                                        class="nav-link {{ Request::is('peserta') ? 'active' : '' }}">
                                        <i class="icon-user"></i>
                                        <span>
                                            Peserta
                                        </span>
                                    </a>

                                    <a href="{{ route('questions.index') }}"
                                        class="nav-link {{ Request::is('questions') ? 'active' : '' }}">
                                        <i class="icon-question3"></i>
                                        <span>
                                            Question
                                        </span>
                                    </a>

                                    <a href="{{ route('questionspemahaman.index') }}"
                                        class="nav-link {{ Request::is('questionspemahaman') ? 'active' : '' }}">
                                        <i class="icon-question3"></i>
                                        <span>
                                            Tes Pemahaman
                                        </span>
                                    </a>

                                    <a href="{{ route('panduan.index') }}"
                                        class="nav-link {{ Request::is('panduan') ? 'active' : '' }}">
                                        <i class="icon-book"></i>
                                        <span>
                                            Panduan
                                        </span>
                                    </a>
                                @elseif(auth()->user()->usertype == 'Peserta' && auth()->user()->dpribadi == null ? true : false)
                                    <a href="{{ route('dpribadi.index') }}"
                                        class="nav-link {{ Request::is('dpribadi') ? 'active' : '' }}">
                                        <i class="icon-user"></i>
                                        <span>
                                            Data Pribadi
                                        </span>
                                    </a>
                                @elseif(auth()->user()->dpribadi->status == 'Belum Validasi' ?? false)
                                    <a href="{{ route('dpribadi.index') }}"
                                        class="nav-link {{ Request::is('dpribadi') ? 'active' : '' }}">
                                        <i class="icon-user"></i>
                                        <span>
                                            Data Pribadi
                                        </span>
                                    </a>
                                @else
                                    <a href="{{ route('dpribadi.index') }}"
                                        class="nav-link {{ Request::is('dpribadi') ? 'active' : '' }}">
                                        <i class="icon-user"></i>
                                        <span>
                                            Data Pribadi
                                        </span>
                                    </a>

                                    <a href="{{ route('response.index') }}"
                                        class="nav-link {{ Request::is('response') ? 'active' : '' }}">
                                        <i class="icon-question3"></i>
                                        <span>
                                            Question
                                        </span>
                                    </a>

                                    <a href="{{ route('responsepemahaman.index') }}"
                                        class="nav-link {{ Request::is('responsepemahaman') ? 'active' : '' }}">
                                        <i class="icon-question3"></i>
                                        <span>
                                            Tes Pemahaman
                                        </span>
                                    </a>
                                @endif

                                <a href="{{ route('hasil.index') }}"
                                    class="nav-link {{ Request::is('hasil') ? 'active' : '' }}">
                                    <i class="icon-file-spreadsheet2"></i>
                                    <span>
                                        Data Hasil Akhir
                                    </span>
                                </a>




                            </li>
                        </ul>
                    </div>
                    <!-- /main navigation -->
                @endauth



            </div>
            <!-- /sidebar content -->

        </div>
        <!-- /main sidebar -->




        <!-- Main content -->
        <div class="content-wrapper">

            @auth

                <!-- Page header -->
                <div class="page-header page-header-light">
                    <div class="page-header-content header-elements-md-inline">
                        <div class="page-title d-flex">
                            <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">
                                    @yield('page_title')</h4>
                            <a href="#" class="header-elements-toggle text-default d-md-none"><i
                                    class="icon-more"></i></a>
                        </div>

                    </div>


                </div>
                <!-- /page header -->

            @endauth


            <!-- Content area -->
            <div class="content">

                @yield('content')

            </div>




            <!-- /content area -->


            <!-- Footer -->
            <div class="navbar navbar-expand-lg navbar-light">
                <div class="text-center d-lg-none w-100">
                    <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse"
                        data-target="#navbar-footer">
                        <i class="icon-unfold mr-2"></i>
                        Footer
                    </button>
                </div>

                <div class="navbar-collapse collapse" id="navbar-footer">
                    <span class="navbar-text">
                        &copy; 2023
                    </span>


                </div>
            </div>
            <!-- /footer -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

    <script src="{{ asset('global_assets/swall-custom.js') }}"></script>


</body>


</html>
