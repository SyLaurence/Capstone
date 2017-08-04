<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="/" method="post">
              {{csrf_field()}}
              <img src="images/BI_Logo.png" alt="Bicol Isarog Logo" width="100%">

              <br><br>

              <div>
                  <h2>
                    Driver Hiring and Performance Evaluation System
                  </h2>
              </div>

              <br>

              <div>
                <input type="text" name="txtUsername" class="form-control" placeholder="Username" required="" />
              </div>

              <div>
                <input type="password" name="txtPassword" class="form-control" placeholder="Password" required="" />
              </div>

              <div>
                <button type="submit" class="btn btn-default submit">Login</button>
              </div>

              <div class="clearfix"></div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>