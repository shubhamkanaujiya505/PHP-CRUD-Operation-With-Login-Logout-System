<?php 
    session_start();
    date_default_timezone_set("Asia/Kolkata");
    include "config.php";
    if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
        // header('location:index.php');
    }
    
    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $dealerId = $_SESSION['id'];
        // Perform login based on email here
        // You may need to replace this with your actual login logic
        
        // For example:
        $sql = "SELECT * FROM users WHERE email='$email'";
        $query = mysqli_query($link,$sql);

        $data = mysqli_fetch_assoc($query);
        if($data){
            $_SESSION['id'] = $data['id'];
            $_SESSION['email'] = $data['email'];
            $_SESSION['timeout'] = time()+1800;
            $_SESSION['login_at'] = date('h:m:s a');
            // echo "<pre>";
            // print_r($_SESSION);die;
            header('location:EndUserDetails.php');
        }else{
            $_SESSION['error'] = 'Email not found';
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <title>Login</title>
    <style>
        #login
        {
            margin: 18% 30%;
            border: 1px solid lightgray;
            padding: 10px 20px 40px;
            box-shadow: 2px 5px 5px 2px lightgray;
        }
    </style>
</head>
<body>
<div class="container">
  <div id="login">
  <div ><a href="index.php" class="btn btn-success btn-block"><i class='fas fa-plus btn-block'></i>Dealer List</a></div>
    <div class="mb-4"><h1 class="text-center">EndUser Login</h1></div>

    <?php if(isset($_SESSION['error'])){ ?>
        <div class="alert alert-danger"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
    <?php } ?>
    <form action="" method="POST">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class='fas fa-envelope'></i></span>
            </div>
            <input type="email" class="form-control" placeholder="Enter Email" id="email" name="email" value="<?php echo isset($_COOKIE['email']) ? $_COOKIE['email'] : '' ?>" required>
        </div>

        <button type="submit" class="btn btn-primary btn-block" name="login">Login</button>
        
    </form>
  </div>
</div>
</body>
</html>
<script type="text/javascript">
    //Error message hide
    setTimeout(function(){
        document.getElementsByClassName('alert')[0].style.display = 'none';
    }, 3000);
</script>
