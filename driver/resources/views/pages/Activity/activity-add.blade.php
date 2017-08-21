        @extends ('pages.layout.nav')
        @section ('pageContent') 
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_content">
                            
                                <form id="formAddActivity" data-parsley-validate class="form-horizontal form-label-left">
                                    <span class="section">PROCESS NAME > STAGE NAME > New Activity</span>
                                    <div class="item form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                                        Number <span class="required">*</span>
                                      </label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="number" id="txtActNum" name="txtActNum" required="required" min="1" class="form-control col-md-7 col-xs-12" >
                                      </div>
                                    </div>
                                    <div class="item form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                                        Name <span class="required">*</span>
                                      </label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="txtStageNum" name="txtStageNum" required="required" class="form-control col-md-7 col-xs-12" >
                                      </div>
                                    </div>
                                    <div class="item form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">
                                      Type <span class="required">*</span>
                                      </label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                          <select name="txtActType" id="txtActType" class="form-control" required>
                                              <option value="">Choose..</option>
                                              <option value="status"id="cmbxStatus">Status (In-progress, Pass, Fail)</option>
                                              <option value="grade" id="cmbxGrade">Grade</option>
                                          </select>
                                      </div>
                                    </div>

                                    <div id="divGrade" hidden>
                                      <div class="ln_solid"></div>
                                      <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">
                                        How you want to get the final score <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select name="txtScoreType" id="txtScoreType" class="form-control">
                                                <option value="">Choose..</option>
                                                <option value="sum">Sum</option>
                                                <option value="ave">Average</option>
                                            </select>
                                        </div>
                                      </div>
                                      <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtPassingGrade">
                                          Passing grade <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input type="number" id="txtPassingGrade" name="txtPassingGrade" step="any" min="1" class="form-control col-md-7 col-xs-12" >
                                        </div>
                                      </div>
                                      <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtMaximumGrade">
                                          Maximum grade <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input type="number" id="txtMaximumGrade" name="txtMaximumGrade" step="any" min="1" class="form-control col-md-7 col-xs-12" >
                                        </div>
                                      </div>
                                    </div>
                                    
                                    <div class="ln_solid"></div>

                                    <div class="item form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cboxHasItems">
                                        Allow activity to be skippable <span class="required">*</span>
                                      </label>
                                      <div class="col-md-1 col-sm-1 col-xs-12">
                                        <label for="">Yes</label><input type="radio" class="flat" name="rbtnIsSkippable" id="rbtnIsSkippableYes" value="HasItemsYes" />
                                      </div>
                                      <div class="col-md-1 col-sm-1 col-xs-12">
                                        <label for="">No</label> <input type="radio" class="flat" name="rbtnIsSkippable" id="rbtnIsSkippableNo" value="HasItemsNo" checked/>
                                      </div>
                                    </div>

                                    <div class="ln_solid"></div>

                                    <div class="item form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cboxHasItems">
                                        Does activity has items <span class="required">*</span>
                                      </label>
                                      <div class="col-md-1 col-sm-1 col-xs-12">
                                        <label for="">Yes</label><input type="radio" class="flat" name="rbtnHasItems" id="rbtnHasItemsYes" value="HasItemsYes"/>
                                      </div>
                                      <div class="col-md-1 col-sm-1 col-xs-12">
                                        <label for="">No</label> <input type="radio" class="flat" name="rbtnHasItems" id="rbtnHasItemsNo" value="HasItemsNo" checked/>
                                      </div>
                                    </div>

                                    <div class="ln_solid"></div>

                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <button onclick="window.location='account.html';" class="btn btn-primary">Cancel</button>
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
        @endsection
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
    <!-- Parsley -->
    <script src="../vendors/parsleyjs/dist/parsley.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

    <script>
      $(document).ready(function(){
        var intActLatest = 0; //Higest activity number na meron yung process na to.

        $("#txtActType").change(function(){
          if($("#cmbxGrade").is(':selected')){
            $("#divGrade").show();
            $("#txtPassingGrade").prop("required",true);
            $("#txtMaximumGrade").prop("required",true);
            $("#txtScoreType").prop("required",true);
          }
          else{
            $("#divGrade").hide();
            $("#txtPassingGrade").prop("required", false);
            $("#txtMaximumGrade").prop("required", false);
            $("#txtScoreType").prop("required", false);
          }
        });

        $('#formAddActivity').submit(function() {
          var intActInput = $("#txtActNum").val();
          var strType = $("#txtActType").val();
          console.log(strType);

          /// To check if the activity is greater than the highest activity number + 1
          if(intActInput > intActLatest + 1) {
              window.alert("Activity number should not be greater than " + (intActLatest + 1) + ".");
              return false;
          }
          else{
            if(strType == "grade"){
              var intPass = $("#txtPassingGrade").val();
              var intMax = $("#txtMaximumGrade").val();
              
              console.log(intPass + " - " + intMax);
          
              if(intPass > intMax){
                window.alert("Passing grade should not be more than or equal to maximum grade");
                return false;
              }
              else{
                  $('#formAddActivity').submit();
              }
            }
            else if(strType == "status"){
              console.log("Status in!");
              form.submit();
            }
          }
        });

      });
    </script>

  </body>
</html>

