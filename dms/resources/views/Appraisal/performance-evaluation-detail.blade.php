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
                     Performance Appraisal
                      > {{$stat}} - Evaluation Details  <br>
                      <h4> {{$applicant->first_name}} {{$applicant->middle_name}} {{$applicant->last_name}} {{$applicant->extension_name}} | {{$busname}} </h4>
                    </span>

                    <div>
                      <label style="color:#475975">Date Taken :{{date('M j, Y',strtotime($appraisal->created_at))}}</label><label style="color:#475975" class="pull-right">Rating : {{$totScore}}% ({{$recom}})</label>
                      <br>
                      <label style="color:#475975">Evaluated by : {{$username}}</label><br><br>
                      @foreach($Factors as $factor)
                        <!-- Item -->
                        <div style="padding-bottom: 15px">
                          <input type="checkbox" name="fac{{$factor->id}}{{$appraisal->id}}" id="fac{{$factor->id}}{{$appraisal->id}}" class="flat" disabled/> {{$factor->name}} 
                          @if($factor->criteriasetup->first() != null)
                          <i class="col-sm-offset-1" style="color:#263b5b"> {{$arrChkCrit[$count]}} out of {{$arrTotalCrit[$count]}} </i> 
                          <input type="text" value="{{$count++}}" hidden>
                          @endif
                          <strong class="col-sm-offset-1" style="color:#263b5b"> 
                          @if($factor->severity == 2)
                            5 pts.
                          @elseif($factor->severity == 1)
                            3 pts.
                          @else
                            1 pt.
                          @endif
                          </strong>
                          <br>
                          @if($factor->criteriasetup->first() != null)
                            @foreach($factor->criteriasetup as $criteria)
                              <!-- Criteria -->
                              <div style="padding-left: 25px">
                                <input type="checkbox" name="cri{{$criteria->id}}{{$appraisal->id}}" id="cri{{$criteria->id}}{{$appraisal->id}}" class="flat" disabled/> {{$criteria->name}} 
                                <span class="col-sm-offset-2" style="color:#263b5b">
                                  @if($criteria->severity == 2)
                                    5 pts.
                                  @elseif($criteria->severity == 1)
                                    3 pts.
                                  @else
                                    1 pt.
                                  @endif
                                </span><br>
                              </div>
                              <!-- /Criteria -->
                            @endforeach
                      
                    <input type="text" value="{{$ctr++}}" hidden>
                    @endif
                    @endforeach
                    <div class="pull-right">
                        <strong style="color:#475975">Total Score: {{$scr}}</strong>
                      </div>
                    <!-- Evaluation -->
                    <!-- if evaluation is more than 1 use <hr> tag -->
                    <hr>
									</div>
                </div>
							</div>
						</div>
					</div>
				</div>
				<!-- /page content -->
        @endsection
        @section ('jscript')
        <script>
            @foreach($appraisal->evaluation as $eval) 
              @if($eval->item->score > 0.00)
                document.getElementById('fac{{$eval->item->item_setup_id}}{{$appraisal->id}}').checked = 'true';
                @foreach($eval->item->criteria as $c)
                  @if($c->score > 0)
                    document.getElementById('cri{{$c->criteria_setup_id}}{{$appraisal->id}}').checked = 'true';
                  @endif
                @endforeach
              @endif
            @endforeach
        </script>
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
