<?php

    class PageHeader
    {

        static function header()
        {
            ?>
                <!DOCTYPE html>
                <html lang="en">

                <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Job Hub</title>

                    <!-- Google font -->
                    <link rel="preconnect" href="https://fonts.googleapis.com">
                    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet">

                    <!-- Bootstrap CDN -->
                    <!-- CSS only -->
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
                    <!-- JavaScript Bundle with Popper -->
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
                    <link rel="stylesheet" href="../CSS/style.css">
                </head>
            <?php
        }


        static function nav($pageName=false)
        {
            ?>
                <body>
                    <div class="container">
                        <section id="title">
                            <!-- Nav bar -->
                            <nav class="navbar navbar-expand-lg">
                                <!-- <a class="navbar-brand fs-1" href="index.html">Job Portal</a> -->
                            </nav>
                        </section>
            <?php
        }
    }

?>