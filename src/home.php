<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
?>

    <!-- logged in user information -->
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <title> Altitude </title>
        <meta name="viewport" content="width=devide-width, initial-scale=1" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="home-style.css.php" />
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>



    <header>
        <h1> Altitude </h1>
        <h6> Take your music to new heights. </h6>

        <div class="d-flex justify-content-center">


            <nav class="navbar navbar-expand navbar-dark style= " background-color: #7386D5;>
                <div class="container-fluid">



                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="prof.php">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Search</a>
                        </li>
                    </ul>
                </div>
            </nav>

        </div>

    </header>

    <body>

        <article class="container">

            <section>
                <?php if (isset($_SESSION['username'])) : ?>
    <p style="color:white; font-size:large; text-align:center; margin-top:1em;"> <?php echo $_SESSION['username']; ?></p>
    

                <h2> The Stratosphere </h2>
                <p> Featuring our current popular playlists! </p>

                <div id="carouselControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="img\placeholder-image.png" alt="First slide">
                            <h5>Playlist 1</h5>
                            <p>User 1</p>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="img/placeholder.jpeg" alt="Second slide">
                            <h5>Playlist 2</h5>
                            <p>User 2</p>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="img/placeholder2.png" alt="Third slide">
                            <h5>Playlist 3</h5>
                            <p>User 3</p>
                        </div>
                    </div>

                    <a class="carousel-control-prev" href="#carouselControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>


            </section>
    </body>

    <footer>

        <h3> Join us in the skies! </h3>

        <section class="row buttons">
            <div class="col-sm-6">
                <a href="home.php?logout='1'" class="btn btn-secondary btn-sm"> Logout </a><?php endif ?>
            </div>
           
        </section>

    </footer>


    </article>
 

    </html>