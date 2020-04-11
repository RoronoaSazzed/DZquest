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
            '<div style="margin: 10px;">
                <div style="text-align: center;">
                    <h3> Response from Contact page </h3>
                </div>

                    <p>First Name : <mark>'. my_data_sanitize($_POST["contact_fastname"]) .'</mark></p><br>
                    <p>Last Name : <mark>'. my_data_sanitize($_POST["contact_lastname"]) .'</mark></p><br>
                    <p>E-Mail Address : <mark>'. my_data_sanitize($_POST["contact_email"]) .'</mark></p><br>
                    <p>Telephone number : <mark>'. my_data_sanitize($_POST["contact_phone"]) .'</mark></p><br>
                    <p>Message : <mark>'. my_data_sanitize($_POST["contact_message"]) .'</mark></p><br>


                    <p>Note: <b>This is an automatic response. Do not reply to this mail.</b></p>
                    <br>
                    <p> - DZquest Development team. </p>
            </div>';

        echo $mailBody;

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
            '<div style="margin: 10px;">
                <div style="text-align: center;">
                    <h3> Response from Get-Help page </h3>
                </div>

                    <p>First Name : <mark>'. my_data_sanitize($_POST["fistname"]) .'</mark></p><br>
                    <p>Last Name : <mark>'. my_data_sanitize($_POST["lastname"]) .'</mark></p><br>
                    <p>E-Mail Address : <mark>'. my_data_sanitize($_POST["email"]) .'</mark></p><br>
                    <p>Telephone number : <mark>'. my_data_sanitize($_POST["phone"]) .'</mark></p><br>

                    <p>City : <mark>'. my_data_sanitize($_POST["city"]) .'</mark></p><br>
                    <p>Country : <mark>'. my_data_sanitize($_POST["country"] ).'</mark></p><br>
                    <p>Current Location : <mark>'. my_data_sanitize($_POST["location"] ).'</mark></p><br>

                    <p>Message : <mark>'. my_data_sanitize($_POST["message"]) .'</mark></p><br>


                    <p>Note: <b>This is an automatic response. Do not reply to this mail.</b></p>
                    <br>
                    <p> - DZquest Development team. </p>
            </div>';

        echo $mailBody;

        // mailSend( $mailBody );
    }
 }


?>