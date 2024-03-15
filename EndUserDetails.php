<?php 
    session_start();
    include "authentication.php";
    include "config.php";
    $dealerId = $_SESSION['id'];
    
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 90;
    $offset = ($page-1)*$limit;
    // Modify SQL query based on the selected option
    $filterOption = isset($_GET['showdata']) ? $_GET['showdata'] : "";
         // Modify SQL query based on the selected option
    if (1) {
        $sql = "SELECT * FROM users WHERE parent_id = $dealerId AND Role_id = 3 LIMIT $limit OFFSET $offset";
    } else if ($filterOption == 2) {
        $sql = "SELECT * FROM users WHERE parent_id = $dealerId AND Role_id = 3 LIMIT $limit OFFSET $offset";
    } else {
        // If no option is selected or invalid option, default to showing all users
        $sql = "SELECT * FROM users WHERE parent_id = $dealerId LIMIT $limit OFFSET $offset";
    }
        $query = mysqli_query($link,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD Operation</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <style>
        .fas{
            font-size: 20px;
        }
        .fa-edit:hover{
            color: green;
        }
        .fa-trash:hover{
            color: red;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-secondary navbar-dark">
        <p class="navbar-brand">
            <?php echo isset($_SESSION['id']) ? 'Welcome '.$_SESSION['name'] : '' ?> |
        </p>
        <p class="nav-item text-white">
            <?php echo isset($_SESSION['login_at']) ? 'Login at: '.$_SESSION['login_at'] : '' ?> | &nbsp;&nbsp;
        </p>
        <p class="float-right">
            <a href="logout.php" class="btn btn-danger"><i class='fas fa-sign-out-alt'></i> Logout</a>
        </p>
    </nav>
    <div class="container">
        <h1 class="text-center">EndUser Details List</h1>

        <!-- <form action="" method="GET" style="float: left; margin: 1px;">
            <label for="showdata">Select:</label>
            <select id="showdata" name="showdata" onchange="this.form.submit()">
                <option value="">select</option>
                <option value="1" <php $filterOption == 1 ?>>Dealer</option>
                <option value="2" <php $filterOption == 2 ?>>EndUser</option>
            </select>
        </form> -->

        <!-- <div class="text-right"><a href="EndUserCreate.php" style="float: right; margin: 1px;" class="btn btn-success mb-2"><i class='fas fa-plus'></i> Add EndUser</a></div>
        <div class="text-right"><a href="DealerAddDealer.php" class="btn btn-success mb-2"><i class='fas fa-plus'></i> Add Dealer</a></div> -->

        <?php if(isset($_SESSION['success'])){ ?>
            <div class="alert alert-success"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></div>
        <?php } ?>
        <?php if(isset($_SESSION['error'])){ ?>
            <div class="alert alert-danger"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
        <?php } ?>
        <?php if(isset($_SESSION['warning'])){ ?>
            <div class="alert alert-warning"><?php echo $_SESSION['warning']; unset($_SESSION['warning']); ?></div>
        <?php } ?>

        <table class="table table-bordered table-striped table-hover">
            <thead class="bg-dark text-center text-white">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Sex</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Photo</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php if(mysqli_num_rows($query) == 0){ ?>
                    <tr><td colspan="7" class="text-center">No record found</td></tr>
                <?php }else{ 
                    $psql = "SELECT * FROM users";
                    $pquery = mysqli_query($link,$psql);
                    $total_record = mysqli_num_rows($pquery);
                    $total_page = ceil($total_record/$limit);
                    ?>
                    <?php
                    $count = 1;
                     while($row = mysqli_fetch_assoc($query)){ ?>
                    <tr>
                        <td><?php echo $count++ ?></td>
                        <td><?php echo $row['name'] ?></td>
                        <td>
                            <?php if($row['sex'] == 'male'){ ?>
                                <i class='fas fa-male'></i> Male
                            <?php } ?>
                            <?php if($row['sex'] == 'female'){ ?>
                                <i class='fas fa-female'></i> Female
                            <?php } ?>
                        </td>
                        <td><?php echo $row['phone'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><img src="uploads/<?php echo $row['image'] ?>" width="100" height="125"></td>
                        <td>
                            <div><a href="update.php?id=<?php echo $row['id'] ?>" class="btn btn-success" class="text-dark"><i class='fas fa-edit'></i>Update</a></div>
                           <div><a href="delete.php?id=<?php echo $row['id'] ?>" class="btn btn-danger" class="text-dark"><i class='fas fa-trash'></i>Delete</a></div> 
                            <!-- <div ><a href="Dealer.php"  class="btn btn-success"><i class='fas fa-plus'></i>Dealer Login</a></div>
                            <div ><a href="EnduserLogin.php"  class="btn btn-success"><i class='fas fa-plus'></i>EndUser Login</a></div> -->
                        </td>
                    </tr>
                <?php } $count++;
            } ?>
            </tbody>
        </table>
        <ul class="pagination">
            <li class="page-item <?php echo ($page > 1) ? '' : 'disabled' ?>"><a class="page-link" href="index.php?page=<?php echo $page-1 ?>">Previous</a></li>
        <?php for($i=1;$i<=$total_page;$i++){ ?>
            <li class="page-item <?php echo ($page == $i) ? 'active' : '' ?>"><a class="page-link" href="index.php?page=<?php echo $i ?>"><?php echo $i ?></a></li>
        <?php } ?>
            <li class="page-item <?php echo ($total_page > $page) ? '' : 'disabled' ?>"><a class="page-link" href="index.php?page=<?php echo $page+1 ?>">Next</a></li>
        </ul>
    </div>
</body>
</html>