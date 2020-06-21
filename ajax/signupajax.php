<?php
    require_once '../connect/Database.php';
    $db = new Database();

    if(isset($_GET['username'])):
        $username = $_GET['username'];
        $query = "select * from account where username=:username";
        $param = ['username'=>$username];
        $stmt = $db->queryDataParam($query, $param);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count = count($result['username']);
        if($count > 0): ?>
            <script>
                $(document).ready(function () {
                    $("#username").css("border",'1px solid red');
                    $("#errorUsername").css('display','inline');
                    $('#errorUsername').html("Account already exists");
                });
            </script>
<?php   else:    ?>
            <script>
                $(document).ready(function () {
                    $("#username").css("border",'2px solid green');
                    $("#errorUsername").css('display','none');
                });
            </script>
<?php   endif;
    endif;
?>


