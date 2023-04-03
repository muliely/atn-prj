
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="">User Management</a></li>
				<li class="active">Add User</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Add User</h1>
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
                                        $name = $_POST['user_full'];
                                        $acc = $_POST['user_mail'];
                                        $pass = $_POST['user_pass'];
                                        $pass2 = $_POST['user_re_pass'];
                                        $lv = $_POST['user_level'];

                                        $sql_check = "select * from user where user_mail = '$acc'";
                                        $data = mysqli_query($connect, $sql_check);

                                        if(mysqli_fetch_array($data)){
                                            echo '<div class="alert alert-danger">Email has been used!</div>';
                                        }
                                        else if(!($pass === $pass2)){
                                            echo '<div class="alert alert-danger">Re-enter password is not mactch!</div>';
                                        }else{
                                            $sql_add = "insert into user(user_fullname, user_mail, user_pass, user_level) values('$name', '$acc', '$pass', '$lv')";
                                            $data = mysqli_query($connect, $sql_add);
                                            header('location: admin.php?page_layout=user');
                                        }
                                    }
                                ?>
                                <form role="form" method="post">
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input name="user_full" required class="form-control" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input name="user_mail" required type="text" class="form-control">
                                </div>                       
                                <div class="form-group">
                                    <label>Password</label>
                                    <input name="user_pass" required type="password"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Re-enter Password</label>
                                    <input name="user_re_pass" required type="password"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Role</label>
                                    <select name="user_level" class="form-control">
                                        <option value=1>Admin</option>
                                        <option value=2>Member</option>
                                    </select>
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
