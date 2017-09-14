        @extends ('layouts.nav')
        @section ('pageContent')
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                  <form id="formAdd" method="post" action="{{route('Interview.store')}}" hidden>
                    {{csrf_field()}}
                    <input type="text" id="hdrec" name="hdrec" hidden>
                    <input type="text" id="hdcont" name="hdcont" hidden>
                    <input type="text" id="actID" name="actID" value="{{$activity->id}}" hidden>
                    <input type="text" id="recID" name="recID" value="{{$recruitmentID}}" hidden>
                    <input type="text" id="appID" name="appID" value="{{$applicant->id}}" hidden>
                  </form>
                    <form id="formAddActivity" data-parsley-validate class="form-horizontal form-label-left">
											<span class="section"> 
                        Interview - {{$activity->name}}<br>
                        <h4> {{$applicant->first_name}} {{$applicant->middle_name}} {{$applicant->last_name}} {{$applicant->extension_name}} | {{$busname}} </h4>
                      </span>

											<div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                          Content of Interview <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="content" class="form-control" name="interviewContent" rows="3" style="resize: vertical" required></textarea>
                        </div>
											</div>			

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtActType">
                        Recommendation <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="txtRecommendation" id="txtRecommendation" class="form-control" required>
                            <option value="">Choose..</option>
                            <option value="Pass"> Pass</option>
                            <option value="Fail"> Fail</option>
                          </select>
                        </div>
											</div>
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                          <button onclick="window.location='/Recruitment/{{$applicant->id}}';" class="btn btn-primary">Cancel</button>
                          <input id="btnSubmit" type="button" class="btn btn-success" value="Submit" onclick="toSubmit();" >
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
        <script>
          function toSubmit(){
            document.getElementById('hdrec').value = document.getElementById('txtRecommendation').value;
            document.getElementById('hdcont').value = document.getElementById('content').value;
            document.getElementById("formAdd").submit();

          }
        </script>
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
    @endsection
