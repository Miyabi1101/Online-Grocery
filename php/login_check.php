<?php
    //Show error message.
    $err=[];
        
        if(!$name=filter_input(INPUT_POST, 'name')){
            $err[]='Please fill in your name.';
        }
       
        $email=filter_input(INPUT_POST, 'email');
            if(!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\?\*\[|\]%'=~^\{\}\/\+!#&\$\._-])*@([a-zA-Z0-9_-])+\.([a-zA-Z0-9\._-]+)+$/", $email)) {
            $err[]='Please enter your correct email.';
        }
        
        if(!$phone=filter_input(INPUT_POST, 'phone')) {
            $err[]='Please fill in your phone number.';
        }
        
        if(!$suburb=filter_input(INPUT_POST, 'suburb')) {
            $err[]="Please fill in your suburb. <br>";
        }
        if(!$address=filter_input(INPUT_POST, 'address')) {
            $err[]='Please fill in your address.';
        }
        $password=filter_input(INPUT_POST, 'password');
            if(!preg_match("/\A[a-z\d]{8,15}+\z/i",$password)){
            $err[]='Please fill in your password min 8~max 15 characters.';
            }
        $password2=filter_input(INPUT_POST, 'password2');
            if($password!==$password2){
                $err[]='Please enter your correct password.';
            }        
        if (count($err)===0){
            
        }
        ?>
        
            
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Detail Check</title>
    </head>
    
    <body>
        <?php if(count($err)>0) : ?>
            <?php foreach($err as $e) : ?>
                <p><?php echo $e ?></p>
            <?php endforeach ?>
        <?php else :?>
            <p>Thank you for your order. We sent an invoice to <?php echo $email ?></p>
        <?php endif ?>
        <a href="./Login.php">Go back</a>
        <br><br>
        </body>
  
</html>