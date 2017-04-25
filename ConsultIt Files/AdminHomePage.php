<?php
    session_start();
    if(!isset($_SESSION['loginname']))
    header("location: landingpage.php");
?>
<html>

    <head>
        <link href="bootstrap.min.css" rel="stylesheet">
        <script src="jquery.min.js"></script>
        <script src="bootstrap.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link href="icheck-1.x/skins/polaris/polaris.css" rel="stylesheet">
        <title>Admin Home Page</title>
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
        <style>
        section#contact {
            background-color: #222222;
            background-image: url('http://artdnaswitchbd.com/componants/images/map-image.png');
            min-height: 100%;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            background-size: cover;
        }
        section {
            padding: 5% 4% 5% 4%;
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
            height: auto;
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
        }
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
        a:link {color: white}
        a:hover{color: #8d8d8d}
        #flt
        {
            float: left;
        }
        </style>
    </head>
    <body>
        <?php 
            if($_SERVER['REQUEST_METHOD']=='POST'){
        echo'
        <section id="contact" style="">
                <div class="container-fluid">
                    <div class="row">
                        <div class="about_our_company" style="margin-bottom: 10px;">
                            <h1 style="color:bbb; font-size:50px">Admin Home Page</h1>
                            <a href="AdminHomepage.php"><img id="flt" src="backbutton.png" height=30px width=70px></a>
                            <div class="titleline-icon"><br><font size=3px><u><a href="logout.php">Log out?</a></u></font></div>
                            <p style="color:white; font-size:30px">Search Results:</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>
                                            Name
                                        </th>
                                        <th>
                                            Email
                                        </th>
                                        <th>
                                            Phone
                                        </th>
                                        <th>
                                            Years of Experience
                                        </th>
                                        <th>
                                            Office Suite
                                        </th>
                                        <th>
                                            Web
                                        </th>
                                        <th>
                                            Data Analytics
                                        </th>
                                        <th>
                                            App Development
                                        </th>
                                        <th>
                                            Design Illustrations
                                        </th>
                                        <th>
                                            Security
                                        </th>
                                        <th>
                                            Machine Learning
                                        </th>
                                        <th>
                                            Internet of Things
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>';
                        $a = "";
                        foreach ($_POST as $param_name => $param_val) {
                            if($param_name==="yoe"){
                                $a = $a . "yoe >= " . $param_val;
                            }
                            else if($a ===""){
                                $a = $a .$param_name . "=" . $param_val;
                            }
                            else{
                                 $a = $a . " AND " .  $param_name . "=" . $param_val;   
                            }
                        }

                        $conn = mysqli_connect("localhost", "root", "", "consultit") or die("Connect error");
                        $result = mysqli_query($conn, "SELECT * FROM CANDIDATE WHERE " . $a);

                        if($result){
                            while($row = mysqli_fetch_assoc($result)){
                                if($row['yoe']=='1')
                                    $yoe="No experience";
                                else if($row['yoe']=='2')
                                   $yoe="1-3 Years";
                                else if($row['yoe']=='3')
                                   $yoe="4-6 Years";
                                else if($row['yoe']=='4')
                                   $yoe="7-10 Years";
                                else if($row['yoe']=='5')
                                    $yoe="10+ Years";
                                echo "<tr>
                                    <td>".$row['name']."</td>
                                    <td>".$row['email']."</td>
                                    <td>".$row['phone']."</td>
                                    <td>".$yoe."</td>
                                    <td>".'<i class="fa fa-' . ($row['office'] ? 'check' : 'times') .'" aria-hidden="true"></i>'."</td>
                                    <td>".'<i class="fa fa-' . ($row['web'] ? 'check' : 'times') .'" aria-hidden="true"></i>'."</td>
                                    <td>".'<i class="fa fa-' . ($row['data'] ? 'check' : 'times') .'" aria-hidden="true"></i>'."</td>
                                    <td>".'<i class="fa fa-' . ($row['app'] ? 'check' : 'times') .'" aria-hidden="true"></i>'."</td>
                                    <td>".'<i class="fa fa-' . ($row['design'] ? 'check' : 'times') .'" aria-hidden="true"></i>'."</td>
                                    <td>".'<i class="fa fa-' . ($row['security'] ? 'check' : 'times') .'" aria-hidden="true"></i>'."</td>
                                    <td>".'<i class="fa fa-' . ($row['machine'] ? 'check' : 'times') .'" aria-hidden="true"></i>'."</td>
                                    <td>".'<i class="fa fa-' . ($row['internet'] ? 'check' : 'times') .'" aria-hidden="true"></i>'."</td>
                                </tr>";
                            }
                        }
                                echo '</tbody>
                            </table>
                        </div>

                    </div>
                </div>
        </section>';
            }
            ?>
        
<?php   
        if($_SERVER['REQUEST_METHOD']=='GET')
            echo '
        <section id="contact" style="">
                <div class="container">
                    <div class="row">
                        <div class="about_our_company" style="margin-bottom: 10px;">
                            <h1 style="color:bbb; font-size:50px">Admin Home Page</h1>
                            <div class="titleline-icon"><br><font size=3px><u><a href="logout.php">Log out?</a></u></font></div>
                            <p style="color:white; font-size:30px">Please enter your search query:</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-offset-2">
                            <form name="sentMessage" method="POST" id="contactForm" novalidate="">

                                <div class="form-group form-inline" style="color:white;font-size:25px">
                                    <label class="control-label">
                                        Minimum Years of Experience
                                    </label>
                                   <select class="form-control" name="yoe">
                                       <option value="1">No experience</option>
                                       <option value="2">1-3 Years</option>
                                       <option value="3">4-6 Years</option>
                                       <option value="4">7-10 Years</option>
                                       <option value="5">10+ Years</option>
                                    </select>
                                </div>
                                <div class="col-sm-offset-2">
                                    <div class="form-group form-inline">
                                        <label class="h3 control-label">
                                            <input class="form-control" type="checkbox" value="1" name="office"/>
                                            Office suite
                                        </label>
                                    </div>

                                    <div class="form-group form-inline">
                                        <label class="h3 control-label">
                                            <input class="form-control" type="checkbox" value="1" name="web"/>
                                            Web Development
                                        </label>
                                    </div>

                                    <div class="form-group form-inline">
                                        <label class="h3 control-label">
                                            <input class="form-control" type="checkbox" value="1" name="app"/>
                                            App Development
                                        </label>
                                    </div>

                                    <div class="form-group form-inline">
                                        <label class="h3 control-label">
                                            <input class="form-control" type="checkbox" value="1" name="data"/>
                                            Data Analysis
                                        </label>
                                    </div>

                                    <div class="form-group form-inline">
                                        <label class="h3 control-label">
                                            <input class="form-control" type="checkbox" value="1" name="machine"/>
                                            Machine Learning
                                        </label>
                                    </div>

                                    <div class="form-group form-inline">
                                        <label class="h3 control-label">
                                            <input class="form-control" type="checkbox" value="1" name="internet"/>
                                            Internet of things
                                        </label>
                                    </div>

                                    <div class="form-group form-inline">
                                        <label class="h3 control-label">
                                            <input class="form-control" type="checkbox" value="1" name="security"/>
                                            Security
                                        </label>
                                    </div>

                                    <div class="form-group form-inline">
                                        <label class="h3 control-label">
                                            <input class="form-control" type="checkbox" value="1" name="design"/>
                                            Design & Illustrations
                                        </label>
                                    </div>
                                </div>
                                
                                <div class="clearfix"></div>
                                <div class="col-lg-12 text-center">
                                    <div id="success"></div>
                                    <button type="submit" class="btn btn-xl get"> <img src="searchbutton.jpg" alt="search" height=40 width=180/></button>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>

            </section>';
        ?>
        </body>
</html>
