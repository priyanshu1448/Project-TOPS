<!-- Products Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="mx-auto text-center mb-5" style="max-width: 500px;">
                <h6 class="text-primary text-uppercase">Products</h6>
                <h1 class="display-5">Our Fresh & Organic Products</h1>
            </div>
            <div class="owl-carousel product-carousel px-5">
                <?php
                    foreach($allpro as $pro)
                    {
                        ?>
                    
                <div class="pb-5">
                    <div class="product-item position-relative bg-white d-flex flex-column text-center">
                        <img class="img-fluid mb-4" src="../farm-Admin/upload/<?php echo $pro->pro_img;?>" alt="">
                        <h6 class="mb-3"><?php echo $pro->pro_name;?></h6>
                        <h5 class="text-primary mb-0"><?php echo $pro->pro_price;?></h5>
                        <p><?php echo $pro->pro_desc;?></p>
                        <form method="post">
                        <p><input type="text" name="qty"></p>
                        <input type="hidden" name="pid" value="<?php echo $pro->pro_id;?>">
                        <div class="btn-action d-flex justify-content-center">
                            <button class="btn bg-primary py-2 px-3" href="" type="submit" name="addtocart"><i class="bi bi-cart text-white"></i></button>
                            <a class="btn bg-secondary py-2 px-3" href=""><i class="bi bi-eye text-white"></i></a>
                        </div>
                    </form>
                    </div>
                </div>
                <?php
                    }
                ?>
                
                
            </div>
        </div>
    </div>
    <!-- Products End -->
