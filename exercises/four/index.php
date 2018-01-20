<html>
    <head>
        <title>Login Page</title>
    </head>
    <body>
      <h1>Welcome <?php if($auth->gender() === 'male'){ echo 'Mr.';}else{echo 'Ms.';}?> <?php echo $auth->name(); ?></h1>
        <ul>
          <li><a href="./Logout">Logout</a></li>
          <li><a href="./User/Update">Update Profile</a></li>
          <li><a href="./List/Projects">List of All Projects</a></li>
          <li><a href="./List/Practical">List of All Small-Usefull-Projects (Practical)</a></li>
          <li><a href="./Add/Projects">Add Projects</a></li>
        </ul>
    </body>
</html>
