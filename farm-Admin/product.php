<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
            <table border="1" align="center">
                <tr>
                    <td> Category : </td>
                    <td><select name="cat_id">
                        <?php
                            foreach($all_cat as $cat)
                            {
                                ?>
                                <option value="<?php echo $cat->cat_id;?>"><?php echo $cat->cat_name;?></option>
                            <?php
                            }
                        ?>
                        </select></td>
                        </tr>
                        <tr>
                            <td> Image : </td>
                            <td><input type="file" name="file"/></td>
                        </tr>
                        <tr>
                            <td> Product_name : </td>
                            <td><input type="text" name="pro_name"/></td>
                        </tr>
                        <tr>
                            <td> Product_price : </td>
                            <td><input type="text" name="pro_price"/></td>
                        </tr>
                        <tr>
                            <td> Pro_desc : </td>
                            <td><textarea name="pro_desc"></textarea></td>
                        </tr>
                    
                        <tr>
                            <td colspan="2" align="center"><input type="submit" name="submit" value="Submit"/></td>
                        </tr>    
            </table>
    </form>
</body>
</html>