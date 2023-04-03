
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li><a href="">Brand Management</a></li>
				<li class="active">Add Brand</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Add Brand</h1>
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
                                $name = $_POST['cat_name'];          

                                $sql_cat_list = "select * from category where cat_name = '$name';";
                                $data_sql = mysqli_query($connect, $sql_cat_list);

                                if(mysqli_fetch_array($data_sql)){
                                    $error = '<div class="alert alert-danger">Existed Brand!</div>';
                                    echo $error;
                                }else{
                                    $sql_add = "insert into category values(0, '$name')";
                                    $data_sql = mysqli_query($connect, $sql_add);
                                    header('location: admin.php?page_layout=category');
                                }
                            }

                            ?>
                        	

                            <form role="form" method="post">
                            <div class="form-group">
                                <label>Brand Name:</label>
                                <input required type="text" name="cat_name" class="form-control" placeholder="Brand Name...">
                            </div>
                            <button type="submit" name="sbm" class="btn btn-success">Add</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        </div>
                    	</form>
                    </div>
                </div>
            </div><!-- /.col-->
	</div>	<!--/.main-->	
