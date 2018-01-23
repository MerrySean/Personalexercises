<html>
    <head>
        <title>Login Page</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
    </head>
    <body>
      <h1>Welcome <?php if($auth->gender() === 'male'){ echo 'Mr.';}else{echo 'Ms.';}?> <?php echo $auth->name(); ?></h1>
        <ul>
          <li><a href="./Logout">Logout</a></li>
          <li><a href="./User/Update">Update Profile</a></li>
          <li><a href="./List/Projects">List of All Projects</a></li>
          <li><a href="./Add/Projects">Add Projects</a></li>
        </ul>
    </body>
</html>
