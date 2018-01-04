<?php 
    
    $sql = "SELECT id,name,cgpa,department,college,email,degree from user where fundingType='spark'";
    $result = $conn->query($sql);
    
    if($result){
        if(!$result->num_rows == 0) {

            ?>
            <table class="table table-striped" style="max-height: 70vh;overflow: scroll;">
                    <thead >
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>C.G.P.A</th>
                            <th>Department</th>
                            <th>College</th>
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
                            <td><?php echo $row['cgpa']; ?></td>
                            <td><?php echo $row['department']; ?></td>
                            <td><?php echo $row['college']; ?></td>
                           
                        </tr>
                        
                <?php } } ?> 

                    </tbody>
                </table>
             
                            
                        
    <?php }
       $result->free();

}           
            ?>

