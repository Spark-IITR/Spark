<?php
ob_start();
session_start();
require_once '../config/config.php';
$name = $email = $contact = $department = $college = ""; 

if(isset($_SESSION['role'])=='student')
{
$sql = "SELECT name,email,contact,department,college FROM user WHERE email = ? and role = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "ss", $param_username,$param_role);
            
            $param_username = $_SESSION['username'];
            $param_role = $_SESSION['role'];
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    mysqli_stmt_bind_result($stmt, $name,$email,$contact,$department,$college);
                    if(mysqli_stmt_fetch($stmt)){

                        require_once '../header.php';
           ?>        
    

    <div class="container-fluid">
    	<div class="row">
    		<div class="col-sm-3  studentProfileContainer">
    			<div class="row">
    				 <div class="col-sm-12" style="text-align: center;">
		    			<img src="<?php echo base_url; ?>src/img/iitrLogo.png" class="studentProfileImg">
    				 </div>
    				 <div class="col-sm-12">
    					<input type="file" name="file" id="file" class="inputfile" />
						<label for="file"><span class="glyphicon glyphicon-folder-open" style="padding-right: 7px"></span><span class="glyphicons glyphicons-folder-open"></span>Choose File</label>
    					<input type="submit" name="" class="btn btn-primary studentProfileImageSubmitButton" value="Change Image" placeholder="" >
    				 </div>
    			</div>
    			<p class="studentProfileDetailsTag  studentProfileUpperMargin">Name</p>
    			<p class="studentProfileDetails"><?php echo $name; ?></p>

    			<p class="studentProfileDetailsTag">Department</p>
    			<p class="studentProfileDetails"><?php echo $department; ?></p>

    			<p class="studentProfileDetailsTag">College</p>
    			<p class="studentProfileDetails"><?php echo $college; ?></p>

    			<p class="studentProfileDetailsTag">Email</p>
    			<p class="studentProfileDetails"><?php echo $email; ?></p>

    			<p class="studentProfileDetailsTag">Contact No.</p>
    			<p class="studentProfileDetails"><?php echo $contact; ?></p>

    			<input type="button" name="" class="btn btn-primary studentProfileLogoutButton" value="Logout">
    		</div>
    		<div class="col-sm-9">
    			<div class="row">
    				<div class="col-sm-12">
    					<p class="studentProjectTag">Projects</p>
    					<div>
						  	<ul class="nav nav-tabs" role="tablist">
							    <li role="presentation" class="active"><a href="#applied" aria-controls="home" role="tab" data-toggle="tab">Applied Projects</a></li>
							    <li role="presentation"><a href="#available" aria-controls="profile" role="tab" data-toggle="tab">Available Projects</a></li>
						  	</ul>
						  	<div class="tab-content" style="max-height: 50vh;overflow: scroll;">
								<div role="tabpanel" class="tab-pane fade in active" id="applied">
									<table class="table table-striped">
										<thead style="font-size: 14px;"><tr><th title="Field #1">#</th>
				                            <th title="Field #2">Name</th>
				                            <th title="Field #3">Department</th>
				                            <th title="Field #4">E-mail</th>
				                            <th title="Field #5">Tentative projects for summer internship</th>
				                            <th title="Field #6">Status</th>
				                        </tr></thead>
				                        <tbody id="myTable"><tr>
				                            <td align="right">1</td>
				                            <td>Uttam Kumar Roy</td>
				                            <td>Architecture and Planning</td>
				                            <td>ukroyfap@iitr.ac.in</td>
				                            <td>Affordable Housing Design, Industrialised Building system, New town and Smart City Development, Building codes</td>
				                            <td><span class="glyphicon glyphicon-ok-circle studentProjectStatus" style="color: green"></span></td>
				                        </tr>
				                        <tr>
				                            <td align="right">2</td>
				                            <td>Ram Sateesh Pasupuleti</td>
				                            <td>Architecture and Planning</td>
				                            <td>ramsateeshfap@iitr.ac.in</td>
				                            <td>Build Back Better- A book editing exercise, under GADRI initiative , Kyoto, Japan</td>
				                            <td><span class="glyphicon glyphicon-remove-circle studentProjectStatus" style="color: red"></span></td>
				                        </tr>
				                        <tr>
				                            <td align="right">3</td>
				                            <td>Sonal Atreya</td>
				                            <td>Architecture and Planning</td>
				                            <td>sonalfap@iitr.ac.in</td>
				                            <td>anthropometrics and ergonomics</td>
				                            <td><span class="glyphicon glyphicon-remove-circle studentProjectStatus" style="color: red"></td>
				                        </tr>
									</table>
								</div>


								<div role="tabpanel" class="tab-pane fade" id="available">
									<div class="">
									<table class="table table-striped">
										<thead style=""><tr><th title="Field #1">#</th>
				                            <th title="Field #2">Name</th>
				                            <th title="Field #3">Department</th>
				                            <th title="Field #4">E-mail</th>
				                            <th title="Field #5">Research interests/Tentative projects for summer internship</th>
				                        </tr></thead>
				                        <tbody id="myTable"><tr>
				                            <td align="right">1</td>
				                            <td>Uttam Kumar Roy</td>
				                            <td>Architecture and Planning</td>
				                            <td>ukroyfap@iitr.ac.in</td>
				                            <td>Affordable Housing Design, Industrialised Building system, New town and Smart City Development, Building codes</td>
				                        </tr>
				                        <tr>
				                            <td align="right">2</td>
				                            <td>Ram Sateesh Pasupuleti</td>
				                            <td>Architecture and Planning</td>
				                            <td>ramsateeshfap@iitr.ac.in</td>
				                            <td>Build Back Better- A book editing exercise, under GADRI initiative , Kyoto, Japan</td>
				                        </tr>
				                        <tr>
				                            <td align="right">3</td>
				                            <td>Sonal Atreya</td>
				                            <td>Architecture and Planning</td>
				                            <td>sonalfap@iitr.ac.in</td>
				                            <td>anthropometrics and ergonomics</td>
				                        </tr>
				                        <tr>
				                            <td align="right">5</td>
				                            <td>Naveen Kumar Navani</td>
				                            <td>Biotechnology</td>
				                            <td>navnifbs@iitr.ac.in</td>
				                            <td>a) Understanding properties of Probiotic bacteria at molecular level. b) Development of DNA based biosensors against xenobioitcs and pathogenic bacteria</td>
				                        </tr>
				                        <tr>
				                            <td align="right">6</td>
				                            <td>Sulakshana P. Mukherjee</td>
				                            <td>Biotechnology</td>
				                            <td>mukherji.fbt@iitr.ac.in</td>
				                            <td>NMR and Biophysics/Transcription factor-DNA interaction</td>
				                        </tr>
				                        <tr>
				                            <td align="right">7</td>
				                            <td>Saugata Hazra</td>
				                            <td>Biotechnology</td>
				                            <td>saugata.iitk@gmail.com</td>
				                            <td>Protein Biochemistry, Structure-based Drug Designing, Biodegradable Polymer, Antibacterial Resistance</td>
				                        </tr>
				                        <tr>
				                            <td align="right">8</td>
				                            <td>Ranjana Pathania</td>
				                            <td>Biotechnology</td>
				                            <td>Rpathfbs@iitr.ac.in</td>
				                            <td>Molecular Microbiology and Genetic engineering, Antibiotic resistance mechanism</td>
				                        </tr>
				                        <tr>
				                            <td align="right">9</td>
				                            <td>Dr Deepak Sharma</td>
				                            <td>Biotechnology</td>
				                            <td>deepak.fbt@iitr.ac.in</td>
				                            <td>Bioinformatics</td>
				                        </tr>
				                        <tr>
				                            <td align="right">10</td>
				                            <td>Partha Roy</td>
				                            <td>Biotechnology</td>
				                            <td>paroyfbs@iitr.ac.in</td>
				                            <td>Development of anti-cancer drugs from natural sources</td>
				                        </tr>
				                        <tr>
				                            <td align="right">11</td>
				                            <td>Dr. Krishna Mohan Poluri</td>
				                            <td>Biotechnology</td>
				                            <td>krishfbt@iitr.ac.in</td>
				                            <td>Glycoimmunology</td>
				                        </tr>
				                        <tr>
				                            <td align="right">12</td>
				                            <td>Prateek Kumar Jha</td>
				                            <td>Chemical Engineering</td>
				                            <td>pkjchfch@iitr.ac.in</td>
				                            <td>Polymer physics, Molecular simulations, Drug delivery</td>
				                        </tr>
				                        <tr>
				                            <td align="right">13</td>
				                            <td>Vimal Chandra Srivastava</td>
				                            <td>Chemical Engineering</td>
				                            <td>vimalfch@iitr.ac.in</td>
				                            <td>Nanocomposite synthesis for wastewater treatment; scale-up of electrochemical systems</td>
				                        </tr>
				                        <tr>
				                            <td align="right">14</td>
				                            <td>Vimal Kumar</td>
				                            <td>Chemical Engineering</td>
				                            <td>vksinfch@iitr.ac.in</td>
				                            <td>Computational Fluid Dynamics &amp; Heat Transfer (Fluid flow through anisotropic porous media)</td>
				                        </tr>
				                        <tr>
				                            <td align="right">15</td>
				                            <td>Anshu Anand</td>
				                            <td>Chemical Engineering</td>
				                            <td>anshufch@iitr.ac.in</td>
				                            <td>Computational modeling of complex media and multiphase flow</td>
				                        </tr>
				                        <tr>
				                            <td align="right">16</td>
				                            <td>Dr. Ram Prakash Bharti</td>
				                            <td>Chemical Engineernig</td>
				                            <td>rpbharti@iitr.ac.in</td>
				                            <td>Computational fluid dynamics (CFD) and heat transfer</td>
				                        </tr>
				                        <tr>
				                            <td align="right">17</td>
				                            <td>Taraknath Das</td>
				                            <td>Chemical Enginnering </td>
				                            <td>tarak3581.fch@iitr.ac.in</td>
				                            <td>Catalysis</td>
				                        </tr>
				                        <tr>
				                            <td align="right">18</td>
				                            <td>Taraknath Das</td>
				                            <td>Chemical Enginnering </td>
				                            <td>tarak3581.fch@iitr.ac.in</td>
				                            <td>Catalysis</td>
				                        </tr>
				                        <tr>
				                            <td align="right">19</td>
				                            <td>Dr. Kalyan K. Sadhu</td>
				                            <td>Chemistry</td>
				                            <td>sadhufcy@iitr.ac.in</td>
				                            <td>Research interest: Chemical Biology; Tentative project: Metal-DNA interaction, Small molecule fluorescence sensors</td>
				                        </tr>
				                        <tr>
				                            <td align="right">20</td>
				                            <td>K. R. Justin Thomas</td>
				                            <td>Chemistry</td>
				                            <td>krjt8fcy@iitr.ac.in</td>
				                            <td>Synthesis and characterization of triplet harvesting luminophores for bright and stable OLEDs</td>
				                        </tr>
				                        <tr>
				                            <td align="right">21</td>
				                            <td>Dr. Debasis Banerjee</td>
				                            <td>Chemistry</td>
				                            <td>dbane.fcy@iitr.ac.in</td>
				                            <td>Organic Synthesis, Catalytic C-H Activation and Functionalization of Small Molecules, Heterogeneous Catalysis for Organic Transformations</td>
				                        </tr>
				                        <tr>
				                            <td align="right">22</td>
				                            <td>RAJ KUMAR DUTTA</td>
				                            <td>CHEMISTRY</td>
				                            <td>duttafcy@iitr.ac.in</td>
				                            <td>Synthesis of Templated Quantum Dots for energy applications </td>
				                        </tr>
				                        <tr>
				                            <td align="right">23</td>
				                            <td>Rajib Chowdhury</td>
				                            <td>Civil Engineering</td>
				                            <td>rajibfce@iitr.ac.in</td>
				                            <td>Project: Service-Life Estimation Of Nano-Concrete.<br/><br/>Aim: Development of a mechanistic prediction model for service life estimation of Nano-Concrete.<br/><br/>In this project, primarily carbonation and corrosion related durability issues will be discussed.<br/><br/>Tools to be used: COMSOL (for physio-chemical reactions), Life-365 (for Validation) and Matlab<br/><br/>Requirement: Candidate should be conversant with COMSOL Multi-physics code.  Understanding of concrete technology and durability aspects are must.</td>
				                        </tr>
				                        <tr>
				                            <td align="right">24</td>
				                            <td>Dr. Indrajit Ghosh</td>
				                            <td>Civil Engineering</td>
				                            <td>indrafce@iitr.ac.in</td>
				                            <td>Intersection Safety Assessment using Traffic Conflict Technique under Mixed Traffic Conditions</td>
				                        </tr>
				                        <tr>
				                            <td align="right">25</td>
				                            <td>Gargi Singh</td>
				                            <td>Civil Engineering</td>
				                            <td>gargifce@iitr.ac.in</td>
				                            <td>Interactive study on a novel sensor for detecting antimicrobial resistance and relevant emerging contaminants</td>
				                        </tr>
				                        <tr>
				                            <td align="right">26</td>
				                            <td>Sonalisa Ray</td>
				                            <td>Civil Engineering</td>
				                            <td>sonarfce@iitr.ac.in</td>
				                            <td>Estimation of Fatigue Fracture Energy in Concrete<br/>Digital Image Correlation Technique in Concrete<br/>Computational Modelling of Concrete</td>
				                        </tr>
				                        <tr>
				                            <td align="right">27</td>
				                            <td>Dr. Sarit Kumar Das</td>
				                            <td>Civil Engineering Department</td>
				                            <td>saritkdas.fce@iitr.ac.in</td>
				                            <td>Monitoring and Modelling of Hydroclimatic Variables, Probabilistic Simulation of Atmospheric Turbulence, Air Entrainment in Compost Bins</td>
				                        </tr>
				                        <tr>
				                            <td align="right">28</td>
				                            <td>Sandeep Kumar</td>
				                            <td>Computer Sc and Engg</td>
				                            <td>sgargfec@iitr.ac.in</td>
				                            <td>Machine learning and Data Analytics in Software Engineering or Web Services</td>
				                        </tr>
				                        <tr>
				                            <td align="right">29</td>
				                            <td>Partha Pratim Roy</td>
				                            <td>Computer Science and Engineering</td>
				                            <td>proy.fcs@iitr.ac.in</td>
				                            <td>Human Computer Interaction using Deep Learning</td>
				                        </tr>
									</div>
									</table>
								</div>
					      	</div>
						</div>
    				</div>
    			</div>
    			<div class="row" style="margin-left: 0%">
    				<div class="col-sm-5">
    					<input type="file" name="file" id="file" class="inputfile" />
						<label for="file"><span class="glyphicon glyphicon-folder-open" style="padding-right: 7px"></span><span class="glyphicons glyphicons-folder-open"></span>Choose File</label>
    					<input type="submit" name="" class="btn btn-primary studentProfileImageSubmitButton" value="Upload Resume" placeholder="" >
    				</div>
    				<div class="col-sm-5 col-sm-offset-1">
    					<input type="file" name="file" id="file" class="inputfile" />
						<label for="file"><span class="glyphicon glyphicon-folder-open" style="padding-right: 7px"></span><span class="glyphicons glyphicons-folder-open"></span>Choose File</label>
    					<input type="submit" name="" class="btn btn-primary studentProfileImageSubmitButton" value="Upload LOR/NOC" placeholder="" >
    				</div>
    			</div>
    		</div>
    	</div>
    </div>


<?php
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

    
else
      header ("location:logout.php");
    ?>