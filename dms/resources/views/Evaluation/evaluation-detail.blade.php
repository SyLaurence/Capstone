        @extends ('layouts.nav')
        @section ('pageContent')
        <!-- page content -->
        <div class="right_col" role="main">
					<div class="">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="x_panel">
									<div class="x_content">
										<span class="section">
                      <a href="recruitment-transaction.html"> Recruitment </a>  
                      > ACTIVITY NAME - Evaluation Details  <br>
                      <h4> Driver Name | Brand name </h4>
                    </span>

                    <!-- Evaluation -->
                    <div>
                      <label style="color:#475975">Date Taken : DATE HERE</label><br><br>
                      <!-- Item -->
                      <div style="padding-bottom: 15px">
                        <input type="checkbox" name="" id="" value="" class="flat" disabled checked/> ItemName 
                        <i class="col-sm-offset-1" style="color:#263b5b"> 2 out of 2 </i> 
                        <br>
                        <!-- Criteria -->
                        <div style="padding-left: 25px">
                          <input type="checkbox" name="" id="" value="" class="flat" disabled checked/> CriteriaName <br>
                          <input type="checkbox" name="" id="" value="" class="flat" disabled checked/> CriteriaName <br>
                        </div>
                        <!-- /Criteria -->
                      </div>
                      
                      <!-- /Item -->
                      <div style="padding-bottom: 15px">
                        <input type="checkbox" name="" id= "" value="" class="flat" disabled /> ItemName 
                        <br>
                      </div>
                      
                      <div style="padding-bottom: 15px">
                        <input type="checkbox" name="" id="" value="" class="flat" disabled /> ItemName 
                        <i class="col-sm-offset-1" style="color:#263b5b"> 0 out of 2 </i> 
                        <br>
                        <div style="padding-left: 25px">
                            <input type="checkbox" name="" id="" value="" class="flat" disabled /> CriteriaName <br>
                            <input type="checkbox" name="" id="" value="" class="flat" disabled /> CriteriaName <br>
                        </div>
                      </div>
                    </div>
                    <!-- Evaluation -->

                    <!-- if evaluation is more than 1 use <hr> tag -->
                    <hr>

                    <!-- Evaluation -->
                    <div>
                        <label style="color:#475975">Date Taken : DATE HERE</label><br><br>
                        <!-- Item -->
                        <div style="padding-bottom: 15px">
                          <input type="checkbox" name="" id="" value="" class="flat" disabled checked/> ItemName 
                          <i class="col-sm-offset-1" style="color:#263b5b"> 2 out of 2 </i> 
                          <br>
                          <!-- Criteria -->
                          <div style="padding-left: 25px">
                            <input type="checkbox" name="" id="" value="" class="flat" disabled checked/> CriteriaName <br>
                            <input type="checkbox" name="" id="" value="" class="flat" disabled checked/> CriteriaName <br>
                          </div>
                          <!-- /Criteria -->
                        </div>
                        
                        <!-- /Item -->
                        <div style="padding-bottom: 15px">
                          <input type="checkbox" name="" id= "" value="" class="flat" disabled /> ItemName 
                          <br>
                        </div>
                        
                        <div style="padding-bottom: 15px">
                          <input type="checkbox" name="" id="" value="" class="flat" disabled /> ItemName 
                          <i class="col-sm-offset-1" style="color:#263b5b"> 0 out of 2 </i> 
                          <br>
                          <div style="padding-left: 25px">
                              <input type="checkbox" name="" id="" value="" class="flat" disabled /> CriteriaName <br>
                              <input type="checkbox" name="" id="" value="" class="flat" disabled /> CriteriaName <br>
                          </div>
                        </div>
                      </div>
                      <!-- Evaluation -->

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
