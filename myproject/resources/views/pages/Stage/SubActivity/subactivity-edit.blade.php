<!DOCTYPE html>
<html lang="en">
  <!-- HEAD -->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin | Dashboard</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress - is a progress bar-->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <!-- SmartWizard-master -->
    <link href="../vendors/SmartWizard-master/dist/css/smart_wizard.css" rel="stylesheet">
    <link href="../vendors/SmartWizard-master/dist/css/smart_wizard_theme_dots.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">

    <!-- Custom Theme Style || Created by: Jemee-->
    <link href="css/custom.css" rel="stylesheet">
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
                        <li><a href="bus.html"><i class="fa fa-bus"></i> Bus comapnies </a></li>
                        <li><a href="recruitement-setup.html"><i class="fa fa-tasks"></i> Recruitment </a></li>
                        <li><a href="performance-setup.html"><i class="fa fa-check-square-o"></i> Performance </a></li>
                        <li><a href="account.html"><i class="fa fa-users"></i> Accounts </a></li>
                    </ul>
                </div>

                <div class="menu_section">
                    <h3>Transactions</h3>
                    <ul class="nav side-menu">
                        <li><a href="applicant-add-wizard.html"><i class="fa fa-plus"></i> New applicant </a></li>
                        <li><a><i class="fa fa-address-card"></i> Drivers <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="driver-apprentice.html">Apprentice</a></li>
                                <li><a href="driver-hired.html">Drivers</a></li>
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
                      <a href="profile-edit.html">
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

        <!--===================================================================================================================-->

         <!-- page content -->
        <div class="right_col" role="main">
            <div class="">

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_content">
                            
                                <form id="formEditActItem" data-parsley-validate class="form-horizontal form-label-left">
                                    <span class="section">New Activity Item</span>
                                    <div class="item form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                                        Name <span class="required">*</span>
                                      </label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="txtItemName" name="txtItemName" required="required" class="form-control col-md-7 col-xs-12" >
                                      </div>
                                    </div>
                                    <div class="item form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">
                                      Type <span class="required">*</span>
                                      </label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                          <select name="txtItemType" id="txtItemType" class="form-control" required>
                                              <!--option value="">Choose..</option-->
                                              <option value="Check" id="cmbxCheck">Check</option selected>
                                              <option value="Number" id="cmbxNumber">Number</option>
                                              <!--option value="OptionSet" id="cmbxOptionSet">Option Set</option-->
                                          </select>
                                      </div>
                                    </div>

                                    <!-- Min and Max fields -->
                                    <div id="MinMaxFields" hidden> <!-- Just remove hidden to show this div -->
                                      <div class="ln_solid"></div>
                                      <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                                          Min. value <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input type="number" id="txtMin" name="txtMin" required="required" step="any" class="form-control col-md-7 col-xs-12" >
                                        </div>
                                      </div>
                                      <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                                          Max. value <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input type="number" id="txtMax" name="txtMax" required="required" step="any" class="form-control col-md-7 col-xs-12" >
                                        </div>
                                      </div>
                                    </div>
                                    <!-- /Min and Max fields -->

                                    <!-- Option Set fields -->
                                      <!--div id="OptionSetFields" hidden>
                                        <div class="ln_solid"></div>
                                        <div class="item form-group">
                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                                            Value 1<span class="required">*</span>
                                          </label>
                                          <div class="col-md-5 col-sm-5 col-xs-12">
                                            <input type="text" id="txtOption1" name="txtOption1" required="required" class="form-control col-md-7 col-xs-12" >
                                          </div>
                                          <a href="javascript:void(0)" class="col-md-1 col-sm-1 col-xs-12" ></a>
                                        </div>  
                                        <div class="item form-group option-div">
                                          <label class="control-label col-md-4 col-sm-4 col-xs-12" for="name">
                                            <a h ref="javascript:void(0)" class="add-option">Add option</a>
                                          </label>
                                        </div>
                                      </div-->
                                    <!-- /Option Set fields -->

                                    <div class="ln_solid"></div>

                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-3">
                                            <button onclick="window.location='account.html';" class="btn btn-primary">Cancel</button>
                                            <button id="btnSubmit" type="submit" class="btn btn-success">Save changes</button>
                                        </div>
                                    </div>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>
        </div>
        <!-- /page content -->

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

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Parsley -->
    <script src="../vendors/parsleyjs/dist/parsley.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

    <script>
      $(document).ready(function(){
        var intOption = 1;

        $("#txtItemType").change(function(){
          var id = $(this).find("option:selected").attr("id");
          switch (id){
            case "cmbxCheck":
              $("#MinMaxFields").hide();
              $("#txtMin").prop("required",false);
              $("#txtMax").prop("required",false);
              break;
            case "cmbxNumber":
              $("#MinMaxFields").show();
              $("#OptionSetFields").hide();
              $("#txtMin").prop("required",true);
              $("#txtMax").prop("required",true);
              break;
            //case "cmbxOptionSet":
            //  break;
          }
        });

        $("#formEditActItem").submit(function(){
          var strItemType = $("#txtItemType").val();
          var dblMin = $("#txtMin").val();
          var dblMax = $("#txtMax").val();

          console.log(strItemType);
          console.log(dblMin + " - " + dblMax);

          if(strItemType == "Number"){
            if(dblMin < dblMax){
              form.submit();
            }
            else{
              alert("Minimum value should not be greater than or equal to maximum value.");
              return false;
            }
          }
          else{
            form.submit();
          }
        });

      });
    </script>

  </body>
</html>

