        @extends ('layouts.nav')

        @section ('title')
            <title>Bus companies</title>
        @endsection

        @section ('Content')
        <!-- page content -->
        <div class="right_col" role="main">
        <div class="">

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                  <div class="x_content">
                      
                      <form action="{{route('Company_Brand.store')}}" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                          
                        {{csrf_field()}}

                          <span class="section">New bus company</span>
                      
                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                                Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="txtBusName" name="txtBusName" required="required" class="form-control col-md-7 col-xs-12" >
                            </div>
                          </div>
                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">
                                Description <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="txtBusDesc" name="txtBusDesc" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          
                          <div class="ln_solid"></div>
                          <div class="form-group">
                              <div class="col-md-6 col-md-offset-3">
                                  <button onclick="window.location='/Company_Brand';" class="btn btn-primary">Cancel</button>
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
        <script src="{{asset('vendors/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('vendors/fastclick/lib/fastclick.js')}}"></script>
    <!-- NProgress -->
    <script src="{{asset('vendors/nprogress/nprogress.js')}}"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="{{asset('build/js/custom.min.js')}}"></script>
        @endsection