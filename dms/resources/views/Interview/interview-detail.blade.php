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
                      > {{$activity->name}} - Interview Details  <br>
                      <h4> {{$applicant->first_name}} {{$applicant->middle_name}} {{$applicant->last_name}} {{$applicant->extension_name}} | {{$busname}} </h4>
                    </span>
                    @foreach($currActivity as $curr)
                    <!-- interview -->
                    <div>
                      <label style="color:#475975">Date Taken : {{date('M j, Y',strtotime($curr->end_date))}}</label><br>
                      <label style="color:#475975">Interviewed By: {{$arrUser[$count]}}</label><br>
                      <input type="text" value="{{$count++}}" hidden>
                      <h4><label>Content of Interview</label></h4> 
                      <p>
                        {{$curr->comment}}
                      </p>
  
                      <br>
                      <h4><label>Recommendation</label></h4> 
                      <p>
                        {{$curr->recommendation}}
                      </p>
                    </div>
                    <!-- /interview -->

                    <!-- if evaluation is more than 1 use <hr> tag -->
                    <hr>
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
    <!-- Parsley -->
    <script src="{{asset('vendors/parsleyjs/dist/parsley.min.js')}}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{asset('build/js/custom.min.js')}}"></script>
    @endsection
