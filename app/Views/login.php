<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
      <title>Login</title>
    <meta name="viewport" content="">

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


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
                <h1>Sign In</h1>
                <?php if(session()->getFlashdata('msg')):?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
                <?php endif;?>
                <form action="/login/auth" method="post">
                    <div class="mb-3">
                        <label for="InputForEmail" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="InputForEmail" value="<?= set_value('email') ?>">
                    </div>
                    <div class="mb-3">
                        <label for="InputForPassword" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="InputForPassword">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
             
        </div>
    </div>
     

  </body>
</html>