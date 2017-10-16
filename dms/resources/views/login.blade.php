<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> Welcome to BITSI! </title>

    <!-- Bootstrap -->
    <link href="{{asset('vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{asset('vendors/animate.css/animate.min.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('build/css/custom.min.css')}}" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form id="LoginForm" action="{{route('Login.store')}}" method="post">
            {{csrf_field()}}
              <input type="text" id="hdUname" name="hdUname" hidden>
              <input type="text" id="hdPword" name="hdPword" hidden>
            </form>
            <form>
             
                <img src="images/BI_Logo.png" alt="Bicol Isarog Logo" width="100%">
              
              <br><br>

              <div>
                  <h2>
                    Driver Hiring and Performance Evaluation System
                  </h2>
              </div>

              <br>

              <div>
                <input type="text" id="txtUsername" name="txtUsername" class="form-control" placeholder="Username" required="" />
              </div>

              <div>
                <input type="password" id="txtPassword" name="txtPassword" class="form-control" placeholder="Password" required="" />
              </div>

              <div>
                <input type="button" onclick="log()" class="btn btn-default submit" value="Login" />
              </div>

              <div class="clearfix"></div>
            </form>
          </section>
        </div>
      </div>
    </div>
    <script type="text/javascript">
      function log(){
        document.getElementById('hdUname').value = document.getElementById('txtUsername').value;
        document.getElementById('hdPword').value = document.getElementById('txtPassword').value;
        document.getElementById("LoginForm").submit();
      }
    </script>
  </body>
</html>
