        @extends ('layouts.nav')
        @if(session()->get('level') == 0)
          @section ('title')
          Admin | Performance Evaluation Details
          @endsection
        @else
          @section ('title')
          HR Staff | Performance Evaluation Details
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
										<span class="section">
                     Performance Appraisal
                      > {{$stat}} - Evaluation Details  <br>
                      <h4> <a href="/PersonalInfo/{{$applicant->id}}"> {{$applicant->first_name}} {{$applicant->middle_name}} {{$applicant->last_name}} {{$applicant->extension_name}} </a> | {{$busname}} </h4>
                    </span>

                    <div>
                      <label style="color:#475975">Date Taken :{{date('M j, Y',strtotime($appraisal->created_at))}}</label><label style="color:#475975" class="pull-right">Rating : {{$evalTot}}% (@if($evalTot <= 20)
                        Poor
                        @elseif($evalTot > 20 && $evalTot <= 40)
                        Satisfactory
                        @elseif($evalTot > 40 && $evalTot <= 60)
                        Good
                        @elseif($evalTot > 60 && $evalTot <= 80)
                        Very Good
                        @elseif($evalTot > 80 && $evalTot <= 100)
                        Outstanding
                        @endif)</label>
                      <br>
                      <label style="color:#475975">Evaluated by : {{$username}}</label><br><br>
                      <div class="row">
                        <div class="row">
                            <div style="padding-left: 25px" class="hover-highlight">  
                            <div class="row">
                              <label class="col-md-1">Attendance</label>
                              <span class="col-md-1 pull-right" style="color:#263b5b">
                                  {{$Att}}%</span>
                              <br><br>
                              </div>
                            </div>
                            <div style="padding-left: 25px" class="hover-highlight"> 
                              <div class="row">
                              <label class="col-md-1">Offenses</label>
                              <span class="col-md-1 pull-right" style="color:#263b5b">
                                  {{number_format(abs($Off))}}%</span>
                              <br><br>
                              </div>
                            </div>
                            <div style="padding-left: 25px" class="hover-highlight">  
                              <div class="row">
                              <label class="col-md-1">Feedback</label>
                              <span class="col-md-1 pull-right" style="color:#263b5b">
                                  {{$Feed}}%
                                  </span>
                              <br><br>
                              </div>
                            </div>
                            <div style="padding-left: 25px" class="hover-highlight">  
                              <div class="row">
                              <label class="col-md-2">Actual Evalutaion</label>
                              <span class="col-md-1 pull-right" style="color:#263b5b">
                                  {{$totScore}}%
                                  </span>
                              <br><br>
                              </div>
                            </div>
                      </div>
                      <br><br>
                      @foreach($Factors as $factor)
                        <!-- Item -->
                        <div style="padding-bottom: 15px">
                          <input type="checkbox" name="fac{{$factor->id}}{{$appraisal->id}}" id="fac{{$factor->id}}{{$appraisal->id}}" class="flat" disabled/> {{$factor->name}} 
                          @if($factor->criteriasetup->first() != null)
                          <i class="col-sm-offset-1" style="color:#263b5b"> {{$arrChkCrit[$count]}} out of {{$arrTotalCrit[$count]}} </i> 
                          <input type="text" value="{{$count++}}" hidden>
                          @endif
                          <div class="pull-right col-md-1">
                          <strong class="col-sm-offset-1" style="color:#263b5b"> 
                          @if($arrItemScore[$fact] >= 2)
                          {{$arrItemScore[$fact]}} pts
                          @else
                          {{$arrItemScore[$fact]}} pt
                          @endif
                          <input type="text" value="{{$fact++}}" hidden>
                          </strong>
                          </div>
                          <br>
                          @if($factor->criteriasetup->first() != null)
                            @foreach($factor->criteriasetup as $criteria)
                              <!-- Criteria -->
                              <div style="padding-left: 25px" class="hover-highlight">
                                <input type="checkbox" name="cri{{$criteria->id}}{{$appraisal->id}}" id="cri{{$criteria->id}}{{$appraisal->id}}" class="flat" disabled/> {{$criteria->name}} 
                                <div class="pull-right col-md-2">
                                <span class="col-sm-offset-2 pull-right" style="color:#263b5b">
                                  @if($arrCritScore[$crit] >= 2)
                                  {{$arrCritScore[$crit]}} pts
                                  @else
                                  {{$arrCritScore[$crit]}} pt
                                  @endif
                                  <input type="text" value="{{$crit++}}" hidden>
                                </span><br>
                                </div>
                              </div>
                              <!-- /Criteria -->
                            @endforeach
                      
                    <input type="text" value="{{$ctr++}}" hidden>
                    @endif
                    @endforeach
                    </div>
                    <div class="pull-right col-md-2">
                        <strong style="color:#475975" class="">Total Score: 
                        @if($scr >= 2)
                          {{$scr}} pts
                        @else
                          {{$scr}} pt
                        @endif</strong>
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
