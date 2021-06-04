<?php

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST['fname']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['person']) && isset($_POST['date']) && isset($_POST['time']) && isset($_POST['allergyF'])) {
    $fname = $_POST['fname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $person = $_POST['person'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $allergyF = $_POST['allergyF'];
    $header = "Table Reserve";
    $email_host = "supasin.s1t@gmail.com";
    $email_content = "<body style='margin:0;padding:0;'>
        <table role='presentation' style='width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#ffffff;'>
            <tr>
                <td align='center' style='padding:0;'>
                    <table role='presentation' style='width:602px;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align:left;'>
                        <tr>
                            <td align='center' style='padding:40px 0 30px 0; background-color: #393d41;color: #ffff;'>
                           <img src='https://i.ibb.co/X2RkKBw/logo.png' alt='logo' border='0' width='250'>
                            </td>
                        </tr>
                        <tr>
                            <td style='padding:30px;'>
                                <table role='presentation' style='width:100%;border-collapse:collapse;border:0;border-spacing:0;'>
                                    <tr>
                                        <td style='padding:0;color:#153643;'>
                                            <p style='margin:0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;'>
                                                <h3>name : $fname</h3>
                                                <h3>phone : $phone</h3>
                                                <h3>email : $email</h3>
                                                <h3>date : $date</h3>
                                                <h3>time : $time</h3>
                                                <h3>person : $person</h3>
                                                <h3>food allergy : $allergyF</h3>
                                            </p>
                                            <h4 style='color: green; font-size: 16px;text-align: center;'>Thanks for table reserve, Please wait for a response from the staff.</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td style='padding:30px; background-color: #393d41'>
                                <table role='presentation' style='width:100%;border-collapse:collapse;border:0;border-spacing:0;font-size:9px;font-family:Arial,sans-serif;'>
                                    <tr>
                                        <td style='padding:0;width:100%;' align='center'>
                                            <p style='margin:0;font-size:14px;line-height:16px;font-family:Arial,sans-serif;color:#ffffff;'>
                                                Copyright © 2021 by <a href='https://www.in2it.co.th/' target='_blank' style='text-decoration: none; color: #ffff;'>IN2IT Company</a>. All Rights Reserved.
                                            </p>
                                        </td>
    
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>";

    require_once "PHPMailer/PHPMailer.php";
    require_once "PHPMailer/SMTP.php";
    require_once "PHPMailer/Exception.php";

    $mail = new PHPMailer();

    // SMTP Settings
    $mail->CharSet = 'UTF-8';
    $mail->isSMTP();
    $mail->Host = "http://www.blackitch.com/";
    $mail->SMTPAuth = true;
    $mail->Username = "supasin.s1t@gmail.com"; // enter your email address
    $mail->Password = "fofyf17041998boybandfedfe"; // enter your password
    $mail->Port = 465;
    $mail->SMTPSecure = "ssl";

    //Email Settings
    $mail->isHTML(true);
    $mail->setFrom($email_host, 'blackitch');
    $mail->addAddress('supasin.s1t@gmail.com', 'blackitch'); // Send to mail : user
    $mail->addAddress('supasin@in2it.co.th', 'blackitch'); // Send to mail : admin blackitch
    $mail->addReplyTo($email, $fname);
    $mail->Subject = $header;
    $mail->Body = $email_content;
    if ($mail->send()) {
        $status = "success";
        $response = "Email is sent";
    } else {
        $status = "failed";
        $response = "Something is wrong" . $mail->ErrorInfo;
    }

    exit(json_encode(array("status" => $status, "response" => $response)));
} else {
    echo "failed !!";
}
