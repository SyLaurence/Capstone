        @extends ('layouts.nav')
        @if(session()->get('level') == 0)
          @section ('title')
          Admin | Edit Activity
          @endsection
        @else
          @section ('title')
          HR Staff | Edit Activity
          @endsection
        @endif
        @section ('pageContent')
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                  
                    <form id="formAddActivity" method="post" action="{{action('StageController@update', $activity->id)}}" data-parsley-validate class="form-horizontal form-label-left">
                    <input name="_method" type="hidden" value="PATCH">
											<span class="section"> Edit Activity</span>
                      {{csrf_field()}}
											<div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                          Stage Number <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <!--input type="number" id="txtStageNum" name="txtStageNum" required="required" min="1" step="1" class="form-control col-md-7 col-xs-12" value="{{$activity->stage_no}}" -->
                          <input type="text" id="txtStageNum" name="txtStageNum" required="required" min="1" step="1" data-parsley-validation-threshold="1" data-parsley-trigger="keyup" data-parsley-type="digits"  class="form-control col-md-7 col-xs-12" value="{{$activity->stage_no}}"/>
                        </div>
											</div>

                      <div class="ln_solid"></div>											

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                          Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="txtActName" name="txtActName" required="required" class="form-control col-md-7 col-xs-12" value="{{$activity->name}}" >
                        </div>
											</div>

											<div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                          Activity Number <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <!--input type="number" id="txtActNum" name="txtActNum" required="required" min="1" step="1" class="form-control col-md-7 col-xs-12" value="{{$activity->number}}" -->
                          <input type="text" id="txtActNum" name="txtActNum" required="required" min="1" step="1" data-parsley-validation-threshold="1" data-parsley-trigger="keyup" data-parsley-type="digits"  class="form-control col-md-7 col-xs-12" value="{{$activity->number}}"/>
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
                            <option value="Onboarding" id="cmbxGrade"> Onboarding</option>
                          </select>
                        </div>
											</div>
											
											<div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                          Target Days <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <!--input type="number" id="txtTargetDays" name="txtTargetDays" required="required" min="1" step="1" class="form-control col-md-7 col-xs-12" value="{{$activity->target_days}}" -->
                          <input type="text" id="txtTargetDays" name="txtTargetDays" required="required" min="0" step="1" data-parsley-validation-threshold="1" data-parsley-trigger="keyup" data-parsley-type="digits"  class="form-control col-md-7 col-xs-12" value="{{$activity->target_days}}"/>
                        </div>
											</div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cboxHasItems">
                          Allow activity to be skipped? <span class="required">*</span>
                        </label>
                        <div class="control-label col-md-1 col-sm-1 col-xs-12">
                          <label for="">Yes</label><input type="radio" class="flat" name="rbtnIsSkippable" id="rbtnIsSkippableYes" value="1" />
                        </div>
                        <div class="control-label col-md-1 col-sm-1 col-xs-12">
                          <label for="">No</label> <input type="radio" class="flat" name="rbtnIsSkippable" id="rbtnIsSkippableNo" value="0" checked/>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                          <button onclick="window.location='';" class="btn btn-primary">Cancel</button>
                          <button id="btnSubmit" type="submit" class="btn btn-success">Save Changes</button>
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
    <!-- iCheck -->
    <script src="{{asset('vendors/iCheck/icheck.min.js')}}"></script>
    <!-- Custom Theme Scripts -->
    <script src="{{asset('build/js/custom.min.js')}}"></script>

    <script>
    //   $(document).ready(function(){
				// //          Stage no = [1, 2, 3];
				// //             Index = [0, 1, 2];
				// var ActivityPerStage = [3, 2, 3];

				// var HighestStageNum = 3;  //Highest stage number in db

				// $('#formAddActivity').submit(function() {
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
    //     });
    //   });
    </script>
    @endsection