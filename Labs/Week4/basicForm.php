<html>
<head><title>
        A BASIC HTML FORM
    </title>
    <?php
    $username = "username";
    if(isset($_POST['submit1'])){
        $username = $_POST['username'];
    if($username =="letmein"){
        echo "Welcome back, my friend";

    }
    else{
        echo "You're not a member of this site";
    }
}
    ?>
</head>
<body>
<form name="form1" method="post" action="basicForm.php">
<input type="text" value="<?php echo $username?>" name="username">
<input type="submit" name="submit1" value="login">

</form>
</body>


