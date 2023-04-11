<nav>
    <div id="menu" class="collapse navbar-collapse">
        <ul>
        <?php
    $data = mysqli_query($mysqli, "select * from category order by cat_id");
    if($data){
        while($row = mysqli_fetch_array($data)){
            echo '<li class="menu-item"><a href="index.php?page_layout=category&id='.$row['cat_id'].'">'.$row['cat_name'].'</a></li>';
        }
    }
    else{
        echo "Error fetching data: " . mysqli_error($mysqli);
    }
?>
        
        </ul>
    </div>
</nav>