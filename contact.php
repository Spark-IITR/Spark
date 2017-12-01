<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title> Spark </title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="src/css/bootstrap.min.css" rel="stylesheet">
    <link href="src/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="src/css/index.css" rel="stylesheet">
    <link href="src/css/indexLess.css" rel="stylesheet">
</head>

<body>


    <div class="container">
                <form class="form-horizontal" role="form" action="email.php" method="post">

                    <h3 style="text-align:center" ><strong>Mail us any query</strong></h3>

                        <div class="form-group">
                             <label for="name" class="col-sm-3 control-label">Full Name</label>
                                <div class="col-sm-6">
                                    <input type="text" id="name" name="name" placeholder="Name" class="form-control" autofocus required>
                                </div>
                        </div>


                        <div class="form-group">
                             <label for="email" class="col-sm-3 control-label">Email</label>
                                 <div class="col-sm-6">
                                    <input type="email" id="email" name="email" placeholder="Email" class="form-control" required>
                                 </div>
                        </div>


                        <div class="form-group">
                             <label for="subject" class="col-sm-3 control-label">Subject</label>
                                 <div class="col-sm-6">
                                     <input type="text" id="contact"  name="subject" placeholder="Subject" class="form-control" required>
                                 </div>
                             </div>

                        <div class="form-group">
                           	<label for="message" class="col-sm-3 control-label">Message</label>
                                	<div class="col-sm-6">
                                	<textarea  id="project"  name="msg" placeholder="Message" class="form-control input-lg" rows="3" required></textarea>
                            </div>
                        </div>

                         <div class="contact-form">
                             <div class="col-sm-6 col-sm-offset-3">
                                    <button type="submit" class="btn btn-primary btn-block">Submit Query</button>
                             </div>
                          </div>

                          <div class="contact-form">
                             <div class="col-sm-6 col-sm-offset-3">
                                <a href="logout.php">Logout</a>
                             </div>
                          </div>
                </form> <!-- /form -->
            </div> <!-- ./container -->




    <script src="src/js/jquery.js"></script>
    <script src="src/js/bootstrap.min.js"></script>
</body>

</html>