<?php
$conn=mysqli_connect("localhost","root","","admindb");
if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password = $_POST['password'];
   
    $gender=$_POST['gender'];
    $city=$_POST['city']; 
    
    

    

        $image= $_FILES['image']['name'];
        $tmp_img=$_FILES['image']['tmp_name'];             
        $path="upload/".$image;   
        move_uploaded_file($tmp_img,$path);
         
        $insert="INSERT INTO adlogin(username,email,password,gender,city,image) values('$username','$email','$password','$gender','$city','$path')";
     


    $res=mysqli_query($conn,$insert);
    if($res){
        echo"done";
    }else{
        echo "not done";
    }
    

}


?>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }
        
        * {
            box-sizing: border-box;
        }
        /* Add padding to containers */
        
        .container {
            padding: 16px;
            background-color: white;
        }
        /* Full-width input fields */
        
        input[type=text],
        input[type=email] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }
        
        input[type=password],
        input[type=password] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }
        
        input[type=password]:focus,
        input[type=password]:focus {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }
        /* Overwrite default styles of hr */
        
        hr {
            border: 1px solid #f1f1f1;
            margin-bottom: 25px;
        }
        /* Set a style for the submit button */
        
        .registerbtn {
            background-color: #04AA6D;
            color: white;
            padding: 16px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
        }
        
        .registerbtn:hover {
            opacity: 1;
        }
        /* Add a blue text color to links */
        
        a {
            color: dodgerblue;
        }
        /* Set a grey background color and center the text of the "sign in" section */
        
        .signin {
            background-color: #f1f1f1;
            text-align: center;
        }.main{
            display: table;
            width: 100%;
        }
        .new{
            display: table-cell;
            width: 20%;

        }
        .old{
            display: table-cell;
        }
    </style>
</head>

<body>
    
<form method="post"  enctype="multipart/form-data">
 
            <div class="container">
                <h1>Register  As<a href="http://projects.test/adminpanel/backend/index.php"  style="text-decoration:underline; color:black; "> Admin</a></h1>
                <p>Please fill in this form to create an account.</p>
                <hr>

                <label ><b>username</b></label>
                <input type="text"  name="username" id="name" required  >

                <label  style="color: black; font-size: 20px; "><b>email</b></label>
                <input type="text"  name="email" id="email"  required>


                <label ><b>password</b></label>
                <input type="password"  name="password"  id="password"  required    >
              


             
    
                <label>Please select your gender</label>
                <br>
                <labe><input type="radio" name="gender"  value="male">male</label><br>
                <label><input type="radio" name="gender" value="female"/>female</label>

<br><br>
<div class="main">
    <div class="new">
        <p>please select your city:</p>
    </div>
    <div class="old">
    <select name="city">
    <option value="0">--select City:--</option>
    <option value="chandigarh">chandigarh</option>
    <option value="Mohali">Mohali</option>
    <option value="Panchkula">Panchkula</option>
    <option value="kharar">kharar</option>
    <option value="mandi gobindgarh">mandi gobindgarh</option>
    <option value="khanna">khanna</option>
    <option value="zirakpur">zirakpur</option>
    </select>
    </div>
</div>



</select>
                                 <br>
                                 <br>
                                <input type="file" name="image"/>

                <button type="submit" class="registerbtn" name="submit">Sign-Up</button>
            </div>


        </form>

</body>

</html>