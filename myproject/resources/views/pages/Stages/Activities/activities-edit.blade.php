

@extends ('layouts.nav')
        
        <!-- page content -->
        @section ('title')
            <title>Bus companies</title>
        @endsection
        @section ('Content')
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_content">
                            <form id="formEditActivity" data-parsley-validate class="form-horizontal form-label-left">
                                
                                <span class="section">Edit activity in STAGE NAME HERE</span>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                                        Description <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="txtDescription" name="txtDescription" required="required" class="form-control col-md-7 col-xs-12" >
                                    </div>
                                </div>
                                
                                <div class="ln_solid"></div>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                                        Stage <span class="required"></span>
                                    </label>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                            <select name="cmbxEditStage" id="cmbxEditStage" class="form-control" required disabled>
                                                <!-- example lang yung selected -->
                                                <option value="st" selected>STAGE NAME</option>
                                                <option value="st">STAGE NAME</option>
                                            </select>
                                        </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                        <input type="button" id="btnChangeStage" name="btnChangeStage" value="Change stage" >
                                    </div>
                                </div>
                                
                                <div class="ln_solid"></div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <button onclick="window.location='/Activity';" class="btn btn-primary">Cancel</button>
                                        <button id="btnSubmit" type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Change stage -->
            <div class="modal fade" id="modalChangeStage" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title custom_align" id="Heading">Change stage</h4>
                        </div>
                        <div class="modal-body">
                            <div>
                                <span class="glyphicon glyphicon-warning-sign"></span> This will change the stage of the activity. Continue?
                            </div>
                        </div>
                        <div class="modal-footer ">
                            <button type="button" class="btn btn-default btnChangeNo" data-dismiss="modal"> No </button>
                            <button type="button" class="btn btn-success btnChangeYes"> Yes </button>
                        </div>
                    </div> <!-- /.modal-content --> 
                </div> <!-- /.modal-dialog -->
            </div>
            <!--/Modal Change stage -->
            
            
            </div>
        </div>
        <!-- /page content -->


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
            $("#btnChangeStage").click(function(){
                event.preventDefault();
                $('#cmbxEditStage').prop("disabled", false);
            });
        });
    </script>
  </body>
</html>
@endsection