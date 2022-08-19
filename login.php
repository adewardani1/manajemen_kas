<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
</head>

<body>
    <div class="container">
        <div class="wrapper">
            <div class="title"><span>Login Form</span></div>
            <?php echo validation_errors(); ?>
            <?php echo form_open('login/aksi'); ?>
            <div class="row">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Username" name="username" id="inputUssername" required>
            </div>
            <div class="row">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Password" name="password" id="inputPassword" required>
            </div>
            <div class="row button">
                <input type="submit" value="Login">
            </div>
            </form>
        </div>
    </div>
</body>

</html>