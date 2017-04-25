<!DOCTYPE html>
    <head>
        <meta charset="UTF-8" />
        <title>Candidate Sign-Up</title>
        <link rel="stylesheet" type="text/css" href="Registration.css" />
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    </head>
    <body>
        <div class="container">
           
            <section>                
                <div id="container_demo" >
                    
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" autocomplete="on" method="POST">
                                <h1>Sign-Up</h1>
                                <p>
                                    <label for="name" class="name" >Your full name</label>
                                    <input id="name" name="name" required="required" type="text" placeholder="eg. Rahul Gupta"/>
                                </p>
                                <p>
                                    <label for="email" class="email" >Your email</label>
                                    <input id="email" name="email" required="required" type="text" placeholder="eg. mymail@mail.com"/>
                                </p>
                                <p>
                                    <label for="password" class="password">Your password</label>
                                    <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" />
                                </p>
                                <p>
                                    <label for="phone" class="phone">Your phone number</label>
                                    <input id="phone" name="phone" required="required" type="text" placeholder="eg. 9876543210" />
                                </p>
                                <p>
                                    <label for="yoe" class="yoe">Years of Experience</label><br>
                                    <div class="select-style">
                                    <select id="yoe" name="yoe" required="required">
                                    <option value="1">No experience</option>
                                    <option value="2">1-3 Years</option>
                                    <option value="3">4-6 Years</option>
                                    <option value="4">7-10 Years</option>
                                    <option value="5">10+ Years</option>
                                    </select>
                                    </div>
                                </p>
                                <p>
                                    Select your skillset:
                                </p>
                                <p>
                                    <input id="office" name="office" type="checkbox" value="yes">
                                    <label for="office" class="office">Office Suite</label>
                                </p>
                                <p>
                                    <input id="web" name="web" type="checkbox" value="yes">
                                    <label for="web" class="web">Web Design</label>
                                </p>
                                <p>
                                    <input id="data" name="data" type="checkbox" value="yes">
                                    <label for="data" class="data">Data Analysis</label>
                                </p>
                                <p>
                                    <input id="app" name="app" type="checkbox" value="yes">
                                    <label for="app" class="app">App Development</label>
                                </p
                                <p>
                                    <input id="design" name="design" type="checkbox" value="yes">
                                    <label for="design" class="design">Design and Illustration</label>
                                </p>
                                <p>
                                    <input id="security" name="security" type="checkbox" value="yes">
                                    <label for="security" class="security">Security</label>
                                </p>
                                <p>
                                    <input id="machine" name="machine" type="checkbox" value="yes">
                                    <label for="machine" class="machine">Machine Learning</label>
                                </p>
                                <p>
                                    <input id="internet" name="internet" type="checkbox" value="yes">
                                    <label for="internet" class="internet">Internet of Things</label>
                                </p>
                                <p class="login button">
                                    <input type="submit" name="submit" value="Sign-Up" />
                                </p>
                            </form>
                        </div>
                        
                    </div>
                </div>  
            </section>
        </div>
        <?php
        define('DB_HOST', 'localhost');
        define('DB_NAME', 'consultit');
        define('DB_USER','root');
        define('DB_PASSWORD','');

        $con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die("Failed to connect to MySQL: " . mysql_error());

        if(isset($_POST['submit']))
        {

            function test_input($data) 
            {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            $name = test_input($_POST["name"]);
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) 
            {
                $message = "Only letters and white space allowed in name !!";
                echo "<script type='text/javascript'>alert('$message');</script>";
                exit();
            }
            
            $email = test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
            {
                $message="Invalid email format !!";
                echo "<script type='text/javascript'>alert('$message');</script>";
                exit();
            }
            
            if(!preg_match('/^\d{10}$/',($_POST["phone"])))
            {
                $message='Phone number is invalid !!';
                echo "<script type='text/javascript'>alert('$message');</script>";
                exit();
            }

            if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{5,}$/', $_POST["password"])) 
            {
                $message='The password does not meet the requirements !!\n-Must contain atleast 1 letter and 1 number\n-May contain any of the following characters: !@#$%\n-Must be greater than 5 characters';
                echo "<script type='text/javascript'>alert('$message');</script>";
                exit();
            }

        if(!empty($_POST['email']))   //checking the 'user' name which is from Sign-Up.html, is it empty or have some text
        {
            $query = mysqli_query($con,"SELECT * FROM candidate WHERE email = '$_POST[email]'") or die(mysql_error());

            if(mysqli_fetch_array($query))
            {
                $message='Sorry !! The given e-mail has already been registered by another user !!';
                echo "<script type='text/javascript'>alert('$message');</script>";
            }
            else
            {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $phone =  $_POST['phone'];
            $yoe =  $_POST['yoe'];
            if(isset($_POST['office']) && $_POST['office']=='yes')
            {
                $office=1;
            }
            else
            {
                $office=0;
            }
            if(isset($_POST['web']) && $_POST['web']=='yes')
            {
                $web=1;
            }
            else
            {
                $web=0;
            }
            if(isset($_POST['data']) && $_POST['data']=='yes')
            {
                $data=1;
            }
            else
            {
                $data=0;
            }
            if(isset($_POST['app']) && $_POST['app']=='yes')
            {
                $app=1;
            }
            else
            {
                $app=0;
            }
            if(isset($_POST['design']) && $_POST['design']=='yes')
            {
                $design=1;
            }
            else
            {
                $design=0;
            }
            if(isset($_POST['security']) && $_POST['security']=='yes')
            {
                $security=1;
            }
            else
            {
                $security=0;
            }
            if(isset($_POST['machine']) && $_POST['machine']=='yes')
            {
                $machine=1;
            }
            else
            {
                $machine=0;
            }
            if(isset($_POST['internet']) && $_POST['internet']=='yes')
            {
                $internet=1;
            }
            else
            {
                $internet=0;
            }
     $query = "INSERT INTO candidate (name,email,password,phone,yoe,office,web,data,app,design,security,machine,internet) VALUES ('$name','$email','$password','$phone','$yoe','$office','$web','$data','$app','$design','$security','$machine','$internet')";
            if(mysqli_query ($con,$query) )
            {
                $message="Your registration is completed !!";
                echo "<script type='text/javascript'>alert('$message');location.href = 'LandingPage.php';</script>";
            }
            else{
                $message="Registration Unsuccessful !!";
                echo "<script type='text/javascript'>alert('$message');</script>";
            }
            }
        }
    }
        ?>
    </body>
</html>