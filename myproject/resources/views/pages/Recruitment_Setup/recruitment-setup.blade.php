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
                    <h3>Recruitment process</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <!-- /page title-->

            <br>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                  <div class="x_title">
                   <ul class="nav navbar-right panel_toolbox">
                      <li>
                        <a href="recruitment-setup-add.html">Add new process</a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Process 1</td>
                          <td>Currently Used</td>
                          <td>
                            <input type="button" class="btn btn-info" value="View Details" onclick="location.href='recruitment-details-view.html';">
                          </td>
                        </tr>
                        <tr>
                          <td>Process 2</td>
                          <td></td>
                          <td>
                            <input type="button" class="btn btn-info" value="View Details" onclick="location.href='recruitment-details-view.html';">
                            <input type="button" class="btn btn-primary use-default" value="Use as default">
                          </td>
                        </tr>
                        <tr>
                          <td>Process 3</td>
                          <td></td>
                          <td>
                            <input type="button" class="btn btn-info" value="View Details" onclick="location.href='recruitment-details-view.html';">
                            <input type="button" class="btn btn-primary use-default" value="Use as default">
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>

                </div>
              </div>
            </div>

            <!-- Modal Change Current -->
            <div class="modal fade" id="modalUseDefault" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title custom_align" id="Heading">Use as default</h4>
                      </div>
                      <div class="modal-body">
                        <div>
                          <span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to use this process as default?
                        </div>
                      </div>
                      <div class="modal-footer ">
                        <button type="button" class="btn btn-default" data-dismiss="modal"> No </button>
                        <button type="button" class="btn btn-success"> Yes </button>
                      </div>
                  </div> <!-- /.modal-content --> 
              </div> <!-- /.modal-dialog -->
            </div>
            <!--/Modal Change Current -->

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
        $(".use-default").click(function(){
          $("#modalUseDefault").modal("show");
        });
      });
    </script>
    @endsection