<?php 
	
	$sql = "SELECT id,sparkId,name,cgpa,department,year,college,email,contact,dob,gender,degree,spriority1,spriority2,spriority3,spriority4,spriority5 from student where role='student'";
	$result = $conn->query($sql);
	
	if($result){
		if(!$result->num_rows == 0) {

            ?>
            <table class="table table-striped" style="width:100%">
                    <thead >
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>C.G.P.A</th>
                            <th>Department</th>
                            <th>Degree</th>
                            <th>College</th>
                        </tr>
                    </thead>

                    <tbody id="myTable">

            <?php 
        	while($row = $result->fetch_assoc()) {
                if($row['spriority1']!=0 || $row['spriority2']!=0 || $row['spriority3']!=0|| $row['spriority4']!=0 || $row['spriority5']!=0 ){
        		?>
                         <tr  onclick="fetch_student_detail(<?php echo $row['id']; ?>);" style="cursor: pointer;">
                            <td ><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['cgpa']; ?></td>
                            <td><?php echo $row['department']; ?></td>
                            <td><?php echo $row['degree']; ?></td>
                            <td><?php echo $row['college']; ?></td>
                        </tr>
                        
                <?php } } ?> 

                    </tbody>
                </table>
             
                            
                        
	<?php }
    $result->free();
}	        
            ?>

