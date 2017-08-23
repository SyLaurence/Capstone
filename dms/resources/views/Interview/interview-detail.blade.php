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
                      <a href="/Recruitment/1"> Recruitment </a>  
                      > HR Manager Interview - Interview Details  <br>
                      <h4> Moises Unisa | Penafrancia </h4>
                    </span>

                    <!-- interview -->
                    <div>
                      <label style="color:#475975">Date Taken : Aug. 25, 2017</label><br>
                      <h4><label>Content of Interview</label></h4> 
                      <p>
                        Laravel is a free, open-source PHP web framework, created by Taylor Otwell and intended for the development of web applications following the model–view–controller (MVC) architectural pattern.
                      </p>
  
                      <br>
                      <h4><label>Recommendation</label></h4> 
                      <p>
                        Pass
                      </p>
                    </div>
                    <!-- /interview -->

                    <!-- if evaluation is more than 1 use <hr> tag -->
                    <hr>

                    <!-- interview -->
                    <div>
                      <label style="color:#475975">Date Taken : Aug. 31, 2017</label><br>
                      <h4><label>Content of Interview</label></h4> 
                      <p>
                        It was developed by Microsoft to allow programmers to build dynamic web sites, web applications and web services. It was first released in January 2002 with version 1.0 of the .NET Framework, and is the successor to Microsoft's Active Server Pages (ASP) technology.
                      </p>
  
                      <br>
                      <h4><label>Recommendation</label></h4> 
                      <p>
                        Pass
                      </p>
                    </div>
                    <!-- /interview -->

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
