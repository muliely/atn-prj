<script src="ckeditor/ckeditor.js"></script>
<?php
    include_once('config/connect.php');
    $id = $_GET['id'];
    $sql_find = "select * from product where prd_id = '$id'";
    $data = mysqli_query($connect, $sql_find);
    $prd = mysqli_fetch_array($data);
?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="">Product Management</a></li>
				<li class="active"><?php echo $prd['prd_name'];?></li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Product: <?php echo $prd['prd_name'];?></h1>
			</div>
        </div><!--/.row-->
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-6">
                                <?php

                                if(isset($_POST['sbm'])){
                                    $name = $_POST['prd_name'];          
                                    $price = $_POST['prd_price'];
                                    $warr = $_POST['prd_warranty'];  
                                    $pro = $_POST['prd_promotion'];   
                                    $nid = $_POST['cat_id'];
                                    $stt = $_POST['prd_status'];  
                                    $new = $_POST['prd_new'];
                                    if(isset($_POST['prd_featured'])){
                                        $ftt = $_POST['prd_featured'];
                                    }else{
                                        $ftt = 0;
                                    }
                                    $dt = $_POST['prd_details'];

                                    $image = $prd['prd_image'];
                                    if($_FILES['prd_img']['name'] != ""){
                                        $image = $_FILES['prd_img']['name']; 
                                        $tmp_image = $_FILES['prd_img']['tmp_name'];
                                        move_uploaded_file($tmp_image, 'products/'.$image);
                                    }

                                    $sql_upd = "update product 
                                                    set prd_name = '$name', prd_price = '$price', prd_warranty = '$warr', prd_promotion = '$pro', prd_image = '$image', cat_id = '$nid', prd_new = '$new', prd_status = '$stt', prd_featured = '$ftt', prd_details = '$dt'
                                                    where prd_id = '$id';";
                                    $data_sql = mysqli_query($connect, $sql_upd);
                                    header('location: admin.php?page_layout=product');
                                }

                                ?>
                                <form role="form" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Product Name</label>
                                    <input type="text" name="prd_name" required class="form-control" 
                                        <?php echo 'value = "'.$prd['prd_name'].'"';?>  
                                    placeholder="">
                                </div>
                                                                
                                <div class="form-group">
                                    <label>Product Price</label>
                                    <input type="number" name="prd_price" required 
                                        <?php echo 'value = "'.$prd['prd_price'].'"';?> 
                                    class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Product Warranty</label>
                                    <input type="text" name="prd_warranty" required 
                                        <?php echo 'value = "'.$prd['prd_warranty'].'"';?> 
                                    class="form-control">
                                </div>                                                  
                                <div class="form-group">
                                    <label>Promotion</label>
                                    <input type="text" name="prd_promotion" required  
                                        <?php echo 'value = "'.$prd['prd_promotion'].'"';?> 
                                    class="form-control">
                                </div>  
                                <div class="form-group">
                                    <label>Product Image</label>
                                    <input type="file" name="prd_img">
                                    <br>
                                    
                                </div>
                                
                            </div>
                            <div class="col-md-6">
                                
                                <div class="form-group">
                                    <label>Brand</label>
                                    <select name="cat_id" class="form-control">
                                        <?php

                                        include_once('config/connect.php');
                                        $sql_cat_list = "select * from category order by cat_id";
                                        $data_sql = mysqli_query($connect, $sql_cat_list);

                                        while($row = mysqli_fetch_array($data_sql)){
                                            if($prd['cat_id'] == $row['cat_id']) 
                                                echo '<option selected value='.$row['cat_id'].'>'.$row['cat_name'].'</option>';
                                            echo '<option value='.$row['cat_id'].'>'.$row['cat_name'].'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label>Availabiltiy</label>
                                    <select name="prd_status" class="form-control">
                                        <?php
                                            if($prd['prd_status'] == '1')
                                                echo '<option selected value=1>Avaialble</option>
                                                <option value=0>Hết hàng</option>';
                                            else echo '<option value=1>Còn hàng</option>
                                                <option selected value=0>Out of Stock</option>';
                                        ?>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label>Featured Product</label>
                                    <div class="checkbox">
                                        <label>
                                            <input name="prd_featured" type="checkbox" value=1
                                            <?php
                                                if($prd['prd_featured'] == '1')
                                                    echo 'checked';
                                            ?>
                                            >Featured
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                        <label>Product Description</label>
                                        <textarea id="editor1"name="prd_details" required class="form-control" rows="3"><?php
                                                echo $prd['prd_details'];
                                            ?>
                                        </textarea>
                                        <script>
                                            CKEDITOR.replace('prd_details');
                                        </script>
                                    </div>
                                <button type="submit" name="sbm" class="btn btn-primary">Update</button>
                                <button type="reset" class="btn btn-default">Reset</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div><!-- /.col-->
            </div><!-- /.row -->
	</div>	<!--/.main-->	
