<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Personal Exercises</title>
  <?php include('./public/css/styles.php') ?>
</head>
<body>
  <nav class="navbar navbar-inverse">
    <div class="navbar-brand">
      <h3>Personal Exercises</h3>
    </div>
  </nav>
  <ul class="breadcrumb">
      <?php if(!$auth->is_Authenticated()){ ?>
        <li><a href="./Register">Real Registration</a></li>
        <li><a href="./Login">Login</a></li>
      <?php } else { ?>
        <li><a href="./Home">Home</a></li>
      <?php } ?>
  </ul>

</body>
</html>
