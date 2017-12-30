<?php 
    
    $sql = "SELECT id,name,cgpa,department,year,college,email,contact,dob,gender,degree,spriority1,spriority2,spriority3 from user where fundingType='spark'";
    $result = $conn->query($sql);
    
    if($result){
        if(!$result->num_rows == 0) {

            ?>
            <table class="table table-striped" style="max-height: 70vh;overflow: scroll;">
                    <thead >
                        <tr>
                            <th title="Field #1">ID</th>
                            <th title="Field #2">Name</th>
                            <th title="Field #3">Email</th>
                            <th title="Field #4">Department</th>
                            <th title="Field #5">Degree</th>
                            <th title="Field #6">College</th>
                        </tr>
                    </thead>

                    <tbody id="myTable">

            <?php 
            while($row = $result->fetch_assoc()) {
                if($row['spriority1']!=NULL || $row['spriority2']!=NULL || $row['spriority3']!=NULL ){
                ?>
                         <tr  onclick="fetch_student_detail(<?php echo $row['id']; ?>);" style="cursor: pointer;">
                            <td ><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
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

