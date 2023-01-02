<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Structure</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-10">
    <form method="post" align="center">
        <h1> Registration Detail </h1>
        <table border="1" align="center" style="width:100%" class="table">
            <tr>
                <td style="width:250px">Name: </td>
                <td><input type="text" name="name" class="form-control" placeholder="Enter your Name" value="<?php echo $user_fetch->reg_name;?>"/></td>
            </tr>
            <tr>
                <td>Email: </td>
                <td><input type="email" name="email" placeholder="Enter your mail" class="form-control" value="<?php echo $user_fetch->reg_email;?>"/></td>
            </tr>
            <tr>
                <td>Password: </td>
                <td><input type="password" name="password" class="form-control" placeholder="Enter your Password" value="<?php echo $user_fetch->reg_password;?>"/></td>
            </tr>
            <tr>
                <td>Biodata: </td>
                <td><textarea name="biodata" value="" class="form-control" placeholder="Enter your Biodatas"><?php echo $user_fetch->reg_biodata;?></textarea></td>
            </tr>
            <!-- <tr>
                <td>Image: </td>
                <td><input type="file" name="image" value="" class="form-control" class="form-control" placeholder="Enter your Image"/><?php //echo $user_fetch->reg_image;?></td>
            </tr> -->
            <tr>
                <td>Gender: </td>
                <td style="padding-left:10px;"><input type="radio" name="gender" value="Male"
                <?php
                    $g = $user_fetch->reg_gender;
                    if($g == 'Male')
                    {
                        echo "Checked='checked'";
                    }
                ?>
                />Male
                    <input type="radio" name="gender" value="Female"
                    <?php
                    $g = $user_fetch->reg_gender;
                    if($g == 'Female')
                    {
                        echo "Checked='checked'";
                    }
                ?>
                    />Female
                    <input type="radio" name="gender" value="Other"
                    <?php
                    $g = $user_fetch->reg_gender;
                    if($g == 'Other')
                    {
                        echo "Checked='checked'";
                    }
                ?>
                    />Other
                </td>
            </tr>
            <tr>
                <td>Hobbies: </td>
                <td><input type="checkbox" name="hobbie[]" value="Cricket"
                <?php
                    $h = $user_fetch->reg_hobbies;
                    $hh = explode(",",$h);
                ?>
                <?php
                if(in_array("Cricket",$hh))
                {
                    echo "Checked='checked'";
                }
                ?>
                />Cricket
                    <input type="checkbox" name="hobbie[]" value="Swiming"
                <?php
                if(in_array("Swiming",$hh))
                {
                    echo "Checked='checked'";
                }
                ?>    
                />Swiming
                    <input type="checkbox" name="hobbie[]" value="Singing"
                <?php
                if(in_array("Singing",$hh))
                {
                    echo "Checked='checked'";
                }
                ?>
                />Singing
                </td>
            </tr>
            <tr>
                <td>Country:</td>
                <td><select name="country" class="form-control">
                    <?php
                    foreach($data as $c)
                    {
                        if($c->c_id == $user_fetch->reg_country)
                        {
                        ?>
                    <option value="<?php echo $c->c_id;?>" selected><?php echo $c->c_name;?></option>
                    <?php
                    }
                    else{
                    ?> 
                    <option value="<?php echo $c->c_id;?>"><?php echo $c->c_name;?></option>
                    <?php
                    }
                }
                ?>         
                </select>
                </td>
            </tr>
            
                <!-- <td>Favourite Place:</td>
                <td>
                <select name="place"> 
                <option value="">-------Select------</option>    
                <option value="RedFort">Red Fort</option>
                <option value="Mountain">Mountain</option>
                <option value="SnowRide">Snow Ride</option>
                </select>
                </td> -->
            <tr>
                <td colspan="2" align="center"><input type="submit" name="update" value="Update" class="btn btn-primary"/>
                <input type="Reset" name="reset" value="Reset" align="center" class="btn btn-warning"/></td>
            </tr>
        </table>
    </form>
</div>
</div>
</div>
</body>
</html>