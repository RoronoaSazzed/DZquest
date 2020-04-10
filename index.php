<?php
    require_once('PHPMailer/src/PHPMailer.php');

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    $isSent=false;
    $info='some text';
    $filePath = "temp_files/123.PNG";
    $shortname="123.PNG";
    $maxFileSize= 19097152;

    $supported_file_types=array(
        'image/jpeg',
        'image/jpg',
        'image/png',
        'image/gif',
        'text/plain',
        'application/pdf',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document'

    );

    function uploadImage($imageTagName)
    {
        global $info, $filePath, $maxFileSize, $supported_file_types ;

        if (count($_FILES[$imageTagName]['name']) > 0)
        {
            $tmpFilePath = $_FILES[$imageTagName]['tmp_name'];
            if($tmpFilePath != "")
            {
                $filePath = "temp_files/".$_FILES[$imageTagName]['name'];
                $shortname = $_FILES[$imageTagName]['name'];

                if ( !in_array( strtolower( $_FILES[$imageTagName]['type'] ) , $supported_file_types ) )
                {
                    $info = 'Only PNG, JPEG, GIF, DOCX, TXT, PDF files are supported.';
                }

                else if ( $_FILES[$imageTagName]['size'] > $maxFileSize) 
                {
                    $info = 'Max file size would be 19 MB.';
                }

                else if(move_uploaded_file($tmpFilePath, $filePath)) {
                    // print_r($_FILES[$imageTagName]);
                    $info='Image uploaded uccessfully. ';
                }
            }
        }
    }


    function mailSend($bodytext)
    {
        global $isSent, $info, $filePath, $shortname ;

        try
        {
            $email = new PHPMailer();
            $email->SetFrom('david@dzquest.org', 'dzquest.org'); //Name is optional
            $email->Subject = 'Dzquest Update';
            // $email->Body = 'test';
            $email->Body = $bodytext;
            $email->AddAddress( 'imranashik50@gmail.com' );

            $email->AddAttachment( $filePath , $shortname ); //('folder/abc.pdf', 'abc.pdf')

            $email->Send();

            $info='Successfully sent.';
            $isSent=True;
            $_POST = array();
        }

        catch (Exception $e) 
        {
            // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            $info='Sorry!! Something went wrong.';
        }
    }
?>

