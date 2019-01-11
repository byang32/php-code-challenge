<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Week 2 Code Challenge</title>
    </head>
    <body>
	<h2>Welcome to the Code Challenge!</h2>
	
		<?php    
		// write code to get the user's username and password.
		// check the username and password against the users.txt file
		// if the username and password pair exist in the users.txt file
		// display a message that the user has been logged in.
		// if the username and password pair is not found
		// display a message that the username or password was not found.
		
                if (isset($POST['submit'])) {
                    
                    // write code to get the user's username and password.
                    $user = $_POST['username'];
                    $pass = $_POST['password'];
                   
                    // check the username and password against the users.txt file.
                    $fp = fopen("users.txt", "r");
                    $matchFound = false;
                    
                    while(!feof($fp)) {
                        
                        $line = rtrim(fgets($fp));
                        
                        if($line) {
                            list($username, $password) = explode(",", $line);
                            
                            if($user == $username && $pass == $password) {
                                $matchFound = true;
                                echo "Match Found: You have been logged in.<br>";
                                break;
                                
                            }
                        }
                    } // while not end of file
                    
                    if(!$matchFound){
                        echo "Match not Found: You have not been logged in.<br>";
                    }
                    
                } else {

        ?>
        
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">

            <label for="username">Please enter your name:</label>
            <input type="username" name="username" id="name" value="">
             <br><br>
			<label for="password">Please enter your name:</label>
            <input type="password" name="password" id="password" value="">
             <br><br>

           <input type="submit" name="submit" value="Login">
          
        </form>
        <?php
		} // end else (form was not submitted)
	?>
    </body>
</html>