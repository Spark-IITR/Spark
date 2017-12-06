<?php
  require_once 'config/config.php';
 
  $username = $password = "";
  $username_err = $password_err = "";
 
  if($_SERVER["REQUEST_METHOD"] == "POST"){
 
      if(empty(trim($_POST["username"]))){
        $username_err = 'Please enter username.';
    } else{
        $username = trim($_POST["username"]);
    }
    
    if(empty(trim($_POST['password']))){
        $password_err = 'Please enter your password.';
    } else{
        $password = trim($_POST['password']);
    }
    
    if(empty($username_err) && empty($password_err)){
        $sql = "SELECT email,password,role FROM user WHERE email = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            $param_username = $username;
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    mysqli_stmt_bind_result($stmt, $username, $hashed_password, $role);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            if($role == "faculty"){
                                session_start();
                                $_SESSION['username'] = $username; 
                                $_SESSION['role']=$role;
                                header("location: faculty-portal/");
                              }else if($role == "student"){
                                session_start();
                                $_SESSION['username'] = $username; 
                                $_SESSION['role']=$role;
                                header("location: student-portal/");
                              }else if($role == "admin"){
                                session_start();
                                $_SESSION['username'] = $username; 
                                $_SESSION['role']=$role;
                                header("location: admin-portal/");
                          }
                            
                        } else{
                            $password_err = 'The password you entered was not valid.';
                        }
                    }else{echo 'error';}
                } else{
                    $username_err = 'No account found with that username.';
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        mysqli_stmt_close($stmt);
    }
    
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title> Spark | IIT Roorkee</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta name="description" content="Spark is a internship programme to provide research exposure to interested undergraduate students in IIT Roorkee.  To attract and nurture talented undergraduate students of other institutes. ">

    <meta name="keywords" content="IIT,iitr,IIT Roorkee,iit roorkee,intern,Intern,Project,Project in IIT,Spark,Chemical department,Computer department,IITR,Civil department,electrical department,electronics and Computer science,biotechnology, labs, research, summer intern,university, institute,technical,technology,mechanial department, metallurgy department,civil, Chemical,roorkee,chemistry, physics,mathematics,biotech,paid intern">

    <meta name="author" content="Spark | IIT Roorkee">

    <link rel="icon" href="../../favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url; ?>src/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url; ?>src/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="<?php echo base_url; ?>src/css/index1.css" rel="stylesheet">
    <link href="<?php echo base_url; ?>src/css/index1Less.css" rel="stylesheet">
    <script src="<?php echo base_url; ?>src/js/jquery.min.js"></script>
    <script src="<?php echo base_url; ?>src/js/bootstrap.min.js"></script>
</head>


<body>

   <nav class="navbar navbar-default">
     <div class="container-fluid">
       <div class="navbar-header">
         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
           <span class="sr-only">Toggle navigation</span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
         </button>
         <a class="navbar-brand" href="https://www.iitr.ac.in"><img src="<?php echo base_url; ?>src/img/iitrLogo.png" alt="IIT Roorkee" class="indexNavbarIitrLogo"></a>
         <a class="navbar-brand sparkNavbarTag" href="index.php">SPARK | IIT Roorkee</a><br/>
         <p class="sparkFullFormTag">Summer Internship Programme at IIT Roorkee</p>
       </div>

       <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
         <ul class="nav navbar-nav navbar-right">
           <li><a href="index.php#aboutUs">About SPARK </a></li>
           <li><a href="index.php#guidelines">Guidelines</a></li>
           <li><a href="Publish/project.html">Projects</a></li>
           <li><a href="index.php#timeline">Timeline</a></li>
           <li><a href="signup.php">Contact</a></li>
           <?php if($_SESSION['role'] == ""){?>
            <li><a href="#" data-toggle="modal" data-target="#login">Log In</a></li>
           <?php }else{ ?>
            <li><a href="logout.php">Logout</a></li>
          <?php } ?>
           
         </ul>
       </div>
     </div>
   </nav>


