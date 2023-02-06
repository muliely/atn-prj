<nav>
    <div id="menu" class="collapse navbar-collapse">
        <ul>
            <?php
                $data = mysqli_query($connect, "select * from category order by cat_id");
                while($row = mysqli_fetch_array($data)){
                    echo '<li class="menu-item"><a href="index.php?page_layout=category&id='.$row['cat_id'].'">'.$row['cat_name'].'</a></li>';
                    
                }
            ?>
            <!-- <li class="menu-item"><a href="#">iPhone</a></li>
            <li class="menu-item"><a href="#">Samsung</a></li>
            <li class="menu-item"><a href="#">HTC</a></li>
            <li class="menu-item"><a href="#">Nokia</a></li>
            <li class="menu-item"><a href="#">Sony</a></li>
            <li class="menu-item"><a href="#">Blackberry</a></li> -->
        </ul>
    </div>
</nav>