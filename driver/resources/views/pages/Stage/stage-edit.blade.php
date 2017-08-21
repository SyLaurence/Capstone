        @extends ('pages.layout.nav')
        @section ('pageContent') 
         <!-- page content -->
        <div class="right_col" role="main">
            <div class="">

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_content">
                            
                                <form method="post" action="{{action('StageController@update', $stages->id)}}" id="formAddStage" data-parsley-validate class="form-horizontal form-label-left">
                                {{csrf_field()}}
                                <input name="_method" type="hidden" value="PATCH">
                                    <span class="section">Recruitment Process > Edit {{$stages->name}}</span>
                                    <div class="item form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                                        Stage Number <span class="required">*</span>
                                      </label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="number" id="txtStageNum" name="txtStageNum" required="required" min="1" class="form-control col-md-7 col-xs-12" value="{{$stages->number}}" >
                                      </div>
                                    </div>
                                    <div class="item form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                                        Name <span class="required">*</span>
                                      </label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="txtStageName" name="txtStageName" required="required" class="form-control col-md-7 col-xs-12" value="{{$stages->name}}" >
                                      </div>
                                    </div>
                                    <div class="item form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                                        Target Days <span class="required">*</span>
                                      </label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="number" id="txtTargetDays" name="txtTargetDays" required="required" min="1" class="form-control col-md-7 col-xs-12" value="{{$stages->targetdays}}" >
                                      </div>
                                    </div>
                                    
                                    <div class="ln_solid"></div>

                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
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
        @endsection
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
        var intStageLatest = 0; //Higest stage na meron yung process na to.

        $('#formAddStage').submit(function() {
          var intStageInput = $("#txtStageNum").val();

          if(intStageInput > intStageLatest + 1) {
              window.alert("Stage number should not be greater than " + (intStageLatest + 1) + ".");
              return false;
          }
          else{
              form.submit();
          }
        });
      });
    </script>
  </body>
</html>

