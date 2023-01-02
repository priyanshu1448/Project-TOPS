<?php
if(isset($_COOKIE['email']))
{
    $email = $_COOKIE['email'];
}
else{
    $email="";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login Page</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
    <form method="post" align="center">
        <h1>  </h1>
        <table border="1" align="center" style="width:100%" class="table">
            
            <tr>
                <td>Email: </td>
                <td><input type="email" name="email" placeholder="Enter your mail" class="form-control" value="<?php echo @$_COOKIE['email'];?>"/></td>
            </tr>
            <tr>
                <td>Password: </td>
                <td><input type="password" name="password" class="form-control" placeholder="Enter your Password" value="<?php echo @$_COOKIE['password'];?>"/></td>
            </tr>
            <tr>
                <td>
            <input type="checkbox" name="remember" value="remember"/>Remember</td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="login" value="Login" class="btn btn-primary"/></td>
            </tr>
            
        </table>
                    <br>
                   <a href="forgot_password.php"> Forgot Password? </a>
                   <br>
                   
                   Don't have a account? <a href="index"> SIGN UP </a>
                   <br>
                   <br>
        
    </form>
</div>
</div>
</div>
</body>
</html>
