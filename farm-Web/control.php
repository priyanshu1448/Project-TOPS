<?php
ob_start();

include_once 'Model.php';

class Mycontrol extends Model
{
    public function __construct()
    {
        parent::__construct();
        session_start();
        $url = $_SERVER['PATH_INFO'];
        $data = $this->SelectAll("country_tb");
        //echo $url;
        
        switch($url)
        {
            case '/index';
                include_once 'header.php';
                
                // insert data
                if(isset($_POST['submit']))
                {
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $biodata = $_POST['biodata'];
                    //$image = $_POST['image'];
                    $gender = $_POST['gender'];
                    $hobbie = $_POST['hobbie'];
                    $l = implode(",",$hobbie); //convert array to string
                    $country = $_POST['country'];

                    $data = array('reg_name'=>$name,'reg_email'=>$email,'reg_password'=>$password,'reg_biodata'=>$biodata,'reg_gender'=>$gender,'reg_hobbies'=>$l,'reg_country'=>$country); //pachi model ma javu
                   
                    // API mate aa line aave

                    //echo json_encode($data);exit;
                    
                    //print_r($data);exit;
                    $this->InsertData("register_tb",$data);
                }
                include_once 'form.php';
                include_once 'footer.php';
                break;

            case '/login':
                include_once 'header.php';
                if(isset($_POST['login']))
                {   
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $where = array('reg_email'=>$email,'reg_password'=>$password);
                    $fdata = $this->Select_Where('register_tb',$where);
                    $alldata = $fdata->fetch_object();
                    if($alldata->reg_status == 'block')
                    {
                        echo "<script>alert('You are blocked! Please Contact to admin!');</script>";
                    }
                    else
                    {


                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $where = array('reg_email'=>$email,'reg_password'=>$password);
                    $fdata = $this->Select_Where('register_tb',$where);
                    $g = $fdata->num_rows;
                    if($g>0)
                    {   
                        $e = $fdata->fetch_Object();
                        $em = $e->reg_email;
                        //echo $em;exit;
                        $_SESSION['user'] = $e->reg_id;
                        $_SESSION['name'] = $e->reg_name;

                        if(isset($_POST['remember']))
                        {
                            setcookie('email',$email,time()+3600);
                            setcookie('password',$password,time()+3600);
                        }
                        header('location:profile');                   
                    }
                    else{
                        echo "<script>alert('Invalid Data');</script>";
                    }
                }
                }
                include_once 'login.php';
                include_once 'footer.php';
                break;

                case '/profile':
                    include_once 'header.php';
                    if(isset($_GET['reg_email']))
                    {
                        $ema = $_GET['reg_email'];
                        $where = array('reg_email'=>$ema);
                        $odata = $this->Select_Where('register_tb',$where);
                        $alldata = $odata->fetch_object();
                    }
                    include_once 'profile.php';
                    include_once 'footer.php';
                    break;
                    
                // case '/forgot':
                //     include_once 'header.php';
                //     if(isset($_GET['reg_email']))
                //     {
                //         $email = $_GET['reg_email']; 
                //         $where = array('reg_email'=>$email);
                //         $odata = $this->Select_Unique('register_tb',$where);
                //         $alldata = $odata->fetch_object();
                //     }
                //     include_once 'forgot_password.php';
                //     include_once 'footer.php';
                //     break;

                case '/product':
                    if(isset($_SESSION['name']) && ($_SESSION['user']))
                    {
                    include_once 'header.php';
                    // if(isset($_SESSION['user']))
                    // {
                    $allpro = $this->SelectAll('product_tb');
                    if(isset($_POST['addtocart']))
                    {
                        $uid = $_SESSION['user'];
                        $pid = $_POST['pid'];
                        $qty = $_POST['qty'];
                        $data = array('pro_id'=>$pid,'reg_id'=>$uid,'cart_qty'=>$qty);
                        // print_r($data);
                        $pro_data =$this->InsertData('cart_tb',$data);
                        echo "<script>alert('Data Added in cart Successfully!');</script>";


                    }
                    include_once 'product.php';
                    // }
                    //include_once 'footer.php';
                    
                    // else{
                    //     header('location:login');
                    // }
                    include_once 'footer.php';
                    }
                    else{
                        header('location:login');
                    }
                    break;

                    case '/logout':
                        session_destroy();
                        header('location:login');
                        break;

                    case '/showcart':
                        include_once 'header.php';
                        $cart = $this->Join_Two('cart_tb','product_tb','cart_tb.pro_id=product_tb.pro_id');
                        include_once 'showcart.php';
                        include_once 'footer.php';
                        break;

                    case '/paytm-payment':
                            include_once 'header.php';
                            $paytm = $this->Join_Two('cart_tb','product_tb','cart_tb.pro_id=product_tb.pro_id');
                            include_once 'paytm-payment.php';
                            include_once 'footer.php';
                            break;


            }    
    }
}
$obj = new Mycontrol;
ob_flush();