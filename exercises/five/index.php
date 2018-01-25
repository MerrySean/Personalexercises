<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Update user</title>
  <?php include('./public/css/styles.php') ?>
  <link rel="stylesheet" href="http://127.0.0.1/Personalexercises/exercises/five/public/css/style.css">
</head>
<body>


  <div class="container">
    <form class="card">
      <div class="card-header">
        <h1>profile of <?php echo $auth->gender() === 'male' ? 'Mr.':'Ms.' ?> <?php echo $auth->name(); ?></h1>
      </div>
      <div class="card-body">
          <div id="resultAlert"></div>
          <table class="table table-striped">
            <thead class="thead-dark">
              <tr>
                <th>#</th>
                <th>Column</th>
                <th>Value</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $num = 1;
                foreach ($auth->user() as $key => $value) {
                  echo "<tr>";
                    echo "<td>".$num."</td>";
                    echo "<td>".$key."</td>";
                    echo "<td id='".$key."'>".$value."</td>";
                    echo "<td> <button mOldValue='".$value."' mTitle='".$key."' type='button' class='btn btn-sm btn-success pop' data-toggle='modal' data-target='#UpdateModal'>Update</button> </td>";
                  echo "</tr>";
                  $num++;
                }
              ?>
              <tr>
                <td><?php echo $num; ?></td>
                <td><?php echo 'Password'; ?></td>
                <td><?php echo '********'; ?></td>
                <td> <button mOldValue="" mTitle="Password" type="button" class='btn btn-success btn-sm pop' data-toggle='modal' data-target='#UpdateModal'>Update</button> </td>
              </tr>
            </tbody>
          </table>
      </div>
    </form>
  </div>


  <div class="modal fade" id="UpdateModal" tabindex="-1" role="dialog" aria-aria-labelledby="UpdateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title"></h3>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="textbox" id="tb"></label>
            <div id="boxtext">
              <input type="text" id="textbox">
            </div>
            <br>
            Default value: <h6 id="OldValue" class="inline"></h6>
            <br>
            <label for="password">Old Password</label>
            <input type="password" id="password" placeholder="">
          </div>
        </div>
        <div class="modal-footer">
          <button id='modalUpdateBtn' class="btn btn-success">Update</button>
        </div>
      </div>
    </div>
  </div>

  <?php include('./public/js/scripts.php') ?>
  <script type="text/javascript" src="http://127.0.0.1/Personalexercises/exercises/five/public/js/script.js"></script>
</body>
</html>
