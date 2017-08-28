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
                                                Evaluation - Road Test <br>
                                                <h4> Moises Unisa | Penafrancia </h4>
                                              </span>

												<!-- Item -->
												<div style="padding-bottom: 15px">
													<input type="checkbox" name="" id="" value="" class="flat" /> Check Tires 
													<br>
													<!-- Criteria -->
													<div style="padding-left: 25px">
														<input type="checkbox" name="" id="" value="" class="flat" /> Checks tire pressure <br>
														<input type="checkbox" name="" id="" value="" class="flat" /> Checks tire quality <br>
													</div>
													<!-- /Criteria -->
												</div>
												<!-- /Item -->
	
												<div style="padding-bottom: 15px">
													<input type="checkbox" name="" id= "" value="" class="flat" /> Check Lights 
													<br>
												</div>

												<div style="padding-bottom: 15px">
													<input type="checkbox" name="" id="" value="" class="flat" /> Check Engine Parts 
													<br>
													<div style="padding-left: 25px">
															<input type="checkbox" name="" id="" value="" class="flat" /> Checks if primary engine is working <br>
															<input type="checkbox" name="" id="" value="" class="flat" /> Second engine part <br>
													</div>
												</div>
											
											<div class="ln_solid"></div>
											<div class="form-group">
												<div class="col-md-6 col-md-offset-4">
													<input type="button" onclick="window.location='/Recruitment/1';" class="btn btn-primary" value="Cancel" />
													<button id="btnSubmit" type="submit" class="btn btn-success">Evaluate</button>
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