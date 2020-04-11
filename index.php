<?php
    require_once('PHPMailer/src/PHPMailer.php');

    require 'head.php';
    require 'validationAndMail.php';
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
                <p>
                    To invest in individuals in key moments of your lives, as we believe these key moments will shape your future and the type of person you become. Our hope is that by lending a hand to lift you out of a crisis situation, you will pay it forward when the time comes by helping others in need.
                </p>
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
                                    <p> 10/07/2019 </p>
                                </div>
                                <div class="locationSpecific">
                                    <p> USA </p>
                                </div>
                            </div>
                            <div class="capsule">
                                <div class="date">
                                    <p> 09/12/2019 </p>
                                </div>
                                <div class="locationSpecific">
                                    <p> Germany </p>
                                </div>
                            </div>
                            <div class="capsule">
                                <div class="date">
                                    <p> 07/13/2019 </p>
                                </div>
                                <div class="locationSpecific">
                                    <p> UK </p>
                                </div>
                            </div>
                            <div class="capsule">
                                <div class="date">
                                    <p> 08/01/2017 </p>
                                </div>
                                <div class="locationSpecific">
                                    <p> Vietnam </p>
                                </div>
                            </div>
                            <div class="capsule">
                                <div class="date">
                                    <p> 02/15/2017 </p>
                                </div>
                                <div class="locationSpecific">
                                    <p> USA </p>
                                </div>
                            </div>
                            <div class="capsule">
                                <div class="date">
                                    <p> 09/06/2016 </p>
                                </div>
                                <div class="locationSpecific">
                                    <p> Ukraine </p>
                                </div>
                            </div>
                            <div class="capsule">
                                <div class="date">
                                    <p> 08/28/2016 </p>
                                </div>
                                <div class="locationSpecific">
                                    <p> Jordan </p>
                                </div>
                            </div>
                            <div class="capsule">
                                <div class="date">
                                    <p> 08/11/2016 </p>
                                </div>
                                <div class="locationSpecific">
                                    <p> Greece </p>
                                </div>
                            </div>
                            <div class="capsule">
                                <div class="date">
                                    <p> 07/20/2016 </p>
                                </div>
                                <div class="locationSpecific">
                                    <p> Portugal </p>
                                </div>
                            </div>
                            <div class="capsule">
                                <div class="date">
                                    <p> 07/14/2016 </p>
                                </div>
                                <div class="locationSpecific">
                                    <p> Spain </p>
                                </div>
                            </div>
                            <div class="capsule">
                                <div class="date">
                                    <p> 06/22/2016 </p>
                                </div>
                                <div class="locationSpecific">
                                    <p> Morocco </p>
                                </div>
                            </div>
                            <div class="capsule">
                                <div class="date">
                                    <p> 06/14/2016 </p>
                                </div>
                                <div class="locationSpecific">
                                    <p> UK </p>
                                </div>
                            </div>
                            <div class="capsule">
                                <div class="date">
                                    <p> 04/03/2016 </p>
                                </div>
                                <div class="locationSpecific">
                                    <p> Panama </p>
                                </div>
                            </div>
                            <div class="capsule">
                                <div class="date">
                                    <p> 07/03/2015 </p>
                                </div>
                                <div class="locationSpecific">
                                    <p> Ukraine </p>
                                </div>
                            </div>
                            <div class="capsule">
                                <div class="date">
                                    <p> 08/21/2014 </p>
                                </div>
                                <div class="locationSpecific">
                                    <p> Panama </p>
                                </div>
                            </div>
                            <div class="capsule">
                                <div class="date">
                                    <p> 07/21/2014 </p>
                                </div>
                                <div class="locationSpecific">
                                    <p> USA </p>
                                </div>
                            </div>
                            <div class="capsule">
                                <div class="date">
                                    <p> 04/01/2020 </p>
                                </div>
                                <div class="locationSpecific">
                                    <p> USA </p>
                                </div>
                            </div>
                            <div class="capsule">
                                <div class="date">
                                    <p> 10/23/2019 </p>
                                </div>
                                <div class="locationSpecific">
                                    <p> Mexico </p>
                                </div>
                            </div>
                            <div class="capsule">
                                <div class="date">
                                    <p> 10/02/2019 </p>
                                </div>
                                <div class="locationSpecific">
                                    <p> Hong-Kong </p>
                                </div>
                            </div>
                            <div class="capsule">
                                <div class="date">
                                    <p> 09/17/2019 </p>
                                </div>
                                <div class="locationSpecific">
                                    <p> Turkey </p>
                                </div>
                            </div>
                            <div class="capsule">
                                <div class="date">
                                    <p> 09/08/2019 </p>
                                </div>
                                <div class="locationSpecific">
                                    <p> Hong-Kong </p>
                                </div>
                            </div>
                            <div class="capsule">
                                <div class="date">
                                    <p> 08/15/2019 </p>
                                </div>
                                <div class="locationSpecific">
                                    <p> Vietnam </p>
                                </div>
                            </div>
                            <div class="capsule">
                                <div class="date">
                                    <p> 07/15/2019 </p>
                                </div>
                                <div class="locationSpecific">
                                    <p> Indonesia </p>
                                </div>
                            </div>
                            <div class="capsule">
                                <div class="date">
                                    <p> 06/22/2019 </p>
                                </div>
                                <div class="locationSpecific">
                                    <p> Turkey </p>
                                </div>
                            </div>
                            <div class="capsule">
                                <div class="date">
                                    <p> 05/01/2019 </p>
                                </div>
                                <div class="locationSpecific">
                                    <p> Portugal </p>
                                </div>
                            </div>

                    </div>

                    <!-- First Row Ends  -->


                    <!-- Second Row Starts  -->

                    <div id="row2">
                        <div class="capsule">
                            <div class="date">
                                <p> 10/28/2018 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> Mexico </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 09/03/2018 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> Hong-Kong </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 08/28/2018 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> Philippines </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 07/16/2018 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> Indonesia </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 05/21/2018 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> China </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 04/05/2018 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> Thailand </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 04/01/2018 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> Qatar </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 03/12/2018 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> Netherlands </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 02/27/2018 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> Mexico </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 02/20/2018 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> USA </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 12/20/2017 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> Colombia </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 11/23/2017 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> France </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 11/11/2017 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> Netherlands </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 11/01/2017 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> Spain </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 10/21/2017 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> UK </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 09/25/2017 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> USA </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 09/17/2017 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> Japan </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 08/22/2017 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> Indonesia </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 07/01/2017 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> Myanmar </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 06/04/2017 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> Thailand </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 05/07/2017 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> Spain </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 05/01/2017 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> USA </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 04/03/2017 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> Colombia </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 03/13/2017 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> Mexico </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 02/07/2017 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> France </p>
                            </div>
                        </div>

                    </div>

                    <!-- Second Row Ends  -->

                    <!-- Third Row Starts  -->

                    <div id="row3">

                        <div class="capsule">
                            <div class="date">
                                <p> 01/23/2017 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> Spain </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 12/29/2016 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> Ukraine </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 12/13/2016 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> South-Africa </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 12/10/2016 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> China </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 12/04/2016 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> Singapore </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 12/01/2016 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> Malaysia </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 11/20/2016 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> Cambodia </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 10/19/2016 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> India </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 10/16/2016 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> UAE </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 10/10/2016 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> Czech-Republic </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 10/08/2016 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> Austria </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 10/02/2016 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> Belgium </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 09/18/2016 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> UK </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 09/02/2016 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> Israel </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 07/30/2016 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> Germany </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 05/14/2016 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> USA </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 01/04/2016 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> Colombia </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 10/03/2015 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> Mexico </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 09/16/2015 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> USA </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 08/15/2015 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> Poland </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 07/16/2015 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> Germany </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 06/15/2015 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> Italy </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 05/12/2015 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> Poland </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 05/01/2015 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> Thailand </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 04/21/2015 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> Germany </p>
                            </div>
                        </div>

                    </div>

                    <div class="row4">

                        <div class="capsule">
                            <div class="date">
                                <p> 03/15/2015 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> USA </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 02/11/2015 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> Colombia </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 02/01/2015 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> UK </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 01/06/2015 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> Mexico </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 12/20/2014 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> USA </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 11/01/2014 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> Brazil </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 10/20/2014 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> Uruguay </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 10/01/2014 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> Argentina </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 09/15/2014 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> Chile </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 09/01/2014 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> Peru </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 08/11/2014 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> Costa </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 06/29/2014 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> Ukraine </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 05/10/2014 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> Hungary </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 04/09/2014 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> Germany </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 01/26/2014 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> Spain </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 01/21/2014 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> Germany </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 01/14/2014 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> Netherlands </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 01/10/2014 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> Belgium </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 01/02/2014 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> UK </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 12/19/2013 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> Italy </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 12/17/2013 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> Austria </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 11/20/2013 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> Turkey </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 11/01/2013 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> Egypt </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 7/20/2013 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> UK </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 05/16/2013 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> Israel </p>
                            </div>
                        </div>
                        <div class="capsule">
                            <div class="date">
                                <p> 05/07/2013 </p>
                            </div>
                            <div class="locationSpecific">
                                <p> France </p>
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

                <p>The dzQuest provides resources and accommodations to young travelers who find themselves stranded and out of options. The nonprofit organization founded by David Zandi, a young professional photographer and world traveler who has made it his mission to help young travelers across the globe who need immediate aid and emergency assistance. We help U.S. and E.U. citizens ages 18 to 30 stranded overseas when borders close due to global pandemics, natural disasters, and wars. We do this by booking flights back to the U.S. and E.U. and providing accommodations, food and mobile devices.</p>
            </div>
            <div class="textDiv">

                <div class="text-right text-danger closeButton"> 
                    <i class="fa fa-close" style="font-size:26px"></i> 
                </div>

                <div>
                    <p>
                        If you are a U.S. or E.U. citizen between the age of 18 to 30 and you are currently stranded in South or Central America or Asia and need to get home, we will book you a flight back home. If you are in a country that has closed its border, leaving you stranded, we will cover your entire cost of living for as long as you are stuck, until the borders are reopen and you can get home.
                    </p>
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

<?php require 'remover.php'; ?>