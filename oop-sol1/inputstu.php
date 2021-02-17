<?php 
include('classes.php');


if (isset($_POST['submit'])) {
   
    $studentObj->stu_name = $_POST['username'];
    $studentObj->stu_password = $_POST['password'];
    $studentObj->stu_email = $_POST['email'];
    $studentObj->stu_mobile = $_POST['mobile'];

    $studentObj->createStudent();
}

if(isset($_GET['delid'])){

    $studentObj->deleteStudent($_GET['delid']);
    header("location:inputstu.php");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bootstrap Simple Login Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
        .login-form {
            width: 340px;
            margin: 50px auto;
            font-size: 15px;
        }

        .login-form form {
            margin-bottom: 15px;
            background: #f7f7f7;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }

        .login-form h2 {
            margin: 0 0 15px;
        }

        .form-control,
        .btn {
            min-height: 38px;
            border-radius: 2px;
        }

        .btn {
            font-size: 15px;
            font-weight: bold;
        }
    </style>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function()
            {
                $("#name").keyup(function()
                {
                    //get selected parent option 
                    var stu_name = $("#name").val();              
                    // alert(stu_name);
                    $.ajax(
                            {
                                type: "GET",
                                url: "check.php?stu_name="+stu_name,
                                success: function(data)
                                {                                    
                                    $("#info").html(data);                                    
                                }
                            });
                });

            });
        </script>
</head>

<body>
    <div class="login-form">
    <form method="get">
            <h2 class="text-center">insert</h2>
            <div class="form-group">
                <input id="name" name="username" type="text" class="form-control" placeholder="Username">
                <div id="info">
            </div>
            </div>
            <div class="form-group">
                <input name="email" type="text" class="form-control" placeholder="email">
            </div>
            <div class="form-group">
                <input name="mobile" type="text" class="form-control" placeholder="mobile">
            </div>
            <div class="form-group">
                <input name="password" type="password" class="form-control" placeholder="Password">
            </div>
            <div class="form-group">
                <button name="submit" type="submit" class="btn btn-primary btn-block">Insert</button>
            </div>

        </form>


    </div>

    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header text-center">
                    <strong class="card-title">students Table</strong>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead class="text-white bg-info">
                            <tr>
                                <th scope="col">student ID</th>
                                <th scope="col">student Name</th>
                                <th scope="col">student Email</th>
                                <th scope="col">student mobile</th>
                                <th scope="col">edit</th>
                                <th scope="col">delete</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            foreach($studentObj->fetchAllStudent() as $k => $v){

                         ?>
                              <tr>
                                <th scope="col"><?php echo $v['stu_id']   ?></th>
                                <th scope="col"><?php echo $v['stu_name']   ?></th>
                                <th scope="col"><?php echo $v['stu_email']   ?></th>
                                <th scope="col"><?php echo $v['stu_mobile']   ?></th>
                                <th scope="col"><a href="<?php echo "edit.php?id={$v['stu_id']}"?>" class="btn btn-primary">Edit</a></th>
                                <th scope="col"><a href="<?php echo "inputstu.php?delid={$v['stu_id']}"?>" class="btn btn-danger">Delete</a></th>
                               
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

        <div class="col-lg-2"></div>

</body>

</html>