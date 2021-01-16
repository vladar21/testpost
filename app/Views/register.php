<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


    <title>Register</title>
  </head>
  <body>
    <div class="container">
    <!-- HEADER: MENU + HEROE SECTION -->
    <nav class="navbar navbar-default testnav" style="margin-top:16px;">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="/">Testpost</a>
            </div>
            <div>
                <ul class="nav navbar-nav" style="visibility: visible;">
                    <li><a href="/">Home</a></li>
                    <?php if(!isset(session()->user_id)): ?>
                        <li><a href="/login">Login</a></li>
                        <li><a href="/register">Register</a></li>
                    <?php else: ?>
                        <li><a href="/login/logout">LogOut</a></li>
                        <li><a href="/post">Post</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

        <div class="row justify-content-md-center">
 
            <div class="col-xs-6">
                <h1>Sign Up</h1>
                <?php if(isset($validation)):?>
                    <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
                <?php endif;?>
                <form action="/register/save" method="post">
                    <div class="mb-3">
                        <label for="InputForRole" class="form-label">Role</label>
                        <input type="text" name="role_id" class="form-control" id="InputForRole" value="<?= set_value('role_id') ?>">
                    </div>
                    <div class="mb-3">
                        <label for="InputForName" class="form-label">Name</label>
                        <input type="text" name="user_name" class="form-control" id="InputForName" value="<?= set_value('user_name') ?>">
                    </div>
                    <div class="mb-3">
                        <label for="InputForEmail" class="form-label">Email address</label>
                        <input type="email" name="user_email" class="form-control" id="InputForEmail" value="<?= set_value('user_email') ?>">
                    </div>
                    <div class="mb-3">
                        <label for="InputForPassword" class="form-label">Password</label>
                        <input type="password" name="user_password" class="form-control" id="InputForPassword" placeholder="min 3 characters">
                    </div>
                    <div class="mb-3">
                        <label for="InputForConfPassword" class="form-label">Confirm Password</label>
                        <input type="password" name="confpassword" class="form-control" id="InputForConfPassword">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
             
        </div>
    </div>
     

  </body>
</html>