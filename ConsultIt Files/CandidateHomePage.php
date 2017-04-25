<?php
        session_start();
    if(!isset($_SESSION["loginname"]))
        header("location: landingpage.php");

        define('DB_HOST', 'localhost');
        define('DB_NAME', 'consultit');
        define('DB_USER','root');
        define('DB_PASSWORD','');
        $con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die("Failed to connect to MySQL: " . mysql_error());

        $exist_email = $_SESSION["loginname"];
        $query = " SELECT name, phone from candidate where email = '$exist_email' ";
        $result = mysqli_query ($con,$query);
        while($row = mysqli_fetch_array($result))
        {
         $exist_name = $row['name'];
   
         $exist_phone = $row['phone'];

        }

?>
<html>

    <head>
        <link href="bootstrap.min.css" rel="stylesheet">
        <script src="jquery.min.js"></script>
        <script src="bootstrap.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <title>Candidate Home Page</title>
        <style>
        section#contact {
            background-color: #222222;
            background-image: url('http://artdnaswitchbd.com/componants/images/map-image.png');
            background-position: center;
            background-repeat: no-repeat;
            background-attachment:fixed;
        }
        section {
            padding: 5% 5% 5% 5%;
        }
        section#contact .section-heading {
            color: white;
        }
        section#contact .form-group {
            margin-bottom: 25px;
        }
        section#contact .form-group input,
        section#contact .form-group textarea {
            padding: 20px;
        }
        section#contact .form-group input.form-control {
            height: 8px;
        }
        section#contact .form-group textarea.form-control {
            height: 136px;
        }
        section#contact .form-control:focus {
            border-color: #fed136;
            box-shadow: none;
        }
        section#contact ::-webkit-input-placeholder {
            font-family: "Montserrat", "Helvetica Neue", Helvetica, Arial, sans-serif;
            text-transform: uppercase;
            font-weight: 700;
            color: #eeeeee;
        }
        .gellary_bg_none img{
            width: 100%;
            height: 550px;
        }
        section#contact :-moz-placeholder {

            /* Firefox 18- */
            font-family: "Montserrat", "Helvetica Neue", Helvetica, Arial, sans-serif;
            text-transform: uppercase;
            font-weight: 700;
            color: #eeeeee;
        }7
        section#contact ::-moz-placeholder {
            /* Firefox 19+ */
            font-family: "Montserrat", "Helvetica Neue", Helvetica, Arial, sans-serif;
            text-transform: uppercase;
            font-weight: 700;
            color: #eeeeee;
        }
        section#contact :-ms-input-placeholder {
            font-family: "Montserrat", "Helvetica Neue", Helvetica, Arial, sans-serif;
            text-transform: uppercase;
            font-weight: 700;
            color: #eeeeee;
        }


        .about_our_company{
            text-align: center;
        }
        .about_our_company h1{
            font-size: 25px;
        }
        .titleline-icon {
            position: relative;
            max-width: 100px;
            border-top: 4px double #F99700;
            margin: 20px auto 20px;
        }
        .titleline-icon:after {
            position: absolute;
            top: -11px;
            left: 0;
            right: 0;
            margin: auto;
            font-family: 'FontAwesome';
            content: "\f141";
            font-size: 20px;
            line-height: 1;
            color: #F99700;
            text-align: center;
            vertical-align: middle;
            width: 40px;
            height: 20px;
            background: white;
        }
            
        form, table{
            color : white !important;
        }
        .h3{
            margin : 0px !important;
        }
        input[type="submit"]
        {
            padding:7px 23px; 
            color: #454242;
            background:#ccc; 
            border:0 none;
            font-weight: bold;
            cursor:pointer;
            -webkit-border-radius: 5px;
            border-radius: 5px;
            font-size: 20px; 
        }
        a:link {color: white}
        a:hover{color: #8d8d8d}
        </style>
        <link href="icheck-1.x/skins/polaris/polaris.css" rel="stylesheet">
        <script src="icheck-1.x/icheck.js"></script>
        <script>
        $(document).ready(function(){
          $('input').iCheck({
            checkboxClass: 'icheckbox_polaris',
            radioClass: 'iradio_polaris',
            increaseArea: '-10%'
          });
        });
        </script>
    </head>
    <body>

        <section id="contact" style="">
                <div class="container">
                    <div class="row">
                        <div class="about_our_company" style="margin-bottom: 10px;">
                            <h1 style="color:bbb; font-size:50px">Candidate Home Page</h1>
                            <div class="titleline-icon"><br><font size=3px><u><a href="logout.php">Log out?</a></u></font></div>
                            <p style="color:white; font-size:30px">Please enter your updated details <?php echo $exist_name; ?> :</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-offset-2">
                            <form name="sentMessage" method="POST" id="contactForm" novalidate="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                <div class="form-group form-inline" style="color:white;font-size:25px">
                                    <label class="control-label">
                                       New Name
                                    </label>
                                    <input type="text" class="form-control" name="name" required="required" value="<?php echo $exist_name; ?>" >
                                </div>
                                <div class="form-group form-inline" style="color:white;font-size:25px">
                                    <label class="control-label">
                                        Email
                                    </label>
                                    <input type="text" class="form-control" name="email" required="required" value="<?php echo $exist_email; ?>" disabled >
                                </div>
                                
                                <div class="form-group form-inline" style="color:white;font-size:25px">
                                    <label class="control-label">
                                        New password
                                    </label>
                                    <input type="password" class="form-control" name="password" required="required"  >
                                </div>
                                <div class="form-group form-inline" style="color:white;font-size:25px">
                                    <label class="control-label">
                                        New Phone Number
                                    </label>
                                    <input type="text" class="form-control" name="phone" required="required" value="<?php echo $exist_phone; ?>" >
                                </div>
                                <div class="form-group form-inline" style="color:white;font-size:25px">
                                    <label class="control-label">
                                        Select your years of experience
                                    </label>
                                   <select class="form-control" name="yoe" required="required">
                                       <option value="1">No experience</option>
                                       <option value="2">1-3 Years</option>
                                       <option value="3">4-6 Years</option>
                                       <option value="4">7-10 Years</option>
                                       <option value="5">10+ Years</option>
                                    </select>
                                </div>
                                <div class="form-group form-inline" style="color:white;font-size:25px">
                                <label class="control-label">
                                        Enter your updated skillset
                                </label>
                                </div>
                                <div class="col-sm-offset-2">
                                    <div class="form-group form-inline">
                                        <label class="h3 control-label">
                                            <input class="form-control" type="checkbox" value="yes" name="office"/>
                                            Office suite
                                        </label>
                                    </div>

                                    <div class="form-group form-inline">
                                        <label class="h3 control-label">
                                            <input class="form-control" type="checkbox" value="yes" name="web"/>
                                            Web Development
                                        </label>
                                    </div>

                                    <div class="form-group form-inline">
                                        <label class="h3 control-label">
                                            <input class="form-control" type="checkbox" value="yes" name="app"/>
                                            App Development
                                        </label>
                                    </div>

                                    <div class="form-group form-inline">
                                        <label class="h3 control-label">
                                            <input class="form-control" type="checkbox" value="yes" name="data"/>
                                            Data Analysis
                                        </label>
                                    </div>

                                    <div class="form-group form-inline">
                                        <label class="h3 control-label">
                                            <input class="form-control" type="checkbox" value="yes" name="machine"/>
                                            Machine Learning
                                        </label>
                                    </div>

                                    <div class="form-group form-inline">
                                        <label class="h3 control-label">
                                            <input class="form-control" type="checkbox" value="yes" name="internet"/>
                                            Internet of things
                                        </label>
                                    </div>

                                    <div class="form-group form-inline">
                                        <label class="h3 control-label">
                                            <input class="form-control" type="checkbox" value="yes" name="security"/>
                                            Security
                                        </label>
                                    </div>

                                    <div class="form-group form-inline">
                                        <label class="h3 control-label">
                                            <input class="form-control" type="checkbox" value="yes" name="design"/>
                                            Design & Illustrations
                                        </label>
                                    </div>
                                </div>
                                
                                <div class="clearfix"></div>
                                <div class="col-lg-12 text-center">
                                    <div id="success"></div>
                                    <input type="submit" value="Submit" name="submit">
                                </div>

                            </form>
                        </div>

                    </div>
                </div>

            </section>


<?php
        

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

        if(!empty($_POST['password']) AND !empty($_POST['yoe']) AND !empty($_POST['name']) AND !empty($_POST['phone']) )   //checking the 'user' name which is from Sign-Up.html, is it empty or have some text
        {
          
           
            $name = $_POST['name'];
           // $email = $_POST['email'];
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

             $query = " UPDATE candidate SET name = '$name', password = '$password', phone = '$phone', yoe = '$yoe', office = '$office', web = '$web', data = '$data', app = '$app', design = '$design', security = '$security', machine = '$machine', internet = '$internet' where email = '$exist_email' ";

            mysqli_query ($con,$query);
            if(mysqli_affected_rows($con)==1)
            {
                $message="Your information is updated !!";
                echo "<script type='text/javascript'>alert('$message');</script>";

            }
          
            else
            {
                $message="Updation Failed !!";
                echo "<script type='text/javascript'>alert('$message');</script>";
            }
        }
        }
        ?>
        </body>
</html>
