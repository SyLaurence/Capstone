        @extends ('layouts.nav')

        @section ('title')
            <title>Recruitment Setup</title>
        @endsection

        @section ('Content')

        <!--===================================================================================================================-->


        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <!-- page title-->
            <div class="page-title">
                <div class="title_left">
                    <h4>
                      <a href="recruitment-setup.html">Recruitment process</a> >
                      <a href="javascript:(0)">PROCESS NAME</a>
                    </h4>
                </div>
                <div class="pull-right">
                    <input type="button" class="btn btn-default" value="New Stage" onclick="location.href ='stage-add.html';">
                </div>
            </div>
            <div class="clearfix"></div>
            <!-- /page title-->

            <br>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_title">
                    <h2>Screening and Road Test</h2>
                    <input type="text" id="hfStageID" name="STAGE_ID_HERE ex:000001" value="" hidden disabled>
                    <ul class="nav navbar-right panel_toolbox">
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="stage-edit.html">Edit</a></li>
                          <li><a href="javascript:(0)" class="delete-stage">Delete</a></li>
                          <li class="divider"></li>
                          <li><a href="#">Add Activity</a></li>
                        </ul>
                      </li>
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content" style="display:none">
                    <div>
                      <label for="">Target days:</label> VALUE HERE 
                    </div>
                    <br>

                    <table id="stage1Act" class="table table-striped">
                      <thead>
                        <tr>
                          <th>Activity Name</th>
                          <th>Type</th>
                          <th>Passing grade</th>
                          <th>Appraiser Required</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Written Exam</td>
                          <td>Status</td>
                          <td>-</td>
                          <td>No</td>
                          <td>
                            <input type="button" class="btn btn-primary" value="Edit" onclick="location.href = '';">
                            <input type="button" class="btn btn-danger" value="Delete" class="delete-activity">
                          </td>
                        </tr>
                        <tr>
                          <td>Application Info</td>
                          <td>Status</td>
                          <td>-</td>
                          <td>No</td>
                          <td>
                            <input type="button" class="btn btn-primary" value="Edit" onclick="location.href = '';">
                            <input type="button" class="btn btn-danger" value="Delete" class="delete-activity">
                          </td>
                        </tr>
                        <tr>
                          <td>Road test</td>
                          <td>Grade</td>
                          <td>75</td>
                          <td>Yes</td>
                          <td>
                            <input type="button" class="btn btn-primary" value="Edit" onclick="location.href = '';">
                            <input type="button" class="btn btn-danger" value="Delete">
                            <input type="button" class="btn btn-info" value="View items" onclick="location.href='activity-items-view.html';">
                          </td>
                        </tr>
                      </tbody>
                    </table>


                  </div>
                </div>
              </div>
            </div>

            <!-- Modal Delete -->
            <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
                      </div>
                      <div class="modal-body">
                        <div>
                          <span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this stage?
                        </div>
                      </div>
                      <div class="modal-footer ">
                        <button type="button" class="btn btn-default btn-delete-stage-no" data-dismiss="modal"> No </button>
                        <button type="button" class="btn btn-success btn-delete-stage-yes"> Yes </button>
                      </div>
                  </div> <!-- /.modal-content --> 
              </div> <!-- /.modal-dialog -->
            </div>
            <!--/Modal Delete -->

           
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

    <!--===================================================================================================================-->
    
    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-datetimepicker -->    
    <script src="../vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Parsley -->
    <script src="../vendors/parsleyjs/dist/parsley.min.js"></script>

    <!-- jQuery Smart Wizard -->
    <!--script src="../vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script-->
    
    <!-- jQuery Smart-Wizard-master -->
    <script src="../vendors/SmartWizard-master/dist/js/jquery.smartWizard.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>


    <script>
      $(document).ready(function(){
        var stageID = "";

        $(".delete-stage").click(function(){
          stageID = $(this).parent().parent().parent().parent().parent().find("input").attr('name');
          console.log(stageID);
        });

        $(".btn-delete-stage-yes").click(function(){
          //delete stage
        });

        $(".btn-delete-stage-no").click(function(){
          stageID = "";
        });
      });
    </script>
  @endsection
