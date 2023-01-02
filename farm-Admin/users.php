<!-- <div class="container" style="width:700px;margin-top:-600px;"> -->
  <h2>All User</h2>
  <!-- <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>             -->
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Biodata</th>
        <!--<th>Image</th>-->
        <th>Gender</th>
        <th>Hobbies</th>
        <th>Country</th>
        <th>Action</th>
        <th>Status</th>
    
      </tr>
    </thead>
    <tbody>
      <?php

            foreach($user as $u)
            {
                
            ?>

                <tr>

                    <td><?php echo $u->reg_id;?></td>
                    <td><?php echo $u->reg_name;?></td>
                    <td><?php echo $u->reg_email;?></td>
                    <td><?php echo $u->reg_biodata;?></td>
                    <!-- <td><?php //echo $u->reg_image;?></td> -->
                    <td><?php echo $u->reg_gender;?></td>
                    <td><?php echo $u->reg_hobbies;?></td>
                    <td><?php echo $u->reg_country;?></td>
                    <td><a href="delete_user?did=<?php echo $u->reg_id;?>">Delete</a>
                    <a href="edit_user?eid=<?php echo $u->reg_id;?>">Update</a></td>
                    <td><a href="status?sid=<?php echo $u->reg_id?>&&sta=<?php echo $u->reg_status;?>"><?php echo $u->reg_status;?></a></td>
                </tr>

            <?php
            
            }
            ?>


        
    </tbody>
  </table>
<!-- </div> -->
