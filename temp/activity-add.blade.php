        @extends ('layouts.nav')
        @section ('title')
        Admin | Add Activity
        @endsection
        @section ('pageContent') 
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_content">
                            <form id="formAdd" action="{{route('Stage.create')}}" method="post">
                              {{csrf_field()}}
                              <input type="text" id="stgID" name="stgID" hidden>
                              <input type="text" id="name" name="name" hidden>
                              <input type="text" id="type" name="type" hidden>
                              <input type="text" id="passcrit" name="passcrit" hidden>
                              <input type="text" id="passgrade" name="passgrade" hidden>
                              <input type="text" id="maxgrade" name="maxgrade" hidden>
                              <input type="text" id="skip" name="skip" hidden>
                              <input type="text" id="subact" name="subact" hidden>
                            </form>
                                <form id="formAddActivity" data-parsley-validate class="form-horizontal form-label-left">
                                    <span class="section"> Recruitment Process > {{$stage->name}} > New Activity</span>
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
                                        <input type="text" id="txtActName" name="txtActName" required="required" class="form-control col-md-7 col-xs-12" >
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
                                            <button onclick="window.location='/Stage';" class="btn btn-primary">Cancel</button>
                                            <button id="btnSubmit" type="button" onclick="sbmt();" class="btn btn-success">Submit</button>
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
    <!-- Parsley -->
    <script src="{{asset('vendors/parsleyjs/dist/parsley.min.js')}}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{asset('build/js/custom.min.js')}}"></script>
    <script>
      $(document).ready(function(){
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
      });
    </script>
    <script>
      function sbmt(){
          var intActLatest = 0;
          alert('asddas');
          var intActInput = document.getElementById('txtActNum').value;
          var strType = document.getElementById('txtActType').value;
          console.log(strType);
          /// To check if the activity is greater than the highest activity number + 1
          if(intActInput > intActLatest + 1) {
              window.alert("Activity number should not be greater than " + (intActLatest + 1) + ".");
              return false;
          }
          else {
            if(strType == "grade"){
              var intPass = document.getElementById('txtActType').value;
              var intMax = document.getElementById('txtMaximumGrade').value;
              
              console.log(intPass + " - " + intMax);
              
              if(intPass > intMax){
                window.alert("Passing grade should not be more than or equal to maximum grade");
                return false;
              }
              else{
                alert('grade');
                txtActNumtxtStageNumtxtActNumtxtStageNumtxtActTypetxtScoreTypetxtPassingGradetxtMaximumGraderbtnHasItemsYesrbtnHasItemsNorbtnIsSkippableYesrbtnIsSkippableNo
                //$('#formAdd').submit();
              }
            }
           else if(strType == "status"){
              alert('status');
              //$('#formAdd').submit();
          }
        }
      }
      </script>
      @endsection

