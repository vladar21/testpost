<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({selector: 'textarea'});</script>
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <style>
        /* For other boilerplate styles, see: /docs/general-configuration-guide/boilerplate-content-css/ */
        /*
        * For rendering images inserted using the image plugin.
        * Includes image captions using the HTML5 figure element.
        */

        figure.image {
            display: inline-block;
            border: 1px solid gray;
            margin: 0 2px 0 1px;
            background: #f5f2f0;
        }

        figure.align-left {
            float: left;
        }

        figure.align-right {
            float: right;
        }

        figure.image img {
            margin: 8px 8px 0 8px;
        }

        figure.image figcaption {
            margin: 6px 8px 6px 8px;
            text-align: center;
        }


        /*
         Alignment using classes rather than inline styles
         check out the "formats" option
        */

        img.align-left {
            float: left;
        }

        img.align-right {
            float: right;
        }

        /* Basic styles for Table of Contents plugin (toc) */
        .mce-toc {
            border: 1px solid gray;
        }

        .mce-toc h2 {
            margin: 4px;
        }

        .mce-toc li {
            list-style-type: none;
        }
    </style>

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
            <?php if (isset($msg)): ?>
                <div class="alert alert-success"><?= $msg ?></div>
            <?php endif; ?>
            <?php if (isset($validation)): ?>
                <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
            <?php endif; ?>


            <form action="/post/save" method="post">
                <input type="hidden" name="user_id" class="form-control" id="InputForName" value="<?= $user_id ?>">
                <div class="mb-3">
                    <label for="InputForSubject" class="form-label">Subject</label>
                    <select name="subject_id" class="form-control" id="InputForSubject">
                        <option value=""></option>
                        <?php foreach ($subjects as $subject): ?>
                            <option value="<?= $subject['id'] ?>"><?= $subject['subject_title'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="InputForDescription" class="form-label">Description</label>
                    <!--                            <input type="text" name="post_description" class="form-control" id="InputForDescription" value="-->
                    <?php //set_value('post_description') ?><!--" required multiple>-->
                    <textarea name="post_description" class="form-control" id="InputForDescription" rows="10" cols="45"
                              value="<?php set_value('post_description') ?>"></textarea>
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
        <div class="col" id="#posts">
            <h2>Post's list</h2>
            <?php foreach ($posts as $post): ?>
                <div class="blog-post">
                    <h2 class="blog-post-title"><?= $subjects[$post['subject_id'] - 1]['subject_title'] ?></h2>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-11">
                                <?= $post['post_description'] ?>
                            </div>
                            <div class="col-sm-1">
                                <button class="btnic" data-id="<?= $post['id'] ?>"><i class="fa fa-close"></i></button>
                            </div>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>

    </div>


    <script>
        $(function () {
            $(".btnic").on("click", function () {
                $.ajax({
                    url: "post/delete",
                    method: "post",
                    data: {"post_id": $(this).data("id")},
                    dataType: "html"
                }).done(function (msg) {
                    location.reload();
                }).fail(function (jqXHR, textStatus) {
                    alert("Request failed: " + textStatus);
                });
            });
        });
    </script>

    <script>

        var useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;

        tinymce.init({
            selector: 'textarea#full-featured-non-premium',
            plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
            imagetools_cors_hosts: ['picsum.photos'],
            menubar: 'file edit view insert format tools table help',
            toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
            toolbar_sticky: true,
            autosave_ask_before_unload: true,
            autosave_interval: '30s',
            autosave_prefix: '{path}{query}-{id}-',
            autosave_restore_when_empty: false,
            autosave_retention: '2m',
            image_advtab: true,
            link_list: [
                {title: 'My page 1', value: 'https://www.tiny.cloud'},
                {title: 'My page 2', value: 'http://www.moxiecode.com'}
            ],
            image_list: [
                {title: 'My page 1', value: 'https://www.tiny.cloud'},
                {title: 'My page 2', value: 'http://www.moxiecode.com'}
            ],
            image_class_list: [
                {title: 'None', value: ''},
                {title: 'Some class', value: 'class-name'}
            ],
            importcss_append: true,
            file_picker_callback: function (callback, value, meta) {
                /* Provide file and text for the link dialog */
                if (meta.filetype === 'file') {
                    callback('https://www.google.com/logos/google.jpg', {text: 'My text'});
                }

                /* Provide image and alt text for the image dialog */
                if (meta.filetype === 'image') {
                    callback('https://www.google.com/logos/google.jpg', {alt: 'My alt text'});
                }

                /* Provide alternative source and posted for the media dialog */
                if (meta.filetype === 'media') {
                    callback('movie.mp4', {source2: 'alt.ogg', poster: 'https://www.google.com/logos/google.jpg'});
                }
            },
            templates: [
                {
                    title: 'New Table',
                    description: 'creates a new table',
                    content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>'
                },
                {title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...'},
                {
                    title: 'New list with dates',
                    description: 'New List with dates',
                    content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>'
                }
            ],
            template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
            template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
            height: 600,
            image_caption: true,
            quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
            noneditable_noneditable_class: 'mceNonEditable',
            toolbar_mode: 'sliding',
            contextmenu: 'link image imagetools table',
            skin: useDarkMode ? 'oxide-dark' : 'oxide',
            content_css: useDarkMode ? 'dark' : 'default',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
        });


    </script>
</body>
</html>