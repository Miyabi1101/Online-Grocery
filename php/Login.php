<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Submit Form</title>
    </head>
    
    <body>
        
        Please enter your details to order the delivery. <br><br>
        
        Name<br>
        <form action="login_check.php" method="post">
            <input type="text" name="name">
            <br>
            Email<br>
            <input type="text" name="email">
            <br>
            Phone No.<br>
            <input type="text" name="phone">
            <br>
            Country<br>
            <select name="country">
                <option>Australia</option>
                <option>New Zealand</option>
                <option>Japan</option>
                <option>China</option>
                <option>Vietnam</option>
            </select>
            <br>
            Suburb<br>
            <input type="text" name="suburb">
            <br>
            Address<br>
            <input type="text" name="address">
            <br>
            Password<br>
            <input type="password" name="password">
            <br>
            Input Password Again<br>
            <input type="password" name="password2">
            <br><br>
            <div class=btn-submit>
            <input type="submit" value="OK">
            </div>
            <br><br>
        </form>
    </body>
</html>
