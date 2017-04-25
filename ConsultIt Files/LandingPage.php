<?php
    if(isset($_POST['admin'])){
        session_start();
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);
        $conn = mysqli_connect("localhost", "root", "", "consultit") or die("Connect error");
        $result = mysqli_query($conn, "SELECT * FROM ADMIN WHERE username='" . $username ."' AND password= '" . $password . "';" );
        if($result){
            if (mysqli_num_rows($result) == 1){
                $_SESSION["loginname"]=$username;
                header('Location: adminhomepage.php');
            }
            else{
                echo "<script>alert('Invalid Credentials');</script>";
            }
        }
    }
    if(isset($_POST['candidate'])){
        session_start();
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);
        $conn = mysqli_connect("localhost", "root", "", "consultit") or die("Connect error");
        $result = mysqli_query($conn, "SELECT * FROM candidate WHERE email='" . $username ."' AND password= '" . $password . "';" );
        if($result){
            if (mysqli_num_rows($result) == 1){
                $_SESSION["loginname"]=$username;
                header('Location: CandidateHomePage.php');
            }
            else{
                echo "<script>alert('Invalid Credentials');</script>";
            }
        }
    }
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>Candidate and Admin Login</title>
		<link rel="stylesheet" type="text/css" href="candidate.css" />
		<link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	
    </head>
    <body>
        <div class="container">
          
            <!--CANDIDATE LOGIN-->
            
            <section>				
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login1" class="animate form">
                            <form   method="post" autocomplete="on"> 
                                <h1>Candidate Login</h1> 
                                <p> 
                                    <label for="username" class="uname" > Your email or username </label>
                                    <input id="username" name="username" required="required" type="text" placeholder="myusername or mymail@mail.com"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd"> Your password </label>
                                    <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" /> 
                                </p>
                                <p class="login button"> 
                                    <input type="submit" name="candidate" value="Login" /> 
								</p>
                                <p class="change_link">
									Not a member yet?
									<a href="Registration.php" >Join us</a>
								</p>
                            </form>
                        </div>

                        
						
                    </div>
                </div>  
            </section>
            
        
            <hr>
            
            
                        <!--ADMIN LOGIN-->
 
            
            <section>				
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form method="POST" autocomplete="on"> 
                                <h1>Admin Login</h1> 
                                <p> 
                                    <label for="username" class="uname" > Your email or username </label>
                                    <input id="username" name="username" required="required" type="text" placeholder="myusername or mymail@mail.com"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd"> Your password </label>
                                    <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" /> 
                                </p>
                                
                                <p class="login button"> 
                                    <input type="submit" name="admin" value="Login" /> 
								</p>
                                
                            </form>
                        </div>

						
                    </div>
                </div>  
            </section>
        </div>
<?php
if(isset($_GET['logout']))
    {
        $logout=$_GET['logout'];
        if($logout==1)
        {
            echo "<script>alert('You have been successfully logged out!!');</script>";
        }
    }
?>
    </body>
</html>