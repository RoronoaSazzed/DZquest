<?php

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