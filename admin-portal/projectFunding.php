<?php 
    
    $sql = "SELECT id,name,cgpa,department,college,email,degree,spriority1,spriority2,spriority3,spriority4,spriority5,complaints from student where fundingType='project'";
    $result = $conn->query($sql);
    
    if($result){
        if(!$result->num_rows == 0) {

            ?>
            <table class="table table-striped" style="max-height: 70vh;overflow: scroll;">
                    <thead >
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Degree</th>
                            <th>C.G.P.A</th>
                            <th>College</th>
                        </tr>
                    </thead>

                    <tbody id="myTable">

            <?php 
            while($row = $result->fetch_assoc()) {
                // if($row['spriority1']!=NULL || $row['spriority2']!=NULL || $row['spriority3']!=NULL || $row['spriority4']!=NULL || $row['spriority5']!=NULL ){
                if($row['complaints']!=null){

                ?>
                         <tr  onclick="fetch_student_detail(<?php echo $row['id']; ?>);" style="cursor: pointer;">
                            <td ><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['department']; ?></td>
                            <td><?php echo $row['degree']; ?></td>
                            <td><?php echo $row['cgpa']; ?></td>
                            <td><?php echo $row['college']; ?></td>
                           
                        </tr>
                        
                <?php } } ?> 

                    </tbody>
                </table>
             
                            
                        
    <?php }
    $result->free();

}           
            ?>

