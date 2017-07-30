<!DOCTYPE html>
<html lang="en">
  <!-- HEAD -->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @yield('title')

    <!-- Bootstrap -->
    <link href="{{asset('vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress - is a progress bar-->
    <link href="{{asset('vendors/nprogress/nprogress.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('build/css/custom.min.css')}}" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">

        <!-- side navigation -->
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">

            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-bus"></i> <span>Bicol Isarog</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>John Doe</h2>
              </div>
              <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                <!--
                <div class="menu_section">
                    <ul class="nav side-menu">
                        <li><a href=""><i class="fa fa-tachometer"></i> Dashboard </a></li>
                    </ul>
                </div>
                -->
                <div class="menu_section">
                    <h3>Maintenance</h3>
                    <ul class="nav side-menu">
                        <li><a href="CompanyBrand"><i class="fa fa-bus"></i> Bus Companies </a></li>
                        <li><a><i class="fa fa-check-square-o"></i> Criteria for Evaluation <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="PerfApp">Performance Appraisal</a></li>
                                <li><a href="LineFam">Line Familiarization</a></li>
                                <li><a href="RoadTest">Road Test</a></li>
                            </ul>
                        </li>
                        <li><a><i class="fa fa-tasks"></i> Recruitment Process <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="Stage">Stages</a></li>
                                <li><a href="Activity">Activities</a></li>
                            </ul>
                        </li>
                        <li><a href="Users"><i class="fa fa-users"></i> Accounts </a></li>
                    </ul>
                </div>

                <div class="menu_section">
                    <h3>Transactions</h3>
                    <ul class="nav side-menu">
                        <li><a href="javascript:void(0)"><i class="fa fa-plus"></i> New applicant </a></li>
                        <li><a><i class="fa fa-address-card"></i> Drivers <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="e_commerce.html">Apprentice</a></li>
                                <li><a href="projects.html">Drivers</a></li>
                            </ul>
                        </li>          
                    </ul>
                </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
                <a data-toggle="tooltip" data-placement="top" title="Settings">
                    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                    <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="Lock">
                    <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                    <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>
        <!-- side navigation -->

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt="">John Doe
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->


        @yield('Content')



        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

  </body>




</html>