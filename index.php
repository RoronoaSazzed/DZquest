<?php
    require_once('PHPMailer/src/PHPMailer.php');
    $isSent=false;
    $info='some text';

    $supported_file_types=array(
        'image/jpeg',
        'image/png',
        'image/gif',
        'text/plain',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document'

    );
?>

<?php

 if (isset($_POST["formName"]) && $_POST["formName"]=="contact")
 {
    echo 'yes';

    if (count($_FILES['contact_image']['name']) > 0)
    {
        $tmpFilePath = $_FILES['contact_image']['tmp_name'];
        if($tmpFilePath != "")
        {
            $shortname = $_FILES['contact_image']['name'];
            $filePath = "temp_files/".$_FILES['contact_image']['name'];

            if ( !in_array( $_FILES['contact_image']['type'] , $supported_file_types ) )
            {
                $info = 'Only PNG, JPEG, GIF, DOCX, TXT files are supported.';
            }

            else if(move_uploaded_file($tmpFilePath, $filePath)) {

                // echo '<br>uploaded: '+$shortname;
                // echo '-> '+$_FILES['contact_image']['size'];
                print_r($_FILES['contact_image']);

            }
        }
    }
 }
 else if (isset($_POST["formName"]) && $_POST["formName"]=="get help")
 {
    echo 'yes1';
 }


?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="css/bootstrap-reboot.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="images/Fevicon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">




    <!-- Website Title -->
    <title>dzQuest</title>

</head>

