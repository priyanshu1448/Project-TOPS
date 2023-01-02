<script src="https://code.jquery.com/jquery-3.6.1.js" 
integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function()
    {
        $('#btn-order').click(function(){
            alert("You have been redirect to Merchant Page!");
            window.location='paytm-payment';
        })
    })
</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1" align="center">
        <tr>
        <th>Pro_Image</th>
        <th>Pro_Name</th>
        <th>Pro_Price</th>
        <th>Pro_Qty</th>
        <th>Total</th>
</tr>
<?php
$sum=0;
foreach($cart as $c)
{
    ?>
<tr>
    <td><img src="../farm-Admin/upload/<?php echo $c->pro_img;?>" alt="" height="100" width="100"/></td>
    <td><?php echo $c->pro_name;?></td>
    <td><?php echo $c->pro_price;?></td>
    <td><?php echo $c->cart_qty?></td>
    <td><?php echo $c->pro_price*$c->cart_qty;?></td>
</tr>
    <?php
    $sum+=$c->pro_price*$c->cart_qty;
}
?>
<tr>
    <td colspan="5" align="right">Sub Total:<?php echo $sum;?>
    <button id="btn-order" class="btn btn-success">Place Your Order</button>
</td>
</tr>
    </table>
</body>
</html>