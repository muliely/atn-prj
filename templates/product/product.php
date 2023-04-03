
    <!--	List Product	-->
    <div id="product">
    	<div id="product-head" class="row">

            <?php
                $id = $_GET['id'];
                $prd = mysqli_fetch_array(mysqli_query($connect, "select * from product where prd_id = $id"));
                echo '<div id="product-img" class="col-lg-6 col-md-6 col-sm-12">
                            <img src="admin/products/'.$prd['prd_image'].'">
                        </div>
                        <div id="product-details" class="col-lg-6 col-md-6 col-sm-12">
                            <h1>'.$prd['prd_name'].'</h1>
                            <ul>
                                <li><span>Warranty:</span> '.$prd['prd_warranty'].'</li>
                                <li><span>Promotion:</span> '.$prd['prd_promotion'].'</li>
                                <li id="price">Price (not include VAT)</li>
                                <li id="price-number">'.$prd['prd_price'].' $'.'</li>';

                if($prd['prd_status'] == 1) echo '<li id="status">Available</li>';
                else echo '<li id="status">SOLD OUT</li>';
                echo '</ul>
                            <div id="add-cart"><a href="templates/cart/add_cart.php?prd_id='.$prd['prd_id'].'">Buy Now</a></div>
                        </div>';
            ?>
        	
        </div>
        <div id="product-body" class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <h3>Product Review</h3>
                <?php
                    echo '<p>'.$prd['prd_details'].'</p>';
                ?>
                
            </div>
        </div>      
    </div>
    <!--	End Product	--> 
          
            
            