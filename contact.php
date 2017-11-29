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
        <div class="row">
            <div class="col-lg-6 col-sm-6 address ">
                <div class="contact-form">
                    <form role="form" action="email.php" method="post">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input name="name" type="text" id="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input name="email" type="email" id="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <input name="subject" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea name="msg" rows="5" class="form-control input-lg"></textarea>
                        </div>
                        <center><button class="btn btn-info" type="submit">Submit</button></center>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="src/js/jquery.js"></script>
    <script src="src/js/bootstrap.min.js"></script>
</body>

</html>