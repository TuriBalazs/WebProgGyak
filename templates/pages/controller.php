<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <!-- OR:
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    -->
</head>
<body class="container">
    <h3 class="text-center">CRUD OPERATIONS</h3>
    <?php
        $route=$_SERVER['QUERY_STRING'];
        if($route=="") include("main.php");
        if($route=="createuser") include("createuser.php");
        if(str_contains($route,"edituser")) include("edituser.php");
        if(str_contains($route,"deleteuser")) include("deleteuser.php");         
    ?>
</body>
</html>