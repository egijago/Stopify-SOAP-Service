<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/css/register.css">
    <title>Register</title>
</head>
<body>
    <div class="container">
        <div class="register">
            <div class="title">
                <h1>Sign up</h1>
            </div>
            <div class="form">
                <form action="../../api/auth/register.php" method="post">
                    <div class="form_input">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" placeholder="Enter your email ">
                    </div>
                    <div class="form_input">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="Enter your password">
                    </div>
                    <div class="form_input">
                        <label for="password">Confirm Password</label>
                        <input type="password" name="confpassword" id="password" placeholder="Enter your confirm password">
                    </div>
                    
                    <div class="form_input">
                        <label for="profilname">What should we call you?</label>
                        <input type="text" name="name" id="name" placeholder="Enter a profile name">
                    </div>
                    <div class="term_form">
                        <input type="checkbox" name="checkbox" id="checkbox">
                        <label for="checkbox">I accept Stopify terms and conditions.</label>
                    </div>
                    <div class="submit_form">
                        <input type="submit" name="submit" value="Sign up" required>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
    
</body>