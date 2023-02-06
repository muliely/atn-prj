<script>
    function delUser(){
        var confirmBox = confirm("Are you sure to delete this user?");
        return confirmBox;
    }
</script>

<?php
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }else {
        $page = 1;
    }
    $row_per_page = 5;
    $f_key = $page * 5 - $row_per_page;

    include_once('config/connect.php');
    $count = mysqli_num_rows(mysqli_query($connect, "select * from category"));

    $total = ceil($count/$row_per_page);

    $page_nav = '';
    $pre_nav = $page - 1;
    $next_nav = $page + 1;
    if($pre_nav <= 0) $pre_nav = 1;
    if($next_nav > $total) $next_nav = $total;
    $page_nav .= '<li class="page-item"><a class="page-link"href="admin.php?page_layout=user&page='.$pre_nav.'">&laquo;</a></li>';
        if($total <= 2){
            for($temp = 1; $temp <= $total; $temp++){
                $page_nav .= '<li class="page-item ';
                if($temp == $page) $page_nav .= 'active';
                $page_nav .= '"><a class="page-link" href="admin.php?page_layout=user&page='.$temp.'">'.$temp.'</a></li>';
            }
        }
        else if($page <= $total - 2){
            $page_nav .= '<li class="page-item active"><a class="page-link" href="admin.php?page_layout=user&page='.$page.'">'.$page.'</a></li>';
            $page_nav .= '<li class="page-item"><a class="page-link" href="admin.php?page_layout=user&page='.$next_nav.'">'.$next_nav.'</a></li>';
            $page_nav .= '<li class="page-item"><a class="page-link" href="#">...</a></li>';
            $temp2 = $total - 1;
            $page_nav .= '<li class="page-item"><a class="page-link" href="admin.php?page_layout=user&page='.$temp2.'">'.$temp2.'</a></li>';
            $page_nav .= '<li class="page-item"><a class="page-link" href="admin.php?page_layout=user&page='.$total.'">'.$total.'</a></li>';
        } 
        else{
            $page_nav .= '<li class="page-item"><a class="page-link" href="#">...</a></li>';
            for($temp = $total - 2; $temp < $total; $temp++){
                $page_nav .= '<li class="page-item ';
                if($temp == $page) $page_nav .= 'active';
                $page_nav .= '"><a class="page-link" href="admin.php?page_layout=user&page='.$temp.'">'.$temp.'</a></li>';
            }
            $page_nav .= '<li class="page-item ';
            if($temp == $page) $page_nav .= 'active';
            $page_nav .= '"><a class="page-link" href="admin.php?page_layout=user&page='.$total.'">'.$total.'</a></li>';
        } 
    $page_nav .= '<li class="page-item"><a class="page-link" href="admin.php?page_layout=user&page='.$next_nav.'">&raquo</a></li>';
?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">User Management</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Staff List</h1>
			</div>
		</div><!--/.row-->
		<div id="toolbar" class="btn-group">
            <a href="admin.php?page_layout=add_user" class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i> Add new user
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
						        <th data-field="name"  data-sortable="true">Full Name</th>
                                <th data-field="price" data-sortable="true">Email</th>
                                <th>Role</th>
                                <th>Action</th>
						    </tr>
                            </thead>
                            <tbody>
                                <?php

                                        include_once('config/connect.php');
                                        $sql_user_list = "select * from user order by user_id limit $f_key, $row_per_page";
                                        $data_sql = mysqli_query($connect, $sql_user_list);

                                        while($row = mysqli_fetch_array($data_sql)){
                                            echo '<tr>
                                                    <td style="">'.$row['user_id'].'</td>
                                                    <td style="">'.$row['user_fullname'].'</td>
                                                    <td style="">'.$row['user_mail'].'</td>';

                                            if($row['user_level'] == 1)echo '<td><span class="label label-danger">Admin</span></td>';
                                            else echo '<td><span class="label label-warning">Member</span></td>';
                                            echo '<td class="form-group">
                                                        <a href="admin.php?page_layout=edit_user&id='.$row['user_id'].'" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                                        <a onclick="return delUser();" href="delete_user.php?id='.$row['user_id'].'" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                                                    </td>
                                                </tr>';
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

	