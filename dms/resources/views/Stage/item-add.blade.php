        @extends ('layouts.nav')
        @if(session()->get('level') == 0)
          @section ('title')
          Admin | Add Factor
          @endsection
        @else
          @section ('title')
          HR Staff | Add Factor
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
                  
                    <form id="formAddActivity"  action="{{route('Item.store')}}" method="post" data-parsley-validate class="form-horizontal form-label-left">
                    {{csrf_field()}}
											<span class="section"> New Factor</span>					
                      <input type="text" id="hdID" name="hdID" value="{{$activity->id}}" hidden>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                          Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="txtItemName" name="txtItemName" required="required" class="form-control col-md-7 col-xs-12" >
                        </div>
											</div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txtActType">
                        Type <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="txtSeverity" id="txtSeverity" class="form-control" required>
                            <option value="">Choose..</option>
                            <option value="High"> High</option>
                            <option value="Medium"> Medium</option>
                            <option value="Low"> Low</option>
                          </select>
                        </div>
											</div>
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                          <button onclick="window.location='/Stage/Activity/{{$activity->id}}';" class="btn btn-primary">Cancel</button>
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
