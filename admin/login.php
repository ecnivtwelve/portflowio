<?php
    session_start();
    include '../config.php';
    include '../lang/' . $website_language . '.php';

    if(isset($_POST['submit'])) {
        if($_POST['email'] == $admin_email) {
            if(sha1($_POST['password']) == $admin_password) {
                $_SESSION["loggedIn"] = true;
                header("Location: panel.php");
            }
            else {
                $error = $lang_login_wrong1;
            }
        }
        else {
            $error = $lang_login_wrong2;
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Portflowio Admin Panel</title>
        <link rel="icon" href="../<?php echo $website_icon; ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <style>
            form {
                width: 400px;
            }

            #login {
                padding: 30px;
                border-radius: 10px;
                position: absolute;
                top: 50%;
                -ms-transform: translateY(-50%);
                transform: translateY(-50%);
                background-color:#ffffff;
                -webkit-box-shadow: 0px 12px 51px 0px rgba(214,214,214,1);
                -moz-box-shadow: 0px 12px 51px 0px rgba(214,214,214,1);
                box-shadow: 0px 12px 51px 0px rgba(214,214,214,1);
            }

            body {
                display:flex;
                align-items: center;
                justify-content: center;
                background-color:#f9f9f9;
            }
        </style>
    </head>
    <body>

        <!-- Login form -->
        <div id="login">
            <img src="logo.png" style="height:30px;margin-bottom:30px;">
            <?php
                if (isset($_GET["message"]) && $_GET["message"] == "installed") {
                    echo "<p>$lang_install_successful</p>";
                }
            ?>
            <form method="POST">
                <div class="form-group">
                    <label for="input-email"><?php echo $lang_login_form_mail; ?></label>
                    <input name="email" id="input-email" type="email" class="form-control" aria-describedby="emailHelp">
                    <small id="emailHelp" class="form-text text-muted"><?php echo $lang_login_form_tip1; ?></small>
                </div>
                <div class="form-group">
                    <label for="input-password"><?php echo $lang_login_form_pass; ?></label>
                    <input name="password" id="input-password" type="password" class="form-control">
                    <small id="mdpHelp" class="form-text text-muted"><?php echo $lang_login_form_tip2; ?></small>
                </div>
                <br>
                <input name="submit" type="submit" value="<?php echo $lang_login_form_validate; ?>" class="btn btn-primary">
                <small id="mdpError" class="form-text text-muted"><?php if(isset($error)){echo $error;} ?></small>
            </form>
        </div>

    </body>
</html>
