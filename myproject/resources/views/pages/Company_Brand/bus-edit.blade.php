        @extends ('layouts.nav')

        @section ('title')
            Bus companies
        @endsection

        @section ('Content')
        <!-- page content -->
        <div class="right_col" role="main">
         <div class="">

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                  <div class="x_content">
                      <form method="post" action="{{action('CompanyBrandController@update', $item->first()->intCBID)}}" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                           {{csrf_field()}}
                            <input name="_method" type="hidden" value="PATCH">
                          <span class="section">Edit bus company</span>
                      
                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                                Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="txtBusName" name="txtBusName" required="required" class="form-control col-md-7 col-xs-12" value="{{$item->first()->strCBName}}">
                            </div>
                          </div>
                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">
                                Description <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="txtBusDesc" name="txtBusDesc" required="required" class="form-control col-md-7 col-xs-12" value="{{$item->first()->txtCBDescription}}">
                            </div>
                          </div>
                          
                          <div class="ln_solid"></div>
                          <div class="form-group">
                              <div class="col-md-6 col-md-offset-3">
                                  <button onclick="window.location='/Company_Brand';" class="btn btn-primary">Cancel</button>
                                  <button id="btnSubmit" type="submit" class="btn btn-success">Save changes</button>
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