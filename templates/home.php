<!--Body-->
<div id="body">
	<div class="container">
    	<div class="row">
        	<div class="col-lg-12 col-md-12 col-sm-12">
            	<?php
                    include_once('header/menu.php');
                ?>
            </div>
        </div>
        <div class="row">
        	<div id="main" class="col-lg-8 col-md-12 col-sm-12">
            	<?php
                    include_once('slider/slider.php');
                    if(isset($_GET['page_layout'])){
                        $page = $_GET['page_layout'];
                        switch ($page) {
                            case 'product':
                                include_once('product/product.php');
                                break;
                            case 'cart':
                                include_once('cart/cart.php');
                                break;
                            case 'success':
                                include_once('cart/success.php');
                                break;
                            case 'category':
                                include_once('category/category.php');
                                break;
                            case 'search':
                                include_once('search/search.php');
                                break;
                            
                        }
                    }else{
                        include_once('sub.php');
                    }
                ?>
            </div>
            <?php
                     include_once('banner/banner.php');
                
            ?>
            
        </div>
    </div>
</div>
<!--	End Body	-->