<?php

 if (isset($_POST["formName"]) && $_POST["formName"]=="contact")
 {
    // echo 'yes';

    if ( empty( $_POST["contact_fastname"] ) )
    {
        $info = 'Please enter First Name';
    }
    else if ( empty( $_POST["contact_lastname"] ) )
    {
        $info = 'Please enter Last Name';
    }
    else if ( empty( $_POST["contact_email"] ) || !filter_var( $_POST["contact_email"] , FILTER_VALIDATE_EMAIL) )
    {
        $info = 'Please enter Email properly';
    }
    else if ( empty( $_POST["contact_phone"] ) )
    {
        $info = 'Please enter Telephone number';
    }
    else if ( empty( $_POST["contact_message"] ) )
    {
        $info = 'Please enter Message';
    }
    else
    {
        uploadImage('contact_image');
        $mailBody=
        '<html>
        <head>
            <title>Mail response</title>
        </head>
        <body>

            <div>
                <div style="text-align: center;">
                    <h3> Response from Contact page </h3>
                </div>

                    <p>First Name : <mark>'+ $_POST["contact_fastname"] +'</mark></p><br>
                    <p>Last Name : <mark>'+ $_POST["contact_lastname"] +'</mark></p><br>
                    <p>E-Mail Address : <mark>'+ $_POST["contact_email"] +'</mark></p><br>
                    <p>Telephone number : <mark>'+ $_POST["contact_phone"] +'</mark></p><br>
                    <p>Message : <mark>'+ $_POST["contact_message"] +'</mark></p><br>


                    <p>Note: <b>This is an automatic response. Do not reply to this mail.</b></p>
                    <br>
                    <p> - DZquest Development team. </p>
            </div>

        </body>
        </html>';

        // mailSend( $mailBody );
    }

 }
 else if (isset($_POST["formName"]) && $_POST["formName"]=="get help")
 {
    // echo 'yes-one';

    if ( empty( $_POST["fistname"] ) )
    {
        $info = 'Please enter First Name';
    }
    else if ( empty( $_POST["lastname"] ) )
    {
        $info = 'Please enter Last Name';
    }
    else if ( empty( $_POST["email"] ) || !filter_var( $_POST["email"] , FILTER_VALIDATE_EMAIL) )
    {
        $info = 'Please enter Email properly';
    }
    else if ( empty( $_POST["phone"] ) )
    {
        $info = 'Please enter Telephone number';
    }
    else if ( empty( $_POST["city"] ) )
    {
        $info = 'Please enter City';
    }
    else if ( empty( $_POST["country"] ) )
    {
        $info = 'Please enter Country';
    }
    else if ( empty( $_POST["location"] ) )
    {
        $info = 'Please enter Current Location';
    }
    else if ( empty( $_POST["message"] ) )
    {
        $info = 'Please enter Message';
    }
    else
    {
        uploadImage('image');

        $mailBody=
        '<html>
        <head>
            <title>Mail response</title>
        </head>
        <body>

            <div>
                <div style="text-align: center;">
                    <h3> Response from Get-Help page </h3>
                </div>

                    <p>First Name : <mark>'+ $_POST["fistname"] +'</mark></p><br>
                    <p>Last Name : <mark>'+ $_POST["lastname"] +'</mark></p><br>
                    <p>E-Mail Address : <mark>'+ $_POST["email"] +'</mark></p><br>
                    <p>Telephone number : <mark>'+ $_POST["phone"] +'</mark></p><br>

                    <p>City : <mark>'+ $_POST["city"] +'</mark></p><br>
                    <p>Country : <mark>'+ $_POST["country"] +'</mark></p><br>
                    <p>Current Location : <mark>'+ $_POST["location"] +'</mark></p><br>

                    <p>Message : <mark>'+ $_POST["message"] +'</mark></p><br>


                    <p>Note: <b>This is an automatic response. Do not reply to this mail.</b></p>
                    <br>
                    <p> - DZquest Development team. </p>
            </div>

        </body>
        </html>';

        // mailSend( $mailBody );
    }
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
        <?php
            if ($info != 'some text')
                {
        ?>
            <div class="row alert-div">

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
        <?php } ?>

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
                        required>
                    </div>
                    <div class="two">
                        <input type="text" placeholder="Last Name" name="contact_lastname" value="<?php 
                                        if ( isset($_POST["contact_lastname"]) && !$isSent)
                                        {
                                            echo $_POST["contact_lastname"];
                                        }
                                    ?>"
                        required>
                    </div>
                </div>

                <!-- Mail + Phone No -->

                <div class="customForm">
                    <div class="one">
                        <input type="email" placeholder="E-Mail Address" name="contact_email" value="<?php 
                                        if ( isset($_POST["contact_email"]) && !$isSent)
                                        {
                                            echo $_POST["contact_email"];
                                        }
                                    ?>" 
                         required>
                    </div>
                    <div class="two">
                        <input type="tel" placeholder="Telephone number" name="contact_phone"
                        value="<?php 
                                        if ( isset($_POST["contact_phone"]) && !$isSent)
                                        {
                                            echo $_POST["contact_phone"];
                                        }
                                    ?>"
                         required>
                    </div>
                </div>

                <!-- Message Section -->
            <textarea rows="4" name="contact_message" placeholder="Your message" required><?php 
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
                            required>
                        </div>
                        <div class="two">
                            <input type="text" placeholder="Last Name" name="lastname"
                            value="<?php 
                                        if ( isset($_POST["lastname"]) && !$isSent)
                                        {
                                            echo $_POST["lastname"];
                                        }
                                    ?>"
                            required>
                        </div>
                    </div>

                    <!-- Mail + Phone No -->

                    <div class="customForm">
                        <div class="one">
                            <input type="email" placeholder="E-Mail Address" name="email"
                            value="<?php 
                                        if ( isset($_POST["email"]) && !$isSent)
                                        {
                                            echo $_POST["email"];
                                        }
                                    ?>"
                            required>
                        </div>
                        <div class="two">
                            <input type="tel" placeholder="Telephone number" name="phone"
                            value="<?php 
                                        if ( isset($_POST["phone"]) && !$isSent)
                                        {
                                            echo $_POST["phone"];
                                        }
                                    ?>"
                            required>
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
                             required>
                        </div>
                        <div class="country">
                            <input type="text" placeholder="Country" name="country" 
                            value="<?php 
                                        if ( isset($_POST["country"]) && !$isSent)
                                        {
                                            echo $_POST["country"];
                                        }
                                    ?>"
                            required>
                        </div>
                        <div class="currentLocation">
                            <input type="text" placeholder="Current Location" name="location" value="<?php 
                                        if ( isset($_POST["location"]) && !$isSent)
                                        {
                                            echo $_POST["location"];
                                        }
                                    ?>"
                            required>
                        </div>
                    </div>





                    <!-- Message Section -->
                    <textarea rows="4" name="message" placeholder="Your message" required><?php 
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

if ( file_exists( $filePath ) )
    {
        unlink($filePath);
    }

?>