    @extends ('layouts.nav')
    @section ('title')
        Performance Evaluation
    @endsection
    @section ('pageContent')
        <!-- page content -->
        <div class="right_col" role="main">
					<div class="">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="x_panel">
									<div class="x_content">
									
										<form id="formEvaluation" data-parsley-validate class="form-horizontal form-label-left">
											<span class="section">
                        Performance Appraisal <br>
                        <h4> {{$applicant->first_name}} {{$applicant->middle_name}} {{$applicant->last_name}} {{$applicant->extension_name}} | {{$busname}} </h4>
                      </span>
                      <!-- Item -->
                        @foreach($Factors as $factor)
                        <div style="padding-bottom: 15px">
                          @if($factor->criteriasetup->first() != null)
                          <input type="checkbox" name="fac{{$factor->id}}" id="fac{{$factor->id}}" class="flat" disabled/> {{$factor->name}} 
                          @else
                          <input type="checkbox" name="fac{{$factor->id}}" id="fac{{$factor->id}}" class="flat" /> {{$factor->name}} 
                          @endif
                          <br>
                          <!-- Criteria -->
                          @foreach($factor->criteriasetup as $criteria)
                          <div style="padding-left: 25px">
                            <input type="checkbox" name="cri{{$criteria->id}}" id="cri{{$criteria->id}}" class="flat" /> {{$criteria->name}} <br>
                          </div>
                          @endforeach
                          <!-- /Criteria -->
                        </div>
                        @endforeach
                        <!-- /Item -->
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                            Comment <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea rows="3" cols="20" id="txtComment" name="txtComment" required="required" class="form-control col-md-7 col-xs-12" style="resize:vertical"></textarea>
                        </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">
                        Recommendation <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="cmbxRecommendation" id="cmbxRecommendation" class="form-control" required>
                          <option value="">Choose..</option>
                          <option value="2nd contract">2nd Contract</option>
                          <option value="Regular">Regular</option>
                          <option value="Dismiss">Dismiss</option> 
                        </select>
                      </div>
                    </div>
											
										<div class="ln_solid"></div>
											<div class="form-group">
												<div class="col-md-6 col-md-offset-4">
													<button onclick="window.location='/HiredDriver';" class="btn btn-primary">Cancel</button>
													<button id="btnSubmit" type="button" class="btn btn-success">Evaluate</button>
												</div>
											</div>
										</form>
										<form id="formAdd" method="post" action="{{route('Appraisal.store')}}">
                      {{csrf_field()}}
                      @foreach($Factors as $factor)
                        @if($factor->criteriasetup->first() != null)
                          <input type="text" id="fact{{$factor->id}}" name="fact{{$factor->id}}" value="hasCrit" hidden>
                          @foreach($factor->criteriasetup as $criteria)
                            <input type="text" id="crit{{$criteria->id}}" name="crit{{$criteria->id}}" value="" hidden>
                          @endforeach
                        @else
                          <input type="text" id="fact{{$factor->id}}" name="fact{{$factor->id}}" value="notChecked" hidden>
                        @endif
                      @endforeach
                      <input type="text" name="appID" value="{{$applicant->id}}" hidden>
                      <input type="text" name="Comment" id="Comment" hidden>
                      <input type="text" name="Recommendation" id="Recommendation" hidden>
                      <input type="text" name="Tran" value="Perf" hidden>
                    </form> 
									</div>
								</div>
							</div>
            </div>
            
            <!-- Modal Confirmation -->
            <div class="modal fade" id="modalConfirmation" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title custom_align" id="Heading">Sumbit Evaluation</h4>
                      </div>
                      <div class="modal-body">
                        <div>
                          <span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to submit this evaluation? 
                          <br> Once submitted, this evaluation cannot be undone and edited.
                        </div>
                      </div>
                      <div class="modal-footer ">
                        <button type="button" class="btn btn-default btn-submit-no" data-dismiss="modal"> No </button>
                        <button type="button" id="btnSubmitConfirmYes" class="btn btn-success btn-submit-yes"> Yes </button>
                      </div>
                  </div> <!-- /.modal-content --> 
              </div> <!-- /.modal-dialog -->
            </div>
            <!--/Modal Delete -->
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

    <script>
      $(document).ready(function(){
				$('#btnSubmit').click(function(){
          $("#modalConfirmation").modal("show");
        });

        $('#btnSubmitConfirmYes').click(function(){
          @foreach($Factors as $factor)
            @if($factor->criteriasetup->first() !=null)
              @foreach($factor->criteriasetup as $criteria)
                if(document.getElementById('cri{{$criteria->id}}').checked){
                  document.getElementById('crit{{$criteria->id}}').value = 'checked';
                  //alert(document.getElementById('crit{{$criteria->id}}').value + ' - {{$criteria->id}}');
                } else {
                  document.getElementById('crit{{$criteria->id}}').value = 'notChecked';
                  //alert(document.getElementById('crit{{$criteria->id}}').value);
                }
              @endforeach
            @else
              if(document.getElementById('fac{{$factor->id}}').checked){
                @if($factor->criteriasetup->first() !=null)
                  document.getElementById('fact{{$factor->id}}').value = 'hasCrit';
                @else
                    document.getElementById('fact{{$factor->id}}').value = 'checked';
                @endif
                //alert(document.getElementById('fact{{$factor->id}}').value);
              }
            @endif
          @endforeach
          document.getElementById('Comment').value = document.getElementById('txtComment').value;
          document.getElementById('Recommendation').value = document.getElementById('cmbxRecommendation').value;
          $('#formAdd').submit();
        });
      });
    </script>
    @endsection