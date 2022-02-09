<?php

session_start();
error_reporting(E_ALL & ~E_NOTICE); 

if(isset($_SESSION['loggedin'])){

require_once "config.php";

    $message = "";
    $message_err = "";
 

if($_SERVER["REQUEST_METHOD"] == "POST"){
        
    $userid = $_SESSION["userid"];
    
    if(empty($_POST["message"])){
        $message_err = "Brak wiadomości do wysłania";
    } else{
        $message = $_POST["message"];
    } 
    
    if(empty($message_err)){
        
        $sql = "INSERT INTO chat (user_id,message) VALUES ('$userid','$message')";
        
        if($results = $link->query($sql)){
            
            header("location: main.php");
            
        }
        else{
            
            $date_err = "Błąd bazy danych";
            
        }
        
    }
}
}
else{
 
    header("location: login.php");
    
}

?>
 
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div></div>
    <div></div>
    
    <div>
                <p>Witaj, <br/><?php echo $_SESSION["user"]." !"; ?></p>
    
    </div>

    <div>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <tr><td><textarea name="message"><?php echo $message; ?></textarea></td>
            </tr>
            <tr>
                <td><input type="submit" value="Wyślij"></td>
            </tr>
            <tr>
                <tr><td><span class="help-block"><?php echo $message_err; ?></span></td>
            </tr>
            
    </form>

    </div>

    <div>

    <?php
        $userid = $_SESSION["userid"];

        $sql = 'SELECT * FROM chat INNER JOIN users ON chat.user_id = users.id';
        $result = mysqli_query($link,$sql);

        if(mysqli_num_rows($result) == 0){
            echo 'Napisz pierwszą wiadomość i rozpocznij chat!';
        } else{
            echo 'Chatuj z innymi:';
            while($row = mysqli_fetch_assoc($result)){

                $username = $row['username'];
                $message = $row['message'];

                echo '<ul>';
                    echo $username.'<br>';
                    echo $message.'<br>';
                echo '</ul>';                
            }
        }
    ?>

    </div>
    
    <div>
    
        <a href="logout.php"><div>Wyloguj</div></a>
    
    </div>

    </body>    
</html>