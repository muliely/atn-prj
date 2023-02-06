<script>
	function delCat(){
		var confirmBox = confirm("Are your sure about delete this order?");
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
    $count = mysqli_num_rows(mysqli_query($connect, "select * from bill"));

    $total = ceil($count/$row_per_page);

    $page_nav = '';
    $pre_nav = $page - 1;
    $next_nav = $page + 1;
    if($pre_nav <= 0) $pre_nav = 1;
    if($next_nav > $total) $next_nav = $total;
    $page_nav .= '<li class="page-item"><a class="page-link"href="admin.php?page_layout=bill&page='.$pre_nav.'">&laquo;</a></li>';
    	if($total <= 2){
    		for($temp = 1; $temp <= $total; $temp++){
                $page_nav .= '<li class="page-item ';
                if($temp == $page) $page_nav .= 'active';
                $page_nav .= '"><a class="page-link" href="admin.php?page_layout=bill&page='.$temp.'">'.$temp.'</a></li>';
            }
    	}
        else if($page <= $total - 2){
            $page_nav .= '<li class="page-item active"><a class="page-link" href="admin.php?page_layout=bill&page='.$page.'">'.$page.'</a></li>';
            $page_nav .= '<li class="page-item"><a class="page-link" href="admin.php?page_layout=bill&page='.$next_nav.'">'.$next_nav.'</a></li>';
            $page_nav .= '<li class="page-item"><a class="page-link" href="#">...</a></li>';
            $temp2 = $total - 1;
            $page_nav .= '<li class="page-item"><a class="page-link" href="admin.php?page_layout=bill&page='.$temp2.'">'.$temp2.'</a></li>';
            $page_nav .= '<li class="page-item"><a class="page-link" href="admin.php?page_layout=bill&page='.$total.'">'.$total.'</a></li>';
        } 
        else{
            $page_nav .= '<li class="page-item"><a class="page-link" href="#">...</a></li>';
            for($temp = $total - 2; $temp < $total; $temp++){
                $page_nav .= '<li class="page-item ';
                if($temp == $page) $page_nav .= 'active';
                $page_nav .= '"><a class="page-link" href="admin.php?page_layout=bill&page='.$temp.'">'.$temp.'</a></li>';
            }
            $page_nav .= '<li class="page-item ';
            if($temp == $page) $page_nav .= 'active';
            $page_nav .= '"><a class="page-link" href="admin.php?page_layout=bill&page='.$total.'">'.$total.'</a></li>';
        } 
    $page_nav .= '<li class="page-item"><a class="page-link" href="admin.php?page_layout=bill&page='.$next_nav.'">&raquo</a></li>';
?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Order Management</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">All Order</h1>
			</div>
		</div>

		<!--/.row-->

		<div class="row">
			<div class="col-md-12">
					<div class="panel panel-default">
							<div class="panel-body">
								<table 
									data-toolbar="#toolbar"
									data-toggle="table">
		
									<thead>
									<tr>
										<th data-field="id" data-sortable="true">ID</th>
										<th>Buyer Name</th>
										<th>Phone</th>
										<th>Email</th>
										<th>Address</th>
										<th>Product</th>
										<th>Brand</th>
										<th>Amount</th>
										<th>Order Date</th>
										<th>Delete</th>
									</tr>
									</thead>
									<tbody>
										<?php
										$sql_order_list = "select distinct (bill_id) from bill order by bill_id limit $f_key, $row_per_page";
										$data_sql = mysqli_query($connect, $sql_order_list);

										while($row = mysqli_fetch_array($data_sql)){
											$id = $row['bill_id'];
											$sql_prd = "select count(bill_id) from bill where bill_id = $id";
											$sql_prd2 = "
													select bill.bill_id, customer.cus_name, customer.cus_phone, customer.cus_mail, customer.cus_adr, bill.prd_id, product.prd_name, category.cat_name, bill.amount, bill.purchase_time from bill, product, category, customer
													where product.prd_id = bill.prd_id and category.cat_id = product.cat_id and customer.cus_id = bill.cus_id and bill.bill_id = '$id'
													order by bill.purchase_time desc;";
											$countRow = mysqli_query($connect, $sql_prd);
											$raw = mysqli_query($connect, $sql_prd2);
											$data_prd = mysqli_fetch_array($raw);
											$countRow =  count(mysqli_fetch_array($countRow));
											echo '<tr>
													<td style="" rowspan="3">'.$data_prd['bill_id'].'</td>
													<td style="" rowspan="3">'.$data_prd['cus_name'].'</td>
													<td style="" rowspan="3">'.$data_prd['cus_phone'].'</td>
													<td style="" rowspan="3">'.$data_prd['cus_mail'].'</td>
													<td style="" rowspan="3">'.$data_prd['cus_adr'].'</td>
													<td style="">'.$data_prd['prd_name'].'</td>
													<td style="">'.$data_prd['cat_name'].'</td>
													<td style="">'.$data_prd['amount'].'</td>
													<td style="">'.$data_prd['purchase_time'].'</td>
													<td class="form-group">
														<a onclick = "return delCat();" href="delete_bill.php?id='.$row['bill_id'].'&prd_id='.$data_prd['prd_id'].'" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
													</td>
												</tr>';

											for($i = 1; $i < $countRow; $i++){
												if($data_prd = mysqli_fetch_array($raw)){
													echo '<tr>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td style="">'.$data_prd['prd_name'].'</td>
														<td style="">'.$data_prd['cat_name'].'</td>
														<td style="">'.$data_prd['amount'].'</td>
														<td style="">'.$data_prd['purchase_time'].'</td>
														<td class="form-group">
															<a onclick = "return delCat();" href="delete_bill.php?id='.$row['bill_id'].'&prd_id='.$data_prd['prd_id'].'" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
														</td>
													</tr>';

												}
												
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
