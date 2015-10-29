<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->

    <head>
        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Bootstrap Stylesheet -->
        <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css" media="screen">

        <!-- jquery-ui Stylesheets -->
        <link rel="stylesheet" href="/assets/jui/css/jquery.ui.all.css" media="screen">
        <link rel="stylesheet" href="/assets/jui/jquery-ui.custom.css" media="screen">
        <link rel="stylesheet" href="/assets/jui/timepicker/jquery-ui-timepicker.css" media="screen">

        <!-- Uniform Stylesheet -->
        <link rel="stylesheet" href="/plugins/uniform/css/uniform.default.css">

        <!-- Plugin Stylsheets first to ease overrides -->

        <!-- iButton -->
        <link rel="stylesheet" href="/plugins/ibutton/jquery.ibutton.css" media="screen">

        <!-- Circular Stat -->
        <link rel="stylesheet" href="/custom-plugins/circular-stat/circular-stat.css">

        <!-- Fullcalendar -->
        <link rel="stylesheet" href="/plugins/fullcalendar/fullcalendar.css" media="screen">
        <link rel="stylesheet" href="/plugins/fullcalendar/fullcalendar.print.css" media="print">

        <!-- End Plugin Stylesheets -->

        <!-- Main Layout Stylesheet -->
        <link rel="stylesheet" href="/assets/css/fonts/icomoon/style.css" media="screen">
        <link rel="stylesheet" href="/assets/css/main-style.css" media="screen">

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <title>Панель для спецтехники</title>

    </head>

    <body>

        <div id="customizer">
            <div id="showButton"><i class="icon-cogs"></i></div>
            <div id="layoutMode">
                <label class="checkbox"><input type="checkbox" class="uniform" name="layout-mode" value="boxed"> Boxed</label>
            </div>
        </div>

        <div id="wrapper">
            <header id="header" class="navbar navbar-inverse">
                <div class="navbar-inner">
                    <div class="container">
                        <div class="brand-wrap pull-left">
                            <div class="brand-img">
                                <a class="brand" href="#">
                                    <img src="assets/images/logo.png" alt="">
                                </a>
                            </div>
                        </div>

                        <div id="header-right" class="clearfix">
                            <div id="nav-toggle" data-toggle="collapse" data-target="#navigation" class="collapsed">
                                <i class="icon-caret-down"></i>
                            </div>
                            <div id="header-search">
                                <span id="search-toggle" data-toggle="dropdown">
                                    <i class="icon-search"></i>
                                </span>
                                <form class="navbar-search">
                                    <input type="text" class="search-query" placeholder="Search">
                                </form>
                            </div>
                            <div id="dropdown-lists">
                                <a class="item" href="#">
                                    <span class="item-icon"><i class="icon-exclamation-sign"></i></span>
                                    <span class="item-label">Оповещения</span>
                                    <span class="item-count">4</span>
                                </a>
                                <a class="item" href="mail.html">
                                    <span class="item-icon"><i class="icon-envelope"></i></span>
                                    <span class="item-label">Сообщения</span>
                                    <span class="item-count">16</span>
                                </a>
                            </div>

                            <div id="header-functions" class="pull-right">
                                <div id="user-info" class="clearfix">
                                    <span class="info">
                                        Привет
                                        <span class="name">{{ Auth::user()->name }}</span>
                                    </span>
                                </div>
                                <div id="logout-ribbon">
                                    <a href="/auth/logout"><i class="icon-off"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <div id="content-wrap">
                <div id="content">
                    <div id="content-outer">
                        <div id="content-inner">
                            <aside id="sidebar">
                                <nav id="navigation" class="collapse">
                                    <ul>
                                        <li @if (preg_match('/^home/', Route::currentRouteName())) class="active" @endif>
                                            <span title="Общие">
                                                <i class="icon-home"></i>
                                                <span class="nav-title">Общие</span>
                                            </span>
                                            <ul class="inner-nav">
                                                <li  @if (Route::currentRouteName() == 'home') class="active" @endif><a href="/"><i class="icol-dashboard"></i> Главная</a></li>
                                                <li><a href="calendar.html"><i class="icol-calendar-2"></i> Calendar</a></li>
                                                <li><a href="icons.html"><i class="icol-lifebuoy"></i> Icons</a></li>
                                                <li><a href="grids.html"><i class="icol-grid"></i> Grids</a></li>
                                                <li><a href="typography.html"><i class="icol-font"></i> Typography</a></li>
                                            </ul>
                                        </li>
                                        @can('admin-content')
                                        <li @if (preg_match('/^admin/', Route::currentRouteName())) class="active" @endif>
                                            <span title="Админ">
                                                <i class="icon-key"></i>
                                                <span class="nav-title">Админ</span>
                                            </span>
                                            <ul class="inner-nav">
                                                <li @if (Route::currentRouteName() == 'admin') class="active" @endif><a href="/admin"><i class="icol-ui-tab-content"></i> Страница администратора</a></li>
                                                <li @if (Route::currentRouteName() == 'admin-addop') class="active" @endif><a href="/admin/addop"><i class="icol-add"></i> Добавить оператора</a></li>
                                            </ul>
                                        </li>
                                        @endcan
                                    </ul>
                                </nav>
                            </aside>

                            <div id="sidebar-separator"></div>

                            <section id="main" class="clearfix">
                                @yield('content')
                            </section>
                        </div>
                    </div>
                </div>
            </div>

            <footer id="footer">
                <div class="footer-left">MoonCake - Responsive Admin Template</div>
                <div class="footer-right"><p>Copyright 2012. All Rights Reserved.</p></div>
            </footer>

        </div>

        <!-- Core Scripts -->
        <script src="/assets/js/libs/jquery-1.8.2.min.js"></script>
        <script src="/bootstrap/js/bootstrap.min.js"></script>
        <script src="/assets/js/libs/jquery.placeholder.min.js"></script>
        <script src="/assets/js/libs/jquery.mousewheel.min.js"></script>

        <!-- Template Script -->
        <script src="/assets/js/template.js"></script>
        <script src="/assets/js/setup.js"></script>

        <!-- Customizer, remove if not needed -->
        <script src="/assets/js/customizer.js"></script>

        <!-- Uniform Script -->
        <script src="/plugins/uniform/jquery.uniform.min.js"></script>

        <!-- jquery-ui Scripts -->
        <script src="/assets/jui/js/jquery-ui-1.8.24.min.js"></script>
        <script src="/assets/jui/jquery-ui.custom.min.js"></script>
        <script src="/assets/jui/timepicker/jquery-ui-timepicker.min.js"></script>
        <script src="/assets/jui/jquery.ui.touch-punch.min.js"></script>

        <!-- Plugin Scripts -->

        <!-- Flot -->
        <!--[if lt IE 9]>
        <script src="assets/js/libs/excanvas.min.js"></script>
        <![endif]-->
        <script src="/plugins/flot/jquery.flot.min.js"></script>
        <script src="/plugins/flot/plugins/jquery.flot.tooltip.min.js"></script>
        <script src="/plugins/flot/plugins/jquery.flot.pie.min.js"></script>
        <script src="/plugins/flot/plugins/jquery.flot.resize.min.js"></script>

        <!-- Circular Stat -->
        <script src="/custom-plugins/circular-stat/circular-stat.min.js"></script>

        <!-- SparkLine -->
        <script src="/plugins/sparkline/jquery.sparkline.min.js"></script>

        <!-- iButton -->
        <script src="/plugins/ibutton/jquery.ibutton.min.js"></script>

        <!-- Full Calendar -->
        <script src="/plugins/fullcalendar/fullcalendar.min.js"></script>

        <!-- DataTables -->
        <script src="/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="/plugins/datatables/TableTools/js/TableTools.min.js"></script>
        <script src="/plugins/datatables/dataTables.bootstrap.js"></script>

        <!-- Demo Scripts -->
        <script src="/assets/js/demo/dashboard.js"></script>

    </body>

</html>


