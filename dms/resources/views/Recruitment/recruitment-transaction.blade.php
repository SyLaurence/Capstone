        @extends ('layouts.nav')
        @section ('pageContent')
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <!-- page title-->
            <div class="page-title">
              <div class="title_left">
                <h3>Driver Name - Recruitment Progress</h3>
              </div>
              <div class="clearfix"></div>
              <br>
            </div>
            <!-- /page title-->
            
            <!-- Stage -->
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Stage 1</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <!-- if driver is currently in this stage remove  style="display:none" -->
                  <div class="x_content" style="display:none" >

                    <form id="formStageNumber">  <!-- if the driver is currently not in this stage, remove <form> tag -->
                      <table id="stage1Act" class="table table-striped">
                        <thead>
                          <tr>
                            <th></th>
                            <th>Activity Name</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              <input type="checkbox" name="" id="" value="true" class="flat" disabled/>
                            </td>
                            <td>Road Test</td>
                            <td>
                              <input type="button" class="btn btn-primary" value="Evaluate" onclick="location.href = '/Evaluation/create';">
                              <input type="button" class="btn btn-info" value="View Result/s" onclick="location.href='/Evaluation/1';">
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <input type="checkbox" name="" id="" value="true" class="flat" disabled/>
                            </td>
                            <td>Interview</td>
                            <td>
                              <input type="button" class="btn btn-primary" value="Interview" onclick="location.href = '/Interview/create';">
                              <input type="button" class="btn btn-info" value="View Details" onclick="location.href='/Interview/1';">
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <input type="checkbox" name="" id="" value="true" class="flat"/>
                            </td>
                            <td>Medical Requirements</td>
                            <td></td>
                          </tr>
                        </tbody>
                      </table>

                      <!-- to be removed if driver not in this stage -->
											<div class="form-group">
												<div class="col-md-6 col-md-offset-5">
													<button id="btnSubmit" type="submit" class="btn btn-success">Save changes</button>
												</div>
											</div>
                    </form>
                    <!-- to be removed if driver not in this stage -->

                  </div>
                </div>
              </div>
            </div>
            <!-- /Stage -->

            <!-- Stage -->
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Stage 2</h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
  
                    <div class="x_content" style="display:none" >
  
                        <table id="stage1Act" class="table table-striped">
                          <thead>
                            <tr>
                              <th></th>
                              <th>Activity Name</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>
                                <input type="checkbox" name="" id="" value="true" class="flat"/>
                              </td>
                              <td>Medical Requirements</td>
                              <td></td>
                            </tr>
                            <tr>
                              <td>
                                <input type="checkbox" name="" id="" value="true" class="flat"/>
                              </td>
                              <td>NSO</td>
                              <td></td>
                            </tr>
                            <tr>
                              <td>
                                <input type="checkbox" name="" id="" value="true" class="flat"/>
                              </td>
                              <td>Pre-employee Requirements</td>
                              <td></td>
                            </tr>
                          </tbody>
                        </table>

                    </div>
                  </div>
                </div>
              </div>
              <!-- /Stage -->

          </div>
        </div>
        <!-- /page content -->
        @endsection
        @section ('jscript')
    <!-- jQuery -->
    <script src="{{asset('vendors/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('vendors/fastclick/lib/fastclick.js')}}"></script>
    <!-- NProgress -->
    <script src="{{asset('vendors/nprogress/nprogress.js')}}"></script>
    <!-- iCheck -->
    <script src="{{asset('vendors/iCheck/icheck.min.js')}}"></script>
    <!-- bootstrap-datetimepicker -->    
    <script src="{{asset('vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}"></script>
    <!-- Datatables -->
    <script src="{{asset('vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
    <script src="{{asset('vendors/jszip/dist/jszip.min.js')}}"></script>
    <script src="{{asset('vendors/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{asset('vendors/pdfmake/build/vfs_fonts.js')}}"></script>

    <!-- Parsley -->
    <script src="{{asset('vendors/parsleyjs/dist/parsley.min.js')}}"></script>

    <!-- jQuery Smart Wizard -->
    <!--script src="{{asset('vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js')}}"></script-->
    
    <!-- jQuery Smart-Wizard-master -->
    <script src="{{asset('vendors/SmartWizard-master/dist/js/jquery.smartWizard.min.js')}}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{asset('build/js/custom.min.js')}}"></script>

    <!-- Custom Theme Scripts for this HTML -->
    <script src="{{asset('js/recruitment-details-view.js')}}"></script>
    @endsection
