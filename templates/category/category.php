
                <!--	List Product	-->
                <div class="products">
                    <?php
                        $id = $_GET['id'];
                        if(isset($_GET['page'])){
                            $page = $_GET['page'];
                        }else {
                            $page = 1;
                        }
                        $count = mysqli_num_rows(mysqli_query($connect, "select * from product where cat_id = $id"));
                        $temp = mysqli_fetch_array(mysqli_query($connect, "select * from category where cat_id = $id"));
                        echo '<h3>'.$temp['cat_name'].' (Available Amouunt '.$count.' Product)</h3>';

                        $f_key = 0;
                        $item_per_page = 3;
                        $f_key = $page * 3 - $item_per_page;
                        $total = ceil($count/$item_per_page);

                        $page_nav = '';
                        $pre_nav = $page - 1;
                        $next_nav = $page + 1;
                        if($pre_nav <= 0) $pre_nav = 1;
                        if($next_nav > $total) $next_nav = $total;
                        $page_nav .= '<li class="page-item"><a class="page-link"href="index.php?page_layout=category&id='.$id.'&page='.$pre_nav.'">&laquo;</a></li>';
                            if($total <= 2){
                                $page_nav .= '<li class="page-item active"><a class="page-link" href="index.php?page_layout=category&id='.$id.'&page='.$page.'">'.$page.'</a></li>';
                            }else{
                                if($page < $total - 2){
                                    $page_nav .= '<li class="page-item active"><a class="page-link" href="index.php?page_layout=category&id='.$id.'&page='.$page.'">'.$page.'</a></li>';
                                    $page_nav .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=category&id='.$id.'&page='.$next_nav.'">'.$next_nav.'</a></li>';
                                    $page_nav .= '<li class="page-item"><a class="page-link" href="#">...</a></li>';
                                    $temp2 = $total - 1;
                                    $page_nav .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=category&id='.$id.'&page='.$temp2.'">'.$temp2.'</a></li>';
                                    $page_nav .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=category&id='.$id.'&page='.$total.'">'.$total.'</a></li>';
                                } 
                                else{
                                    $page_nav .= '<li class="page-item"><a class="page-link" href="#">...</a></li>';
                                    for($temp = $total - 2; $temp < $total; $temp++){
                                        $page_nav .= '<li class="page-item ';
                                        if($temp == $page) $page_nav .= 'active';
                                        $page_nav .= '"><a class="page-link" href="index.php?page_layout=category&id='.$id.'&page='.$temp.'">'.$temp.'</a></li>';
                                    }
                                    $page_nav .= '<li class="page-item ';
                                    if($temp == $page) $page_nav .= 'active';
                                    $page_nav .= '"><a class="page-link" href="index.php?page_layout=category&id='.$id.'&page='.$total.'">'.$total.'</a></li>';
                                }
                            }
                             
                        $page_nav .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=category&id='.$id.'&page='.$next_nav.'">&raquo</a></li>';
                    ?>
                    
                    <div class="product-list row">
                        <?php
                            $data = mysqli_query($connect, "select * from product where cat_id = $id limit $f_key, $item_per_page");
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
                <!--	End List Product	-->
                
                <div id="pagination" class="d-flex justify-content-center">
                    <ul class="pagination">
                        <?php
                            echo $page_nav;
                        ?>
                    </ul> 
                </div>
            
           