<?php
ob_start(); // when error comes with cannot modify then this line added at start ob_start(); and last ob_flush();

include_once 'Model.php';

class Mycontrol extends Model
{
    public function __construct()
    {
        parent::__construct();
        $url = $_SERVER['PATH_INFO'];
        $data = $this->SelectAll("country_tb");
        //echo $url;
        
        switch($url)
        {
            case '/index':
            $data = $this->SelectAll("admin_tb");
            if(isset($_POST['login']))
                {
                    $email = $_POST['email'];
                    $password = $_POST['password'];

                    $where = array('a_email'=>$email,'a_password'=>$password);
                    //print_r($where);
                    $fdata = $this->Select_Where('admin_tb',$where);
                    $g = $fdata->num_rows;
                    
                    if($g>0)
                    {
                        echo "<script>alert('Login Success');</script>";
                        header('location:AllUsers');
                    }
                    else{
                        echo "<script>alert('Invalid Data');</script>";
                    }
                }
 
                include_once 'login.php';
                break;

                case '/AllUsers':
                    include_once 'header.php';
                    $user = $this->SelectAll('register_tb');
                    include_once 'users.php';
                    include_once 'footer.php';
                    break;  

                case '/delete_user':
                    include_once 'header.php';
                    if(isset($_GET['did']))
                    {
                        $did = $_GET['did'];
                        $where = array('reg_id'=>$did);
                        $this->Delete_Data('register_tb',$where);
                        header('location:AllUsers');
                    }
                    include_once 'footer.php';
                    break;
                case '/edit_user':
                    include_once 'header.php';
                    if(isset($_GET['eid']))
                    {
                        $eid = $_GET['eid'];
                        $where = array('reg_id'=>$eid);
                        $user_data = $this->Select_Where('register_tb',$where);
                        $user_fetch = $user_data->fetch_object(); 

                        // Update 
                    
                    if(isset($_POST['update']))
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
                    $this->UpdateData('register_tb',$data,$where);
                    header('location:AllUsers');
                    //print_r($data);exit;

                 }
                }
                    include_once 'edit_user.php';
                    include_once 'footer.php';
                    break;

                case '/Add_category':
                    include_once 'header.php';
                         if(isset($_POST['submit']))
                         {
                            $cat = $_POST['cat_id'];
                            $data = array('cat_name'=>$cat);
                            $this->InsertData('category_tb',$data);
                            echo "<script>alert('Data Inserted');</script>";
                            //$this->SelectAll("admin_tb");
                         }
                    include_once 'category.php';
                    include_once 'footer.php';
                    break;

                case '/Add_product':
                    include_once 'header.php';
                    $all_cat = $this->SelectAll("category_tb");
                    if(isset($_POST['submit']))
                 {
                    $cat = $_POST['cat_id'];
                    $pro_img = $_FILES['file']['name'];
                    $pro_name = $_POST['pro_name'];
                    $pro_price = $_POST['pro_price'];
                    $pro_desc = $_POST['pro_desc'];

                    $data = array('cat_id'=>$cat,'pro_img'=>$pro_img,'pro_name'=>$pro_name,'pro_price'=>$pro_price,'pro_desc'=>$pro_desc);
                    move_uploaded_file($_FILES['file']['tmp_name'],"upload/".$_FILES['file']['name']);
                    $this->InsertData('product_tb',$data);
                    echo "<script>alert('Data Inserted');</script>";
                 }
                    include_once 'product.php';
                    include_once 'footer.php';
                    break;

                case '/status':
                    if(isset($_GET['sid']) && ($_GET['sta']))
                    {
                        $sid  = $_GET['sid'];
                        $sta  = $_GET['sta'];

                        $where = array('reg_id'=>$sid);
                        $data = array('reg_status'=>'block');
                        $data1 = array('reg_status'=>'unblock');

                        if($sta == "unblock")
                        {
                            $this->UpdateData("register_tb",$data,$where);
                            header('location:AllUsers');
                        }
                        else
                        {
                            $this->UpdateData("register_tb",$data1,$where);
                            header('location:AllUsers');
                        }

                    }
                    break;



                    
        }
    }
    
}
$obj = new Mycontrol;
ob_flush();