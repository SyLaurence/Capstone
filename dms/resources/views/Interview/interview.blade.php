        @extends ('layouts.nav')
        @section ('pageContent')
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                  
                    <form id="formAddActivity" data-parsley-validate class="form-horizontal form-label-left">
											<span class="section"> 
                        Interview - HR Manager Interview<br>
                        <h4> Moises Unisa | Penafrancia </h4>
                      </span>

											<div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                          Content of Interview <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea class="form-control" name="interviewContent" rows="3" style="resize: vertical" required></textarea>
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
                          <button onclick="window.location='account.html';" class="btn btn-primary">Cancel</button>
                          <button id="btnSubmit" type="submit" class="btn btn-success">Submit</button>
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

    <!-- Custom Theme Scripts -->
    <script src="{{asset('build/js/custom.min.js')}}"></script>
    @endsection
