<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    $isSent=false;
    $info='some text';
    $filePath = "temp_files/123.PNG";
    $shortname="123.PNG";
    $maxFileSize= 2097152;

    $supported_file_types=array(
        'image/jpeg',
        'image/jpg',
        'image/png',
        'image/gif',
        'text/plain',
        'application/pdf',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document'

    );

    function my_data_sanitize($str)
    {
        return filter_var($str, FILTER_SANITIZE_STRING);
    }

    function generateRandomString($length = 5) {
        $characters = '0123456789_abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = 'IMG';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    function uploadImage($imageTagName)
    {
        global $info, $filePath, $maxFileSize, $supported_file_types, $shortname ;

        if (count($_FILES[$imageTagName]['name']) > 0)
        {
            $tmpFilePath = $_FILES[$imageTagName]['tmp_name'];
            if($tmpFilePath != "")
            {
                $shortname = generateRandomString().$_FILES[$imageTagName]['name'];
                $filePath = "temp_files/".$shortname;

                if ( !in_array( strtolower( $_FILES[$imageTagName]['type'] ) , $supported_file_types ) )
                {
                    $info = 'Only PNG, JPEG, GIF, DOCX, TXT, PDF files are supported.';
                }

                else if ( $_FILES[$imageTagName]['size'] > $maxFileSize) 
                {
                    $info = 'Max file size would be 2 MB.';
                }

                else if(move_uploaded_file($tmpFilePath, $filePath)) {
                    // print_r($_FILES[$imageTagName]);
                    $info='Image uploaded successfully. ';
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
            $email->SetFrom('noreply@dzquest.org', 'dzquest.org'); //Name is optional
            $email->isHTML(true); 
            $email->Subject = 'Dzquest Update';
            // $email->Body = 'test';
            $email->Body = $bodytext;
            $email->AddAddress( 'imranashik50@gmail.com' );
            $email->addCC('mysticyagami7@gmail.com ');

            if ( file_exists( $filePath ) )
            {
                $email->AddAttachment( $filePath , $shortname ); //('folder/abc.pdf', 'abc.pdf')
            }

            if ( $info != 'Max file size would be 2 MB.' )
            {
                $email->Send();

                $info='Successfully sent.';
                $isSent=True;
                $_POST = array();
            }
        }

        catch (Exception $e) 
        {
            // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            $info='Sorry!! Something went wrong.';
        }
    }
?>