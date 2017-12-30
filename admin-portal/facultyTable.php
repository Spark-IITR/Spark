<?php 
    
    $sql10 = "SELECT id,sparkId,name,cgpa,department,year,college,email,contact,dob,gender,degree,spriority1,spriority2,spriority3 from user where role='faculty'";
    $result10 = $conn->query($sql10);
    
    if($result10){
        if(!$result10->num_rows == 0) {

            ?>
            <table class="table table-striped" style="max-height: 70vh;overflow: scroll;">
                    <thead >
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Degree</th>
                            <th>College</th>
                        </tr>
                    </thead>

                    <tbody id="myTable">

            <?php
            while($row10 = $result10->fetch_assoc()) {
               
                ?>
                         <tr  onclick="fetch_faculty_detail(<?php echo $row10['id']; ?>);" style="cursor: pointer;">
                            <td ><?php echo $row10['sparkId']; ?></td>
                            <td><?php echo $row10['name']; ?></td>
                            <td><?php echo $row10['department']; ?></td>
                            <td><?php echo $row10['degree']; ?></td>
                            <td><?php echo $row10['college']; ?></td>
                        </tr>
                        
                <?php  } ?> 

                    </tbody>
                </table>
             
                            
                        
    <?php }
}           
?>


 