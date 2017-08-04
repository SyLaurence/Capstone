        @extends ('layouts.nav')

        @section ('title')
            <title>Recruitment Setup</title>
        @endsection

        @section ('Content')

        <!--===================================================================================================================-->

         <!-- page content -->
        <div class="right_col" role="main">
            <div class="">

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_content">
                            
                                <form id="formAddStage" data-parsley-validate class="form-horizontal form-label-left">
                                    <span class="section">New Process</span>
                                    <div class="item form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                                        Name <span class="required">*</span>
                                      </label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="txtProcessName" name="txtProcessName" required="required" class="form-control col-md-7 col-xs-12" >
                                      </div>
                                    </div>
                                    
                                    <div class="ln_solid"></div>

                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <button onclick="window.location='recruitment-setup.html';" class="btn btn-primary">Cancel</button>
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

