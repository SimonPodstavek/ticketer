<?php
    session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel ="stylesheet" href="/styles/index.css">
    <title>Ticketer</title>
  </head>
  <body>
        <nav class="navbar navbar-expand-lg bg-primary f-flex" data-bs-theme="dark">
            <div class="container-fluid categories">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                        </li>
                    </ul>
            </div>
            <div class="account-status">
                    <?php
                        if($_SESSION['logged_in'] == FALSE){
                            echo
                            "
                            <div>
                            <button type='button' class='btn btn-success login-input'>Prihlásiť sa</button>
                            <button type='button' class='btn btn-success login-input'>Registrovať</button>
                            </div>
                            ";
                        }
                        else{
                            function propper_string($input_string): str{
                                return  ucfirst(strtolower($input_string));
                            }
                                $user_first_name = propper_string($_SESSION['user_first_name']);
                                $user_last_name =  propper_string($_SESSION['user_first_name']);
                            echo "";
                        }

                    ?>
                    </div>
                </div>
        </nav>
  </body>
</html>