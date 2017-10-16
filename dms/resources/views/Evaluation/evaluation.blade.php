        @extends ('layouts.nav')
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
                                                Evaluation - {{$activity->name}} <br>
                                                <h4><a href="/PersonalInfo/{{$applicant->id}}"> {{$applicant->first_name}} {{$applicant->middle_name}} {{$applicant->last_name}} {{$applicant->extension_name}}</a> | {{$busname}} </h4>
                                              </span>

												<!-- Item -->
												@foreach($activity->itemsetup as $factor)
												<div style="padding-bottom: 15px">
													<input type="text" value="{{$countF++}}" hidden>
                                                    @if($factor->criteriasetup->first() != null)
                                                    <input type="checkbox" name="fac{{$factor->id}}" id="fac{{$factor->id}}" class="flat" disabled/> {{$factor->name}} 
                                                    @else
                                                    <input type="checkbox" name="fac{{$factor->id}}" id="fac{{$factor->id}}" class="flat" /> {{$factor->name}} 
                                                    @endif
													<br>
													<!-- Criteria -->
													@foreach($factor->criteriasetup as $criteria)
													<div style="padding-left: 25px">
														<input type="text" value="{{$countC++}}" hidden>
														<input type="checkbox" name="cri{{$criteria->id}}" id="cri{{$criteria->id}}" class="flat" /> {{$criteria->name}} <br>
													</div>
													@endforeach
													<!-- /Criteria -->
												</div>
												@endforeach
												<!-- /Item -->
											<div class="ln_solid"></div>
											<div class="form-group">
												<div class="col-md-6 col-md-offset-4">
													<input type="button" onclick="window.location='/Recruitment/{{$applicant->id}}';" class="btn btn-primary" value="Cancel" />
													<input id="btnSubmit" type="button" class="btn btn-success" value="Evaluate" onclick="toSubmit();" />
												</div>
											</div>
										</form>
										<form id="formAdd" method="post" action="{{route('Evaluation.store')}}">
										{{csrf_field()}}
											@foreach($activity->itemsetup as $factor)
												@if($factor->criteriasetup->first() != null)
													<input type="text" id="fact{{$factor->id}}" name="fact{{$factor->id}}" value="hasCrit" hidden>
													@foreach($factor->criteriasetup as $criteria)
														<input type="text" id="crit{{$criteria->id}}" name="crit{{$criteria->id}}" value="" hidden>
													@endforeach
												@else
													<input type="text" id="fact{{$factor->id}}" name="fact{{$factor->id}}" value="notChecked" hidden>
												@endif
											@endforeach
											<input type="text" name="actID" value="{{$activity->id}}" hidden>
											<input type="text" name="appID" value="{{$applicant->id}}" hidden>
                                            <input type="text" name="recID" value="{{$recruitmentID}}" hidden>
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
    <script>
                    $(document).ready(function(){
                        @foreach($activity->itemsetup as $factor)
                            @if($factor->criteriasetup->first() !=null)
                                $('#fac{{$factor->id}}').click(function() {
                                    alert('123');
                                }); 
                            @endif
                        @endforeach
                    });
                    function toSubmit(){
                        @foreach($activity->itemsetup as $factor)
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
                        document.getElementById("formAdd").submit();
                    }
                </script>
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
    @endsection