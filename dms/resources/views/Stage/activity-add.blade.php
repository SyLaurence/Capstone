        @extends ('layouts.nav')
        @section ('pageContent')
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                  
                  <form id="formData" action="{{route('Stage.store')}}" method="post" hidden>
                    {{csrf_field()}}
                    <input type="text" id="hdStagenum" name="hdStagenum" hidden>
                    <input type="text" id="hdActnum" name="hdActnum" hidden>
                    <input type="text" id="hdType" name="hdType" hidden>
                    <input type="text" id="hdTargetDays" name="hdTargetDays" hidden>
                    <input type="text" id="hdName" name="hdName" hidden>
                  </form>

                    <form id="formAddActivity" data-parsley-validate class="form-horizontal form-label-left">
											<span class="section"> New Activity</span>

											<div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                          Stage Number <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="txtStageNum" name="txtStageNum" required="required" min="1" step="1" class="form-control col-md-7 col-xs-12" >
                        </div>
											</div>

                      <div class="ln_solid"></div>											

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                          Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="txtActName" name="txtActName" required="required" class="form-control col-md-7 col-xs-12" >
                        </div>
											</div>

											<div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                          Activity Number <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="txtActNum" name="txtActNum" required="required" min="1" step="1" class="form-control col-md-7 col-xs-12" >
                        </div>
											</div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtActType">
                        Type <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="txtActType" id="txtActType" class="form-control" required>
                            <option value="">Choose..</option>
                            <option value="Document" id="cmbxStatus"> Document</option>
                            <option value="Evaluation" id="cmbxStatus"> Evaluation</option>
                            <option value="Interview" id="cmbxGrade"> Interview</option>
                          </select>
                        </div>
											</div>
											
											<div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                          Target Days <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="txtTargetDays" name="txtTargetDays" required="required" min="1" step="1" class="form-control col-md-7 col-xs-12" >
                        </div>
											</div>
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                          <button onclick="window.location='/Stage';" class="btn btn-primary">Cancel</button>
                          <input type="button" id="btnSubmit" onclick="toSubmit()" class="btn btn-success" value="Submit">
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
    <!-- Parsley -->
    <script src="{{asset('vendors/parsleyjs/dist/parsley.min.js')}}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{asset('build/js/custom.min.js')}}"></script>

    <script>
    function toSubmit(){
          document.getElementById('hdName').value = document.getElementById('txtActName').value;
          document.getElementById('hdTargetDays').value = document.getElementById('txtTargetDays').value;
          document.getElementById('hdActnum').value = document.getElementById('txtActNum').value;
          document.getElementById('hdStagenum').value = document.getElementById('txtStageNum').value;
          var type = document.getElementById('txtActType').value;
          if(type == "Document")
          {
              document.getElementById('hdType').value = 0;
          }
          if(type == "Evaluation")
          {
              document.getElementById('hdType').value = 1;
          }
          if(type == "Interview")
          {
              document.getElementById('hdType').value = 2;
          }
          $( "#formData" ).submit();
        }
      $(document).ready(function(){
        
        
				//          Stage no = [1, 2, 3];
				//             Index = [0, 1, 2];
				// var ActivityPerStage = [3, 2, 3];

				// var HighestStageNum = 3;  //Highest stage number in db
        
				 //$('#formAddActivity').submit(function() {
          
    //       var stageNum = $("#txtStageNum").val();
    //       var actNum = $("#txtActNum").val();
				// 	var highestActNum = 0;

				// 	if(stageNum <= HighestStageNum + 1){
				// 		if(stageNum != HighestStageNum + 1){
				// 			highestActNum = ActivityPerStage[stageNum - 1];
				// 		}

				// 		console.log(highestActNum);

				// 		if( actNum <= (highestActNum + 1) ){
				// 			alert("IN");
				// 			form.submit();
				// 		}
				// 		else{
				// 			alert("Activity number should not exceed to " + (highestActNum + 1));
				// 			return false;
				// 		}
				// 	}
				// 	else{
				// 		alert("Stage number should not exceed to " + (HighestStageNum + 1));
				// 		return false;
				// 	}
        // });
       });
    </script>
    @endsection
