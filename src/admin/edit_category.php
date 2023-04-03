<?php
    include_once('config/connect.php');
    $name = $_GET['name'];
    $sql_find = "select * from category where cat_name = '$name'";
    $data = mysqli_query($connect, $sql_find);
    $cat = mysqli_fetch_array($data);
?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li><a href="">Brand Management</a></li>
				<li class="active"><?php echo $cat['cat_name']?></li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Brand: <?php
                    echo $_GET['name'];
                ?></h1>

			</div>
		</div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-8">
                            <?php
                            include_once('config/connect.php');
                            if(isset($_POST['sbm'])){
                                $name2 = $_POST['cat_name']; 
                                $name = $_GET['name'];

                                $sql_danh_sach = "select * from category where cat_name = '$name2';";
                                $data_sql = mysqli_query($connect, $sql_danh_sach);

                                if(mysqli_fetch_array($data_sql)){
                                    $error = '<div class="alert alert-danger">Brand existed!</div>';
                                    echo $error;
                                }else{
                                    $sql_add = "update category set cat_name = '$name2' where cat_name = '$name'";
                                    $data_sql = mysqli_query($connect, $sql_add);
                                    header('location: admin.php?page_layout=category');
                                }
                            }

                            ?>
                        <form role="form" method="post">
                            <div class="form-group">
                                <label>Brand Name:</label>
                                <input type="text" name="cat_name" required 
                                    <?php echo 'value = "'.$cat['cat_name'].'"';?>  
                                class="form-control" placeholder="Brand Name...">
                            </div>
                            <button type="submit" name="sbm" class="btn btn-primary">Update</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div><!-- /.col-->
	</div>	<!--/.main-->	
