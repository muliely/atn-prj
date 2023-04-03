	
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="">Product Management</a></li>
				<li class="active">Add Product</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Add Product</h1>
			</div>
        </div><!--/.row-->
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-6">
                                <?php
                                include_once('config/connect.php');
                                if(isset($_POST['sbm'])){
                                    $name = $_POST['prd_name'];          
                                    $price = $_POST['prd_price'];
                                    $warr = $_POST['prd_warranty'];  
                                    $pro = $_POST['prd_promotion'];   
                                    $id = $_POST['cat_id'];
                                    $stt = $_POST['prd_status'];  
                                    if(isset($_POST['prd_featured'])){
                                        $ftt = $_POST['prd_featured'];
                                    }else{
                                        $ftt = 0;
                                    }
                                    $dt = $_POST['prd_details'];


                                    $image = $_FILES['prd_image']['name']; 
                                    $tmp_image = $_FILES['prd_image']['tmp_name'];


                                    $sql_danh_sach = "select * from product where prd_name = '$name';";
                                    $data_sql = mysqli_query($connect, $sql_danh_sach);

                                    if(mysqli_fetch_array($data_sql)){
                                        $error = '<div class="alert alert-danger">Existed Product!</div>';
                                        echo $error;
                                    }else{
                                        $sql_add = "insert into product(prd_name, prd_price, prd_warranty, prd_promotion, prd_image, cat_id, prd_status, prd_featured, prd_details) values('$name', '$price', '$warr', '$pro', '$image', '$id', '$stt', '$ftt', '$dt')";
                                        $data_sql = mysqli_query($connect, $sql_add);
                                        move_uploaded_file($tmp_image, 'products/'.$image);
                                        header('location: admin.php?page_layout=product');
                                    }
                                }

                                ?>
                                <form role="form" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Product Name</label>
                                    <input required name="prd_name" class="form-control" placeholder="">
                                </div>
                                                                
                                <div class="form-group">
                                    <label>Product Price</label>
                                    <input required name="prd_price" type="number" min="0" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Warranty</label>
                                    <input required name="prd_warranty" type="text" class="form-control">
                                </div>                                                  
                                <div class="form-group">
                                    <label>Promotion</label>
                                    <input required name="prd_promotion" type="text" class="form-control">
                                </div>    
                                <div class="form-group">
                                    <label>Product Image</label>
                                    
                                    <input required name="prd_image" type="file">
                                    <br>
                                </div>                              
                                
                            </div>
                            <div class="col-md-6">                                
                                <div class="form-group">
                                    <label>Brand</label>
                                    <select name="cat_id" class="form-control">
                                        <?php

                                        include_once('config/connect.php');
                                        $sql_danh_sach = "select * from category order by cat_id";
                                        $data_sql = mysqli_query($connect, $sql_danh_sach);

                                        while($row = mysqli_fetch_array($data_sql)){
                                            echo '<option value='.$row['cat_id'].'>'.$row['cat_name'].'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="prd_status" class="form-control">
                                        <option value=1 selected>Available</option>
                                        <option value=0>Sold Out!</option>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label>Featured Product</label>
                                    <div class="checkbox">
                                        <label>
                                            <input name="prd_featured" type="checkbox" value=1>Featured
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                        <label>Product Description</label>
                                        <textarea required name="prd_details" class="form-control" rows="3"></textarea>
                                </div>                                
                                <button name="sbm" type="submit" class="btn btn-success">Add</button>
                                <button type="reset" class="btn btn-default">Reset</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div><!-- /.col-->
            </div><!-- /.row -->
		
	</div>	<!--/.main-->	
