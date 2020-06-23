<?php
    if(isset($_SESSION['username']) or isset($_COOKIE['username'])):
        if(isset($_COOKIE['username']) and empty($_SESSION['username'])):
            $_SESSION['username'] = $_COOKIE['username'];
        endif;
        $username = $_SESSION['username'];
        $query_account = "select * from account where (username = '$username' and roles = 'client')";
        $stmt_account = $db->selectData($query_account);
        $result_account = $stmt_account->fetch(PDO::FETCH_ASSOC);
    endif;

    if(isset($_POST['logout'])):
        if(isset($_COOKIE['username'])):
            setcookie("username",$_SESSION['username'], time()-36000);
        endif;
        unset($_SESSION['username']);
    endif;
?>
<div class="col-md-12 clearfix">
    <div class="col-md-2 float-right header-login">
        <img src="image/user.png" class="userIcon float-left mt-2 mr-2">
        <a href="login.php" class="account position-relative" style="top: 8px" <?= isset($_SESSION['username'])? 'hidden' : '' ?>>Login</a>
        <a href="signup.php" class="account position-relative" style="top: 8px" <?= isset($_SESSION['username'])? 'hidden' : '' ?>>Sign up</a>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary float-left mr-2" data-toggle="modal" data-target="#exampleModal" <?= isset($_SESSION['username'])? $_SESSION['username'] : 'hidden' ?>>
            <?= isset($_SESSION['username']) || isset($_COOKIE['username'])?  $_SESSION['username'] : ''; ?>
        </button>
        <form action="#" method="post" class="float-left">
            <button type="submit" name="logout" class="btn btn-secondary" <?= isset($_SESSION['username'])? '' : 'hidden' ?>>Log out</button>
        </form>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Account Information</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" value="<?= $result_account['email'] ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone number</label>
                                <input type="number" class="form-control" id="phone" value="0<?= $result_account['phone'] ?>" disabled>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8 text-center float-right">
        <input type="text" name="search" class="search" id="search" placeholder="Search" autocomplete="off">
        <img src="image/icons8-search-24.png" id="search_button">
    </div>
</div>
