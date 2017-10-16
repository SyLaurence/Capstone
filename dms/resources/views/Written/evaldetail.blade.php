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
                      <a href="/Recruitment/{{$applicant->id}}"> Recruitment </a>  
                      > Written Exam Details  <br>
                      <h4>  <a href="/PersonalInfo/{{$applicant->id}}">  {{$applicant->first_name}} {{$applicant->middle_name}} {{$applicant->last_name}} {{$applicant->extension_name}} </a> | {{$busname}} </h4>
                    </span>

                    @foreach($applicants->writtenexam as $wxm)
                    <!-- Evaluation -->
                    <div>
                      <label style="color:#475975">Date Taken : {{date('M j, Y',strtotime($wxm->created_at))}}</label><label style="color:#475975" class="pull-right">Score : <span id="s{{$wxm->id}}"></span>/<span id="t{{$wxm->id}}"></span> (<span id="r{{$wxm->id}}"></span>)</label>
                      <br>
                      <label style="color:#475975">In Charge : {{$arrUser[$ctr]}}</label><br><br>
                      <!-- Item -->
                        <ol type="1">
                        @foreach($questions as $question)
                        @if($question->choice != '[]')
                            @foreach($question->choice as $c)
                                @if($c->is_correct == 1)
                                <span id="question{{$wxm->id}}c{{$question->id}}" class=""></span>
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
                                       <input type="radio" class="flat" name="choice{{$question->id}}{{$wxm->id}}c" id="choice{{$wxm->id}}c{{$choice->id}}" value="{{$choice->id}}" disabled/> <span class="c{{$choice->id}}">{{$choice->choice}}</span>
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
                    <!-- Evaluation -->
                    <!-- if evaluation is more than 1 use <hr> tag -->
                    <hr>
                    <input type="text" value="{{$ctr++}}" hidden>
                    @endforeach
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
    <script>
    var total = 0;
        @foreach($questions as $question)
            @if($question->choice != '[]')
                total++;
            @endif
        @endforeach
        $(document).ready(function(){
            @foreach($applicants->writtenexam as $wxm)
                var score = 0;
                @foreach($wxm->writtenexamdetail as $wxd)
                    document.getElementById('choice{{$wxm->id}}c{{$wxd->choice_id}}').checked = true;
                        @foreach($wxd->question->choice as $choice)
                            @if($choice->is_correct == 1)
                                @if($wxd->choice_id == $choice->id)
                                    $("#question{{$wxm->id}}c{{$wxd->question_id}}").addClass('fa fa-check');
                                    score++;
                                @else
                                    $("#question{{$wxm->id}}c{{$wxd->question_id}}").addClass('fa fa-times');
                                @endif
                            @endif
                        @endforeach
                @endforeach
                var pass = total * .60;
                if(score >= pass) {
                    document.getElementById('r{{$wxm->id}}').innerHTML = 'Pass';
                } else {
                    document.getElementById('r{{$wxm->id}}').innerHTML = 'Fail';
                }
                document.getElementById('s{{$wxm->id}}').innerHTML = score+'';
                document.getElementById('t{{$wxm->id}}').innerHTML = total+'';
            @endforeach
        });
        </script>
    @endsection
