        @extends ('layouts.nav')
        @section ('title')
            <title>Line Familiarization</title>
        @endsection
        @section ('Content')
        <!-- page content -->
        <div class="right_col" role="main">
        <div class="">

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                    <div class="x_content">
                      
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                          
                            <span class="section">New line familiarization criterion</span>
                            
                            <div class="item form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                                  Name <span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="txtLineFamName" name="txtLineFamName" required="required" class="form-control col-md-7 col-xs-12" >
                              </div>
                            </div>
                            <div class="item form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">
                                  Description <span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="txtLineFamDesc" name="txtLineFamDesc" required="required" class="form-control col-md-7 col-xs-12">
                              </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">
                                  Type <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="txtLineFamType" id="txtLineFamType" class="form-control" required>
                                        <option value="">Choose..</option>
                                        <option value="Check box">Check box</option>
                                        <option value="Rating">Rating</option>
                                    </select>
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                  <button onclick="window.location='/LineFam';" class="btn btn-primary">Cancel</button>
                                  <button id="btnSubmit" type="submit" class="btn btn-success">Submit</button>
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
    @endsection