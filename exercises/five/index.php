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
        <h1>Updating the profile of <?php if($auth->gender() === 'male'){ echo 'Mr.';}else{echo 'Ms.';}?> <?php echo $auth->name(); ?></h1>
      </div>
      <div class="card-body">
        <div class="form-group">
          <label for="Firstname">Firstname</label>
          <input type="text" class="form-control" id="Firstname" placeholder="Firstname">
        </div>
      </div>
      <hr class="m-0">
      <div class="card-body p-2">
        <button class="btn btn-success" type="submit">Update Profile</button>
      </div>
    </form>
  </div>
</body>
</html>
