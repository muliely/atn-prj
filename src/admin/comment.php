<script>
    function delCmt(){
        var confirmBox = confirm("Bạn chắc chứ?");
        return confirmBox;
    }
</script>
<?php
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }else {
        $page = 1;
    }
    $row_per_page = 10;
    $f_key = $page * 10 - $row_per_page;

    include_once('config/connect.php');
    $count = mysqli_num_rows(mysqli_query($connect, "select * from comment"));

    $total = ceil($count/$row_per_page);

    $page_nav = '';
    $pre_nav = $page - 1;
    $next_nav = $page + 1;
    if($pre_nav <= 0) $pre_nav = 1;
    if($next_nav > $total) $next_nav = $total;
    $page_nav .= '<li class="page-item"><a class="page-link"href="admin.php?page_layout=comment&page='.$pre_nav.'">&laquo;</a></li>';
        if($total <= 1){
            $page_nav .= '<li class="page-item active"><a class="page-link" href="admin.php?page_layout=comment&page='.$page.'">'.$page.'</a></li>';
        }else if($page < $total - 2){
            $page_nav .= '<li class="page-item active"><a class="page-link" href="admin.php?page_layout=comment&page='.$page.'">'.$page.'</a></li>';
            $page_nav .= '<li class="page-item"><a class="page-link" href="admin.php?page_layout=comment&page='.$next_nav.'">'.$next_nav.'</a></li>';
            $page_nav .= '<li class="page-item"><a class="page-link" href="#">...</a></li>';
            $temp2 = $total - 1;
            $page_nav .= '<li class="page-item"><a class="page-link" href="admin.php?page_layout=comment&page='.$temp2.'">'.$temp2.'</a></li>';
            $page_nav .= '<li class="page-item"><a class="page-link" href="admin.php?page_layout=comment&page='.$total.'">'.$total.'</a></li>';
        } 
        else{
            $page_nav .= '<li class="page-item"><a class="page-link" href="#">...</a></li>';
            for($temp = $total - 2; $temp < $total; $temp++){
                $page_nav .= '<li class="page-item ';
                if($temp == $page) $page_nav .= 'active';
                $page_nav .= '"><a class="page-link" href="admin.php?page_layout=comment&page='.$temp.'">'.$temp.'</a></li>';
            }
            $page_nav .= '<li class="page-item ';
            if($temp == $page) $page_nav .= 'active';
            $page_nav .= '"><a class="page-link" href="admin.php?page_layout=comment&page='.$total.'">'.$total.'</a></li>';
        } 
    $page_nav .= '<li class="page-item"><a class="page-link" href="admin.php?page_layout=comment&page='.$next_nav.'">&raquo</a></li>';

?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Danh sách comment</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Comments</h1>
			</div>
		</div><!--/.row-->
		<div id="toolbar" class="btn-group">
            <a onclick="return delCmt();" href="delete_comm.php" class="btn btn-danger">
                <i class="glyphicon glyphicon-remove"></i> Xóa bình luận xấu
            </a>
        </div>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
                        <table 
                            data-toolbar="#toolbar"
                            data-toggle="table">

						    <thead>
						    <tr>
						        <th data-field="id" data-sortable="true">ID</th>
						        <th data-field="name"  data-sortable="true">Product</th>
                                <th data-field="price" data-sortable="true">Name</th>
                                <th>Mail</th>
                                <th>Date</th>
                                <th>Comment</th>
                                <th>Action</th>
						    </tr>
                            </thead>
                            <tbody>
                                <?php

                                        // include_once('config/connect.php');
                                        $sql_danh_sach = "select * from comment inner join product on comment.prd_id = product.prd_id order by comm_id limit $f_key, $row_per_page";
                                        $data_sql = mysqli_query($connect, $sql_danh_sach);
                                        if($data_sql){
                                            while($row = mysqli_fetch_array($data_sql)){
                                                echo '<tr>
                                                        <td style="">'.$row['comm_id'].'</td>
                                                        <td style="">'.$row['prd_name'].'</td>
                                                        <td style="">'.$row['comm_name'].'</td>
                                                        <td style="">'.$row['comm_mail'].'</td>
                                                        <td style="">'.$row['comm_date'].'</td>
                                                        <td>'.$row['comm_details'].'</td>

                                                        <td class="form-group">
                                                            <a onclick = "return delCmt();" href="delete_one_comm.php?id='.$row['comm_id'].'" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                                                        </td>
                                                    </tr>';
                                            }
                                        }
                                ?>
                            
                                 </tbody>
						</table>
                    </div>
                    <div class="panel-footer text-center">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <?php
                                    echo $page_nav;
                                ?>
                            </ul>
                        </nav>
                    </div>
				</div>
			</div>
		</div><!--/.row-->	
	</div>	<!--/.main-->

