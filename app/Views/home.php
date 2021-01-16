<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>TEST TASK</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

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
                    <li class="active"><a href="/">Home</a></li>

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

<!-- CONTENT -->
    <div class="heroe">

        <h2>Test Task to Vlad Rastvorov</h2>

    </div>

<br>
<section>

    <h3><strong>David Fevaleaki:</strong></h3>
<blockquote>
    <p>Hi, please check out our demo test and respond with an estimated time frame to complete</p>

    <br>I want to check that you can work with mysql, php and codeignitor.

    <p>I want 2 pages:
        <br>1) login:
        <br>2) pages that show 2 fields 1 select box with subject (any subject that you want for ex. sport, politics, developing and etc.) and second to implement text editor with fonts size images (you can use any library that you want), under that you will see the posts and be able to delete them.
    </p>

    <p>In the login section there will be 3 types of users , a regular user that can see and delete only his own messages.</p>

    <p>Admin that is related to the subject in the select box, they will see any message with the subject that they manage, and manager that can see and delete all messages.
        (all this is just rule and simple action on your code with mysql)</p>

    <p>The project is simple
    <br>2 page login and post
    <br>2 action post text with subject and delete posts.
        <br>3 rules -user, admin(related to subject), manager)</p>

    <p>You can use any design that you want</p>
</blockquote>


</section>

</div>





</body>
</html>
