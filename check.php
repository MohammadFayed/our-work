<?php 

    $fullname = $username = $email = $password = $sex = "";
    $fullnameErr = $usernameErr = $emailErr = $passwordErr = "";
    $errors = array();
            
        // check the input and validation and set in variables.
        // check Fuul Name:
        if( empty($_POST['fullname']) ){
            
            $fullnameErr = "full name is required";
            array_push($errors, $fullnameErr);
        }else{
            
            $fullname = test_input($_POST['fullname']);
            $fullname = ucfirst($fullname);
            if ( !preg_match("/^[a-zA-Z ]*$/",$fullname) ){
                
                $fullnameErr = "Only letters and white space allowed";
                array_push($errors, $fullnameErr);
            }
        }
        // Check User Name:
        if( empty($_POST['username']) ){
            
            $usernameErr = "userName name is required";
            array_push($errors, $usernameErr);
        }else{
            
            $username = test_input($_POST['username']);
            
            if ( !preg_match("/(^\.?\_?|\d*)^[a-zA-Z]*[\.?\_?]?[a-zA-Z]*\d*$/",$username) ){
                
                $usernameErr = "Username is inValid";
                array_push($errors, $usernameErr);
            }
            }
            
        
        // Check E-Mail :
        if( empty($_POST['email']) ){
            
            $emailErr = "email is required";
            array_push($errors, $emailErr);
        }else{
            
            $email = test_input($_POST['email']);
            if ( !Filter_Var($email , FILTER_VALIDATE_EMAIL) ){
                
                $emailErr = "the e-Mail is invalid";
                array_push($errors, $emailErr);
            }
        }
        //check Password :
        if( empty($_POST['password']) ){
            
            $passwordErr = "password is required";
            array_push($errors, $passwordErr);
        }else{
            
            $password = test_input($_POST['password']);
            $hashpass = sha1($password);
            if(strlen($password) < 8 ){
                $passwordErr = "password must be greater then <strong>8</strong> chars";
                array_push($errors, $passwordErr);
            }
            }
            
            $sex = $_POST['sex'];
        
        if(count($errors) == 0){
            $table = "users";
            require_once "server.php";
            //check if username Or Email are exist in database
            $stmt = $conn->prepare("SELECT UserName, email FROM user WHERE UserName = ? AND email = ? ");
            
            $stmt->execute(array($username, $email));
            $count = $stmt->rowCount();
            
            if ($count >0 ){
                $dbcheck = "UserName Or Email Already Exist";
            }else{ //check if is avalid form and insrt the input in database.
                $query = $conn->prepare("INSERT INTO user (FullName, UserName, Email, Password, sex) 
                    VALUES (? ,? ,? ,?, ?)");
            
                $query->execute(array($fullname , $username , $email ,$hashpass, $sex));
                $count = $query->rowCount();
                
                if($count > 0 ){
                    
                        $_SESSION['username'] = $username;
                        header("Location: dashboard.php");
                }
            }
            //End Check.
            
        }
        

 // function to sanitize input.
    function test_input($data){
        
        $data = htmlspecialchars($data);
        $data = trim($data);
        $data = stripslashes($data);
        $data = Filter_Var($data, FILTER_SANITIZE_STRING);
        
        return $data;
    }
?>