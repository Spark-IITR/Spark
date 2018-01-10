<?php
  require_once 'config/config.php';
 
  $email = $pass = $role= "";
  $email_err = $pass_err = "";
 
  if($_SERVER["REQUEST_METHOD"] == "POST"){
 
      if(empty(trim($_POST["email"]))){
        $email_err = 'Please enter email.';
    } else{
        $email = trim($_POST["email"]);
    }
    
    if(empty(trim($_POST['pass']))){
        $pass_err = 'Please enter your password.';
    } else{
        $pass = trim($_POST['pass']);
    }
    
    if(empty($email_err) && empty($pass_err)){
        $sql = "SELECT email,password,role FROM student WHERE email = ? union SELECT email,password,role FROM faculty WHERE email = ? union SELECT email,password,role FROM admin WHERE email = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "sss", $param_email, $param_email, $param_email);
            
            $param_email = $email;
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    mysqli_stmt_bind_result($stmt, $email, $hashed_pass, $role);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($pass, $hashed_pass)){
                          
                            if($role == "faculty"){
                                session_start();
                                $_SESSION['username'] = $email; 
                                $_SESSION['role']=$role;
                                $_SESSION['time'] = time();
                                header("location: faculty-portal/");

                              }else if($role == "student"){
                                session_start();
                                $_SESSION['username'] = $email; 
                                $_SESSION['role']=$role;
                                $_SESSION['time'] = time();
                                header("location: student-portal/");

                              }else if($role == "admin"){
                                session_start();
                                $_SESSION['username'] = $email; 
                                $_SESSION['role']=$role;
                                $_SESSION['time'] = time();
                                header("location: admin-portal/");
                          }
                            
                        } else{
                            $pass_err = 'The password you entered was incorrect.
                                            <script>
                                              $("#login").modal("show");
                                            </script>';
                        }
                    }else{echo 'error';}
                } else{
                    $email_err = 'No account found with this email.<script>
                                              $("#login").modal("show");
                                            </script>';
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

    <meta name="keywords" content="IIT,iitr,IIT Roorkee,iit roorkee,intern,Intern,Project,Project in IIT,Spark,Chemical department,Computer department,IITR,Civil department,electrical department,electronics and Computer science,biotechnology, labs, research, summer intern,university, institute,technical,technology,mechanial department, metallurgy department,civil, Chemical,roorkee,chemistry, physics,mathematics,biotech,paid intern,internship, best projects, technology, labs, research paper, best professor, India, Indias best faculty, student, organisations, education, library, mgcl, researchers, publish, admission, Modelling and Simulation,CAD,process control and heat transfer, Process Modelling & Simulation, CAD, Process Control & Heat Transfer, Particle Technology, Modeling the dynamics of particulate and powder systems, Multiphase flows, Fluidization, Modelling and Design, Chemical Process Industry, Environmental Engineering, Industrial Pollution Abatement, Biochemical Engineering, Biological Waste Treatment, Bio Fuels, Bio conversion of Organic Materials, Computational Fluid Dynamics (CFD):, Convective Hydrodynamics of Non-Newtonian Fluids and Bluff Bodies Flows, Microfluidics:, Electrokinetic flow in microchannels, Development of Computational Complex Flow Solvers:, FVM, FEM and LBM, Biofuels and bioenergy, Green catalytic process, Reactor / Kinetic modeling, Design and synthesis of nanostructured materials as shape and size selective catalyst, CO2 utilization, Selective hydrogenation and hydrogenolysis over supported nano-particle catalysts, Selective oxidation and ammoxidation of normal alkanes, Heterogeneous catalysis and spectroscopy, Supported metal/metal oxide catalysis: synthesis, characterization and activity;, Nano-materials:, Nano-material synthesis and applications in catalysis, Hydrogenation reaction, Oxidation reaction:, CO2 methanation, Also interested on reforming reaction of hydrocarbons, Hydrogen Energy:, Generation and storage, In situ Spectroscopy (FTIR):, In situ adsorption and reaction studies (Operando spectroscopy), Fluid Mechanics, CFD, Non-Newtonian Fluids, Bluff Body Flow and Heat Transfer, FVM and FDM Solvers, Two-phase flow, Hydrodynamic Cavitation, Proton exchange membrane fuel cell, Vortex tube, Molecular Simulations, Polymer Physics, Drug Delivery, Charged systems, Heat Transfer, Single and Multiphase flow, Computational Fluid Dynamics, Bio-oil from renewable feedstocks, Fuel cells (Direct methanol fuel cell, microbial fuel cell), Waste management, Protein delivery, Catalaysts for fuel cells, Membranes for fuel cell,Polymer recycling and biodegradation, Tissue Engg, Control Instrumentation andModelling and Simulation, Heat Transfer, Process Integration Simulation, Process Int. & Control, Energy and environmental engineering, wastewater treatment, environmental biotechnology, energy from wastes, separation processes, Biomass Energy, Pyrolysis and gasification, Integrated Energy Systems, Hybrid energy systems with biomass as base, Industrial Wastewater Treatment, Petrochemical, dairy and resin industries, Biochemical Energy Conversion, Fuel alcohol production and usage in IC engine, Biomass Conversions- Biofuels, Gasification/Partial oxidation of biomass, Green Synthesis of Catalysts for Energy and Environment Applications, Extracts from food and agriculture wastes will applied to synthesize different nanocatalysts, Supercritical Fluid Technology, Adsorption/Extractions of Nutraceuticals in SCCO2, Hydrothermal Flame Oxidation of complex molecuels,Fluid Mechanics, Hydrodynamic instability, interfacial flows, microfluidic, Modelling and Simulation of Chemical Processes, Membrane Reactors, Fuel Cells, Wastewater Treatment, Physiological and Biological Treatment of Wastewater, Transfer Processes, Membrane separation process, Blended Polymer Composits, Polymer Surface Modification, :Polymer Composites,, Nano Composites, : Ion Exchanger, Ion Exchangers, Chemical Engineering, Environmental Engineering, Energy & Fuels., Separation, Catalysis, Pollution Abatement, CO2 utilization, Fuels, Nano-materials, Desulfurization.,Multiphase Flow Simulations, Circulating Fluidized Bed Reactor, Electrokinetic Phenonema, Electro-coagulation.">

    <meta name="author" content="Spark | IIT Roorkee">

    <link rel="icon" href="../../favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link href="<?php echo base_url; ?>src/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url; ?>src/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="<?php echo base_url; ?>src/css/index1.css" rel="stylesheet">
    <link href="<?php echo base_url; ?>src/css/index1Tab.css" rel="stylesheet">
    <link href="<?php echo base_url; ?>src/css/index1Mob.css" rel="stylesheet">
    <script src="<?php echo base_url; ?>src/js/bootstrap.min.js"></script>
</head>


<body>

   <nav class="navbar navbar-default">
     <div class="container-fluid">
      <div class="row">
       <div class="navbar-header">
         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
           <span class="sr-only">Toggle navigation</span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
         </button>
         <a class="navbar-brand" href="https://www.iitr.ac.in"><img src="<?php echo base_url; ?>src/img/iitrLogo.png" alt="IIT Roorkee" class="indexNavbarIitrLogo"></a>
         <a class="navbar-brand sparkNavbarTag " href="index.php">SPARK | IIT Roorkee</a><br/>
         <p class="sparkFullFormTag">Summer Internship Programme at IIT Roorkee</p>
       </div>

       <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
         <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo base_url; ?>index.php#aboutUs">About SPARK </a></li>
            <li><a href="<?php echo base_url; ?>index.php#guidelines">Guidelines</a></li>
            <li><a href="<?php echo base_url; ?>project.php">Projects</a></li>
            <li><a href="<?php echo base_url; ?>index.php#timeline">Timeline</a></li>
            <li><a href="<?php echo base_url; ?>index.php#contact">Contact</a></li>
            <li><a href="#login" data-toggle="modal" data-target="#login">Log In</a></li>
         </ul>
       </div>
     </div>
   </div>
   </nav>

