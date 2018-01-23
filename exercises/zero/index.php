<html>
    <head>
        <title>Personal Exercises</title>
        <?php include('./public/css/styles.php') ?>
    </head>
    <body class="container">
        <ul>
            <?php if(!$auth->is_Authenticated()){ ?>
              <li><a href="./Register">Real Registration</a></li>
              <li><a href="./Login">Login</a></li>
            <?php } else { ?>
              <li><a href="./Home">Home</a></li>
            <?php } ?>
        </ul>
    </body>
</html>
