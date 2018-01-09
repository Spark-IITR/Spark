<?php 
    
    $sql = "SELECT id,sparkId,name,department,email from faculty";
    $result = $conn->query($sql);
    
    if($result){
        if(!$result->num_rows == 0) {

            ?>
            <table class="table table-striped" style="max-height: 70vh;overflow: scroll;">
                    <thead >
                        <tr>
                            <th>ID</th>
                            <th>Spark ID</th>
                            <th>Name</th>
                            <th>Department</th>
                            
                        </tr>
                    </thead>

                    <tbody id="myTable">

            <?php
            while($row = $result->fetch_assoc()) {
               
                ?>
                         <tr  onclick="fetch_faculty_detail(<?php echo $row['id']; ?>);" style="cursor: pointer;">
                            <td ><?php echo $row['id']; ?></td>
                            <td ><?php echo $row['sparkId']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['department']; ?></td>
                            
                        </tr>
                        
                <?php  } ?> 

                    </tbody>
                </table>
             
                            
                        
    <?php }
    $result->free();
}           
?>


 