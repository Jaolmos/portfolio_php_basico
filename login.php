<?php

session_start();
if($_POST){

    if( ($_POST['user']=="josea") && ( $_POST['password'] = "123456" ) ){
       
        $_SESION['user']="josea";
    header("location:index.php");
    
    }else{
        echo "<script>alert('Usuario o contraseña incorrecta') </script>";
    }
}


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>

    <div class="container">

        <div class="row">

            <div class="col-md-4">

            </div>

            <div class="col-md-4">

                <div class="card mt-5">
                    <div class="card-header">
                        Inicia sesión
                    </div>
                    <div class="card-body" >
                        <form action="login.php" method="post">

                            Usuario: <input type="text" name="user" class="form-control">
                            <br>
                            Password: <input type="password" name="password" class="form-control">
                            <br>
                            <button type="submit" class="btn btn-success">Entra al portfolio</button>


                        </form>
                    </div>
                    <div class="card-footer text-muted">
                        
                    </div>
                </div>





            </div>

            <div class="col-md-4">

            </div>

        </div>

    </div>






</body>

</html>