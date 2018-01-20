<html>
    <head>
        <title>Exercises</title>
        <link rel="stylesheet" href="./public/css/bootstrap.css">
    </head>
    <body class="container">
        <ul>
            <li><a href="./FakeRegistration">Fake Registration</a></li>
            <?php if(!$auth->is_Authenticated()){ ?>
              <li><a href="./Register">Real Registration</a></li>
              <li><a href="./Login">Login</a></li>
            <?php } else { ?>
              <li><a href="./Home">Home</a></li>
            <?php } ?>
        </ul>
    </body>
</html>
