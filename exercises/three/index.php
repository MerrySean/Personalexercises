<html>
<head>
    <title>Exercise | Three</title>
    <?php include("./public/css/styles.php") ?>
    <link rel="stylesheet" href="./exercises/three/public/css/app.css">
</head>
<body>

    <div id="app" class="container mt-5">
        <form action="./controller/login.php" class="card" method="POST">
            <div class="card-header">
              <h1>Login Here</h1>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="Uname">Username</label>
                <input name="username" id="Uname" type="text" class="form-control" placeholder="Enter username here">
              </div>
              <div class="form-group">
                <label for="PWord">Password</label>
                <input name="password" id="PWord" type="password" class="form-control" placeholder="Enter Password here">
              </div>
              <div class="d-flex justify-content-around">
                <button name="btnLogin" class="btn btn-success">Login</button>
                <a class="btn btn-danger" href="./Register" >Register</a>
              </div>
            </div>
        </form>
    </div>


    <!--Scripts-->
    <?php include("./public/js/scripts.php") ?>
    <script src="./exercises/three/public/js/app.js"></script>
</body>
</html>
