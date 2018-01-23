<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Update user</title>
  <?php include('./public/css/styles.php') ?>
</head>
<body>
  <div class="container">
    <form class="card">
      <div class="card-header">
        <h1>profile of <?php if($auth->gender() === 'male'){ echo 'Mr.';}else{echo 'Ms.';}?> <?php echo $auth->name(); ?></h1>
      </div>
      <div class="card-body">
          Firstname: <?php echo $auth->user('Firstname'); ?>
      </div>
    </form>
  </div>
</body>
</html>
