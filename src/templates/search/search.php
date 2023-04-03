<!-- Search page -->
<?php
    if(isset($_POST['keyword'])){
        $keyword = $_POST['keyword'];
        if($keyword == ''){
            
        }
        $string = '%'.implode('%', explode(' ',$keyword)).'%';

        $data = mysqli_query($connect, "select * from product where prd_name like '$string'");
        //explode(divider, string); convert string to array
        //implode(divider, array); convert array to string
        

    }else if(isset($_GET['key'])){
        $keyword = $_GET['key'];
        $string = '%'.implode('%', explode(' ',$keyword)).'%';

        $data = mysqli_query($connect, "select * from product where prd_name like '$string'");

        
    } else{
        $keyword = " ";
        $string = "%%";
    }   
?>

<?php
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }else {
        $page = 1;
    }
    $count = mysqli_num_rows($data);

    $f_key = 0;
    $item_per_page = 9;
    $f_key = $page * 9 - $item_per_page;
    $total = ceil($count/$item_per_page);

    $page_nav = '';
    $pre_nav = $page - 1;
    $next_nav = $page + 1;
    if($pre_nav <= 0) $pre_nav = 1;
    if($next_nav > $total) $next_nav = $total;
    $page_nav .= '<li class="page-item"><a class="page-link"href="index.php?page_layout=search&key='.$keyword.'&page='.$pre_nav.'">Previous Page</a></li>';
        if($total <= 3){
            for($i = 1; $i <= $total; $i++){
                $page_nav .= '<li class="page-item';
                if($i == $page) $page_nav .= ' active';
                $page_nav .= '"><a class="page-link" href="index.php?page_layout=search&key='.$keyword.'&page='.$i.'">'.$i.'</a></li>';
            }
        }else{
            if($page < $total - 2){
                $page_nav .= '<li class="page-item active"><a class="page-link" href="index.php?page_layout=search&key='.$keyword.'&page='.$page.'">'.$page.'</a></li>';
                $page_nav .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=search&key='.$keyword.'&page='.$next_nav.'">'.$next_nav.'</a></li>';
                $page_nav .= '<li class="page-item"><a class="page-link" href="#">...</a></li>';
                $temp2 = $total - 1;
                $page_nav .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=search&key='.$keyword.'&page='.$temp2.'">'.$temp2.'</a></li>';
                $page_nav .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=search&key='.$keyword.'&page='.$total.'">'.$total.'</a></li>';
            } 
            else{
                $page_nav .= '<li class="page-item"><a class="page-link" href="#">...</a></li>';
                for($temp = $total - 2; $temp < $total; $temp++){
                    $page_nav .= '<li class="page-item ';
                    if($temp == $page) $page_nav .= 'active';
                    $page_nav .= '"><a class="page-link" href="index.php?page_layout=search&key='.$keyword.'&page='.$temp.'">'.$temp.'</a></li>';
                }
                $page_nav .= '<li class="page-item ';
                if($temp == $page) $page_nav .= 'active';
                $page_nav .= '"><a class="page-link" href="index.php?page_layout=search&key='.$keyword.'&page='.$total.'">'.$total.'</a></li>';
            }
        }
         
    $page_nav .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=search&key='.$keyword.'&page='.$next_nav.'">Next Page</a></li>';
?>

<!--	List Product	-->
<div class="product-list row">
    <div id="search-result" class="col-md-12">Search results for <span><?php echo $keyword; ?></span></div>
    <?php
    $data = mysqli_query($connect, "select * from product where prd_name like '$string' limit $f_key, $item_per_page");
    if($count > 0){
        while($row = mysqli_fetch_array($data)){
        echo '<div class="col-md-4" style="padding: 10px 0px;">
                <div class="product-item text-center" style="background-color: white; border-radius: 10px;">
                    <a href="index.php?page_layout=product&id='.$row['prd_id'].'"><img src="admin/products/'.$row['prd_image'].'"></a>
                    <h4><a href="index.php?page_layout=product&id='.$row['prd_id'].'">'.$row['prd_name'].'</a></h4>
                    <p>Price: <span>'.$row['prd_price'].'$</span></p>
                </div>
            </div>';
        }
    }else echo '<div class="col-md-12 alert alert-danger">No data found</div>';
    
    ?>
</div>
<!--	End List Product	-->


<div id="pagination" class="d-flex justify-content-center">
    <ul class="pagination">
        <?php
        if($count > 0)
            echo $page_nav;
        ?>
    </ul> 
</div>