<body>

    <div class="container-fluid landing">
        <div class="row" style="z-index: 100; position: absolute;">

            <div class="alert alert-dismissible col-md-12
            <?php
            if ($isSent)
            {
                echo 'alert-success';
            }
            else
            {
                echo 'alert-danger';
            }
            ?>
            ">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong><?php echo $info; ?></strong>
            </div>
            
        </div>
        <div id="cover" class="row">
            <div>
                <a href="http://dzquest.org/"><img src="images/DZQuest.png" alt="Not Found"></a>
            </div>
            <div class="commonCharacteristics" id="c1">
                <h3>Contact</h3>
            </div>
            <div class="commonCharacteristics" id="c2">
                <h3>Values</h3>
            </div>
            <div class="commonCharacteristics" id="c3">
                <h3>Locations</h3>
            </div>
            <div class="commonCharacteristics" id="c4">
                <h3>Mission</h3>
            </div>
            <div class="commonCharacteristics" id="c5">
                <h3>Get Help</h3>
            </div>
            <div class="textDiv">

                <div class="text-right text-danger closeButton"> 
                    <i class="fa fa-close" style="font-size:26px"></i> 
                </div>
                <!-- Name Section -->

                <form method="post" enctype="multipart/form-data">

                <div class="customForm">
                    <div class="one">
                        <input type="text" placeholder="First Name" name="contact_fastname" value="<?php 
                                        if ( isset($_POST["contact_fastname"]) && !$isSent)
                                        {
                                            echo $_POST["contact_fastname"];
                                        }
                                    ?>"
                        >
                    </div>
                    <div class="two">
                        <input type="text" placeholder="Last Name" name="contact_lastname" value="<?php 
                                        if ( isset($_POST["contact_lastname"]) && !$isSent)
                                        {
                                            echo $_POST["contact_lastname"];
                                        }
                                    ?>"
                        >
                    </div>
                </div>

                <!-- Mail + Phone No -->

                <div class="customForm">
                    <div class="one">
                        <input type="email" placeholder="Mail Address" name="contact_email" value="<?php 
                                        if ( isset($_POST["contact_email"]) && !$isSent)
                                        {
                                            echo $_POST["contact_email"];
                                        }
                                    ?>" 
                         >
                    </div>
                    <div class="two">
                        <input type="tel" placeholder="Telephone number" name="contact_phone"
                        value="<?php 
                                        if ( isset($_POST["contact_phone"]) && !$isSent)
                                        {
                                            echo $_POST["contact_phone"];
                                        }
                                    ?>"
                         >
                    </div>
                </div>

                <!-- Message Section -->
                <textarea rows="4" name="contact_message" placeholder="Your message"><?php 
                            if ( isset($_POST["contact_message"]) && !$isSent)
                            {
                                echo $_POST["contact_message"];
                            }
                        ?></textarea>
                <!-- Attachment Section -->
                <input type="file" name="contact_image">
                <input type="text" hidden name="formName" value="contact">
                <input class="submitBtn" type="submit" value="Send">

            </form>
            </div>
            <div class="textDiv">
                <div class="text-right text-danger closeButton"> 
                    <i class="fa fa-close" style="font-size:26px"></i> 
                </div>
                <p>To invest in individuals in key moments of their lives and provide them with support in their most critical time of need.</p>
            </div>
            <div class="textDiv">

                <div class="text-right text-danger closeButton"> 
                    <i class="fa fa-close" style="font-size:26px"></i> 
                </div>

                <div id="locations">

                    <!-- First Row Starts  -->

                    <div id="row1">

                        <div class="capsule">
                            <div class="date">
                                <p>04/01/2020</p>
                            </div>
                            <div class="locationSpecific">
                                <p>Miami, FL</p>
                            </div>
                        </div>

                        <div class="capsule">
                            <div class="date">
                                <p>02/26/2020</p>
                            </div>
                            <div class="locationSpecific">
                                <p>Cancun, Mexico</p>
                            </div>
                        </div>

                        <div class="capsule">
                            <div class="date">
                                <p>11/24/2019</p>
                            </div>
                            <div class="locationSpecific">
                                <p>Puerto Escondido, Mexico</p>
                            </div>
                        </div>

                        <div class="capsule">
                            <div class="date">
                                <p>10/23/2019</p>
                            </div>
                            <div class="locationSpecific">
                                <p>Mexico City, Mexico</p>
                            </div>
                        </div>

                        <div class="capsule">
                            <div class="date">
                                <p>10/02/2019</p>
                            </div>
                            <div class="locationSpecific">
                                <p>Hong Kong, China</p>
                            </div>
                        </div>

                        <div class="capsule">
                            <div class="date">
                                <p>09/17/2019</p>
                            </div>
                            <div class="locationSpecific">
                                <p>Istanbul, Turkey</p>
                            </div>
                        </div>

                        <div class="capsule">
                            <div class="date">
                                <p>09/12/2019</p>
                            </div>
                            <div class="locationSpecific">
                                <p>Köln, Germany</p>
                            </div>
                        </div>

                        <div class="capsule">
                            <div class="date">
                                <p>09/08/2019 </p>
                            </div>
                            <div class="locationSpecific">
                                <p>Hong Kong, China</p>
                            </div>
                        </div>

                        <div class="capsule">
                            <div class="date">
                                <p>07/15/2019</p>
                            </div>
                            <div class="locationSpecific">
                                <p>Bali, Indonesia</p>
                            </div>
                        </div>

                        <div class="capsule">
                            <div class="date">
                                <p>07/13/2019</p>
                            </div>
                            <div class="locationSpecific">
                                <p>London, UK</p>
                            </div>
                        </div>

                        <div class="capsule">
                            <div class="date">
                                <p>06/22/2019</p>
                            </div>
                            <div class="locationSpecific">
                                <p>Istanbul, Turkey</p>
                            </div>
                        </div>

                        <div class="capsule">
                            <div class="date">
                                <p>05/01/2019</p>
                            </div>
                            <div class="locationSpecific">
                                <p>Lisbon, Portugal</p>
                            </div>
                        </div>

                    </div>

                    <!-- First Row Ends  -->


                    <!-- Second Row Starts  -->

                    <div id="row2">
                        <div class="capsule">
                            <div class="date">
                                <p>10/28/2018</p>
                            </div>
                            <div class="locationSpecific">
                                <p>Mexico City, Mexico</p>
                            </div>
                        </div>

                        <div class="capsule">
                            <div class="date">
                                <p>08/28/2018</p>
                            </div>
                            <div class="locationSpecific">
                                <p>Manila, Philipines</p>
                            </div>
                        </div>

                        <div class="capsule">
                            <div class="date">
                                <p>07/16/2018</p>
                            </div>
                            <div class="locationSpecific">
                                <p>Bali, Indonesia</p>
                            </div>
                        </div>

                        <div class="capsule">
                            <div class="date">
                                <p>07/18/2018</p>
                            </div>
                            <div class="locationSpecific">
                                <p>Huangshan, China</p>
                            </div>
                        </div>

                        <div class="capsule">
                            <div class="date">
                                <p>07/01/2018</p>
                            </div>
                            <div class="locationSpecific">
                                <p>Hangzhou, China</p>
                            </div>
                        </div>

                        <div class="capsule">
                            <div class="date">
                                <p>06/22/2018</p>
                            </div>
                            <div class="locationSpecific">
                                <p>Guilin, China</p>
                            </div>
                        </div>

                        <div class="capsule">
                            <div class="date">
                                <p>06/22/2018</p>
                            </div>
                            <div class="locationSpecific">
                                <p>Zhangye</p>
                            </div>
                        </div>

                        <div class="capsule">
                            <div class="date">
                                <p>06/08/2018</p>
                            </div>
                            <div class="locationSpecific">
                                <p>Tibet</p>
                            </div>
                        </div>

                        <div class="capsule">
                            <div class="date">
                                <p>05/21/2018</p>
                            </div>
                            <div class="locationSpecific">
                                <p>Beijing, China</p>
                            </div>
                        </div>

                        <div class="capsule">
                            <div class="date">
                                <p>04/05/2018</p>
                            </div>
                            <div class="locationSpecific">
                                <p>Bangkok, Thailand</p>
                            </div>
                        </div>

                        <div class="capsule">
                            <div class="date">
                                <p>04/01/2018</p>
                            </div>
                            <div class="locationSpecific">
                                <p>Doha, Qatar</p>
                            </div>
                        </div>

                        <div class="capsule">
                            <div class="date">
                                <p>03/12/2018</p>
                            </div>
                            <div class="locationSpecific">
                                <p>Amsterdams, Netherlands</p>
                            </div>
                        </div>


                    </div>

                    <!-- Second Row Ends  -->

                    <!-- Third Row Starts  -->

                    <div id="row3">

                        <div class="capsule">
                            <div class="date">
                                <p>02/27/2018</p>
                            </div>
                            <div class="locationSpecific">
                                <p>Cancun, Mexico</p>
                            </div>
                        </div>

                        <div class="capsule">
                            <div class="date">
                                <p>02/20/2018</p>
                            </div>
                            <div class="locationSpecific">
                                <p>New York, NY</p>
                            </div>
                        </div>

                        <div class="capsule">
                            <div class="date">
                                <p>01/28/2018</p>
                            </div>
                            <div class="locationSpecific">
                                <p>Medellin, Colombia</p>
                            </div>
                        </div>

                        <div class="capsule">
                            <div class="date">
                                <p>01/07/2018</p>
                            </div>
                            <div class="locationSpecific">
                                <p>Santa Marta, Colombia</p>
                            </div>
                        </div>

                        <div class="capsule">
                            <div class="date">
                                <p>12/20/2017</p>
                            </div>
                            <div class="locationSpecific">
                                <p>Medellin, Colombia</p>
                            </div>
                        </div>

                        <div class="capsule">
                            <div class="date">
                                <p>09/25/2017</p>
                            </div>
                            <div class="locationSpecific">
                                <p>New York, NY</p>
                            </div>
                        </div>

                        <div class="capsule">
                            <div class="date">
                                <p>09/17/2017</p>
                            </div>
                            <div class="locationSpecific">
                                <p>Japan</p>
                            </div>
                        </div>

                        <div class="capsule">
                            <div class="date">
                                <p>07/22/2017</p>
                            </div>
                            <div class="locationSpecific">
                                <p>Vietnam</p>
                            </div>
                        </div>




                    </div>

                    <!-- Third Row Ends  -->

                </div>
            </div>


            <div class="textDiv">

                <div class="text-right text-danger closeButton"> 
                    <i class="fa fa-close" style="font-size:26px"></i> 
                </div>

                <p>At dzQuest, our mission is to provide help and hope by giving immediate financial and non-financial aid to Americans who are stranded in foreign countries and are physically /financially unable to make their way back home. Our organization arranges their travel back so that they can quickly reunite with their families or support their living expenses overseas for as long as they need till they are able to return home.</p>
            </div>
            <div class="textDiv">

                <div class="text-right text-danger closeButton"> 
                    <i class="fa fa-close" style="font-size:26px"></i> 
                </div>

                <form method="post" enctype="multipart/form-data">

                    <div class="customForm">
                        <div class="one">
                            <input type="text" placeholder="First Name" name="fistname"
                            value="<?php 
                                        if ( isset($_POST["fistname"]) && !$isSent)
                                        {
                                            echo $_POST["fistname"];
                                        }
                                    ?>"
                            >
                        </div>
                        <div class="two">
                            <input type="text" placeholder="Last Name" name="lastname"
                            value="<?php 
                                        if ( isset($_POST["lastname"]) && !$isSent)
                                        {
                                            echo $_POST["lastname"];
                                        }
                                    ?>"
                            >
                        </div>
                    </div>

                    <!-- Mail + Phone No -->

                    <div class="customForm">
                        <div class="one">
                            <input type="email" placeholder="Mail Address" name="email"
                            value="<?php 
                                        if ( isset($_POST["email"]) && !$isSent)
                                        {
                                            echo $_POST["email"];
                                        }
                                    ?>"
                            >
                        </div>
                        <div class="two">
                            <input type="tel" placeholder="Telephone number" name="phone"
                            value="<?php 
                                        if ( isset($_POST["phone"]) && !$isSent)
                                        {
                                            echo $_POST["phone"];
                                        }
                                    ?>"
                            >
                        </div>
                    </div>


                    <!-- City + Country + Current Location -->

                    <div class="customForm">
                        <div class="city">
                            <input type="text" placeholder="City" name="city" 
                            value="<?php 
                                        if ( isset($_POST["city"]) && !$isSent)
                                        {
                                            echo $_POST["city"];
                                        }
                                    ?>"
                             >
                        </div>
                        <div class="country">
                            <input type="text" placeholder="Country" name="country" 
                            value="<?php 
                                        if ( isset($_POST["country"]) && !$isSent)
                                        {
                                            echo $_POST["country"];
                                        }
                                    ?>"
                            >
                        </div>
                        <div class="currentLocation">
                            <input type="text" placeholder="Current Location" name="location" value="<?php 
                                        if ( isset($_POST["location"]) && !$isSent)
                                        {
                                            echo $_POST["location"];
                                        }
                                    ?>"
                            >
                        </div>
                    </div>





                    <!-- Message Section -->
                    <textarea rows="4" name="message" placeholder="Your message"><?php 
                            if ( isset($_POST["message"]) && !$isSent)
                            {
                                echo $_POST["message"];
                            }
                        ?></textarea>
                    <!-- Attachment Section -->
                    <input type="file" name="image">
                    <input type="text" hidden name="formName" value="get help">
                    <input class="submitBtn" type="submit" value="Send">
                </form>
            </div>
        </div>
    </div>






    <!-- Optional JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/script.js"></script>
</body>

</html>

<?php

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// try
// {
//     $email = new PHPMailer();
//     $email->SetFrom('david@dzquest.org', 'David Zandi'); //Name is optional
//     $email->Subject   = 'Dzquest Update';
//     $email->Body      = 'test';
//     // $email->Body      = $bodytext;
//     $email->AddAddress( 'imranashik50@gmail.com' );

//     // $file_to_attach = 'PATH_OF_YOUR_FILE_HERE';

//     // $email->AddAttachment( $file_to_attach , 'NameOfFile.pdf' );

//     return $email->Send();
// }

// catch (Exception $e) {
//     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
// }

?>