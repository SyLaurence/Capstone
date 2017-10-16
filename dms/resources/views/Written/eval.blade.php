        @extends ('layouts.nav')
        @if(session()->get('level') == 0)
          @section ('title')
          Admin | Written Exam
          @endsection
        @else
          @section ('title')
          HR Staff | Written Exam
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
									
										<form id="formEvaluation" data-parsley-validate class="form-horizontal form-label-left">
											<span class="section">
                                                <a href="/Recruitment/{{$applicant->id}}">Recruitment</a> > Written Exam <br>
                                                <h4><a href="/PersonalInfo/{{$applicant->id}}"> {{$applicant->first_name}} {{$applicant->middle_name}} {{$applicant->last_name}} {{$applicant->extension_name}}</a> | {{$busname}} </h4>
                                              </span>
												<!-- Item -->
                                                <ol type="1">
                                                @foreach($questions as $question)
                                                @if($question->choice != '[]')
                                                    @foreach($question->choice as $c)
                                                        @if($c->is_correct == 1)
                                                            <div style="padding-bottom: 15px">
                                                        <strong><li>
                                                          @if(substr($question->question, -1) == '?')
                                                          {{$question->question}}
                                                          @else
                                                          {{$question->question}}?
                                                          @endif
                                                        </li></strong><br>
                                                        <!-- Criteria -->
                                                        @foreach($question->choice as $choice)
                                                        <div style="padding-left: 25px">
                                                               <input type="radio" class="flat" name="choice{{$question->id}}" id="choice{{$choice->id}}" value="{{$choice->id}}" /> {{$choice->choice}}
                                                        </div>
                                                        @endforeach
                                                        <!-- /Criteria -->
                                                        <br>
                                                    </div>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                @endforeach
                                                </ol>
												<!-- /Item -->
											<div class="ln_solid"></div>
											<div class="form-group">
												<div class="col-md-6 col-md-offset-4">
													<input type="button" onclick="window.location='/Recruitment/{{$applicant->id}}';" class="btn btn-primary" value="Cancel" />
													<input id="btnSubmit" type="button" class="btn btn-success" value="Submit" onclick="toSubmit();" />
												</div>
											</div>
										</form>
										<form method="post" action="{{route('Written.store')}}" id="formAdd" hidden>
                                            {{csrf_field()}}
                                            <input type="text" id="appID" name="appID" value="{{$applicant->id}}" hidden>
                                            @foreach($questions as $question)
                                                @if($question->choice != '[]')
                                                    @foreach($question->choice as $c)
                                                        @if($c->is_correct == 1)
                                                            <input type="text" id="ans{{$question->id}}" name="ans{{$question->id}}" hidden>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
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
    <script type="text/javascript">
    function toSubmit(){
        @foreach($questions as $question)
            @if($question->choice != '[]')
                @foreach($question->choice as $c)
                    @if($c->is_correct == 1)
                        @foreach($question->choice as $choice)
                            if(document.getElementById('choice{{$choice->id}}').checked){
                                document.getElementById('ans{{$question->id}}').value = '{{$choice->id}}';
                            } else {
                                document.getElementById('ans{{$question->id}}').value = 'not';
                            }
                        @endforeach
                    @endif
                @endforeach
            @endif
        @endforeach
        document.getElementById('formAdd').submit();
    }
    </script>>
    @endsection