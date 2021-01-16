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


    <title>Post</title>
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

                        <li><a href="/login/logout">LogOut</a></li>

                        <li class="active"><a href="/post">Post</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>


    <div class="container">
        <div class="row">

                <div class="col">
                    <h1>New Post</h1>
                    <?php if(isset($msg)):?>
                        <div class="alert alert-success"><?= $msg ?></div>
                    <?php endif;?>
                    <?php if(isset($validation)):?>
                        <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
                    <?php endif;?>

                    <form action="/post/save" method="post">
                        <input type="hidden" name="user_id" class="form-control" id="InputForName" value="<?= $user_id ?>">
                        <div class="mb-3">
                            <label for="InputForSubject" class="form-label">Subject</label>
                            <input type="text" name="post_subject" class="form-control" id="InputForSubject" value="<?php set_value('post_subject') ?>">
                        </div>
                        <div class="mb-3">
                            <label for="InputForDescription" class="form-label">Description</label>
                            <input type="text" name="post_description" class="form-control" id="InputForDescription" value="<?php set_value('post_description') ?>" required multiple>
                        </div>
                        <div class="mb-3">

                            <br>
                            <button type="submit" class="btn btn-primary">AddPost</button>
                        </div>
                    </form>
                </div>

        </div>



        <br>

        <div class="row">
            <div class="col">
                    <?php foreach($posts as $post): ?>
                        <div class="blog-post">
                            <h2 class="blog-post-title"><?= $post['post_subject'] ?></h2>
                            <div class="container"><?= $post['post_description'] ?></div>
                        </div>

                    <?php endforeach; ?>


            </div>

        </div>




  </body>
</html>