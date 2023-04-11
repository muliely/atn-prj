<!--	Feature Product	-->
    <div class="products">
        <h3>Featured Product</h3>
        <div class="product-list row">
            <?php
                $data = mysqli_query($connect, "select * from product where prd_featured = 1 order by prd_id desc limit 6");
                while($row = mysqli_fetch_array($data)){
                    echo '<div class="col-md-4" style="padding: 10px 0px;">
                            <div class="product-item text-center" style="background-color: white; border-radius: 10px;">
                                <a href="index.php?page_layout=product&id='.$row['prd_id'].'"><img src="admin/products/'.$row['prd_image'].'"></a>
                                <h4><a href="index.php?page_layout=product&id='.$row['prd_id'].'">'.$row['prd_name'].'</a></h4>
                                <p>Price: <span>'.$row['prd_price'].' $</span></p>
                            </div>
                        </div>';
                }
            ?>
        </div>
    </div>
    <!--	End Feature fdfd
     Product	-->