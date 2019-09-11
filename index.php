<html>
<head>
    <style>
        * {box-sizing: border-box}

        /* Add padding to containers */
        .container {
            padding: 16px;
        }

        /* Full-width input fields */
        input[type=text], input[type=password] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }

        input[type=text]:focus, input[type=password]:focus {
            background-color: #ddd;
            outline: none;
        }

        /* Overwrite default styles of hr */
        hr {
            border: 1px solid #f1f1f1;
            margin-bottom: 25px;
        }

        /* Set a style for the submit/register button */
        .registerbtn {
            background-color: #4CAF50;
            color: white;
            padding: 16px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
        }

        .registerbtn:hover {
            opacity:1;
        }

        /* Add a blue text color to links */
        a {
            color: dodgerblue;
        }

        /* Set a grey background color and center the text of the "sign in" section */
        .signin {
            background-color: #f1f1f1;
            text-align: center;
        }
    </style>
</head>
<body>
<h1> Instructions </h1>
<ul>
       <li>Create a database called myapplication.</li>
       <li>Create a table called users. (Id,username,password,email,phone_number). Those fields should have the right datatype and right size.
       <li>Connect the form to the database, When the user insert the information in the registration form, those information should stored in the database.</li>
       <li>After submission, the page should be redirect to new page.</li>
       <li>The new page should display, "Hello (username)" </li>
</ul>

<?php

session_start();
require('config.php');
$msg='';

if (isset($_POST['username'])   &&  isset($_POST['email'])  &&  isset($_POST['psw'])   &&  isset($_POST['psw-repeat'])) {
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=md5($_POST['psw']);
    $re_password=md5($_POST['psw-repeat']);
    $phone_number=($_POST['phone_number']);


    if($password == $re_password)
    {
        $query="INSERT INTO users(username,email,password,phone_number) values (:username,:email,:password,:phone_number)";
        $stmt=$conn->prepare($query);
       if($stmt->execute([':username'=>$name, ':email'=>$email, ':password'=>$password , ':phone_number'=>$phone_number]))
       {
           $msg='data inserted successfully ';
       }
    }
    else
    {
        echo"password does not match";

    }
}
// session_start();
// require('config.php');
// if (isset($_POST['username'])   &&  isset($_POST['email'])  &&  isset($_POST['psw'])   &&  isset($_POST['psw-repeat']) && isset($_POST['phone_number'])) {
//     # code...
//     $username=$_POST['username'];
//     $email=$_POST['email'];
//     $psw=$_POST['psw'];
//     $phone_number=$_POST['phone_number'];
//     $re_psw=$_POST['psw-repeat'];

//     if($psw == $re_psw)
//     {
//         $query="INSERT INTO users(username,password,email,phone_number) values (:username,:password,:email,:phone_number)";
//         $stmt=$conn->prepare($query);
//        if($stmt->execute([':username'=>$name, ':psw'=>$psw ,':email'=>$email, ':phone_number'=>$phone_number]))
//        {
//            echo 'data inserted successfully ';
//            header('Location:display.php');

//        }
//     }
//     else
//     {
//         echo"password does not match";

//     }  
    
// }
?>
<form method="post" action="">
    <div class="container">
        <h1>Register</h1>
        <p>Please fill in this form to create an account.</p>
        <hr>
        <form action="">
        <label for="email"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="username" required>

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Email" name="email" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>

        <label for="psw-repeat"><b>Repeat Password</b></label>
        <input type="password" placeholder="Repeat Password" name="psw-repeat" required>

       
        <label for="phone-number"><b>Phone Number</b></label>
        <input type="text" placeholder="phone-number" name="phone-number" required>
        <hr>

        <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
        <button type="submit" class="registerbtn" name="submit">Register</button>
        </form>
    </div>

    <div class="container signin">
        <p>Already have an account? <a href="#">Sign in</a>.</p>
    </div>
</form>
</body>
<?php


