<?php

// email template when user send ticket for operator
function tiva_user_send_ticket_for_operator_email_temp($operatorDispalyName, $userDispalyName, $dateTime)
{
    return '
    
<html lang="fa">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title></title>
        <style type="text/css">

          @import url("' . site_url() . '/blog/wp-content/themes/tiva/css/email-temp-fonts.css"); 

        *{
    font-family: IRANSans !important;
        }
</style>
    </head>
    <body>
    <table style="border-collapse:collapse;margin:auto;max-width:635px;min-width:320px;width:100%">
        <tbody>
        <tr>
            <td style="padding:0 20px" valign="top">
                <table style="border-collapse:collapse;border-radius:3px;color:#545454;border-bottom:1px solid #ddd;font-size:13px;line-height:20px;margin:0 auto;width:100%"
                       align="center" border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                    <tr>
                        <td valign="top">
                            <table style="border:none;border-collapse:separate;font-size:1px;height:50px;line-height:3px;width:100%"
                                   border="0" cellpadding="0" cellspacing="0">
                                <tbody>
                                <tr>
                                    <td style="background:#03a9f4;border-radius: 10px 10px 0 0;border:none;width:100%;font-weight:700;color:#fff;text-align:center;font-size:24px;height: 70px;" bgcolor="#fff">' . get_bloginfo('name') . '</td>
                                </tr>
                                </tbody>
                            </table>

                            <table style="border-collapse:collapse;border-color:#dddddd;border-radius:0 0 3px 3px;border-style:solid solid none;border-width:0 1px 1px;width:100%"
                                   border="0" cellpadding="0" cellspacing="0">
                                <tbody>
                                <tr>
                                    <td style="background:white;border-radius:0 0 3px 3px;color:#242323;font-size:15px;line-height:22px;overflow:hidden;padding:20px 40px 30px"
                                       bgcolor="white">
                                        <div style="margin-top:0;padding:10px;text-align:right;font-family:shabnam">
                                            <p style="direction:rtl;font-size:13px;line-height:26px;text-align:right">
                                                <b style="font-size:14px"> سلام</b> ' . $operatorDispalyName . '
                                                <br>
 یک تیکت از طرف  ' . $userDispalyName . '  در تاریخ ' . tiva_change_number($dateTime) . ' برای شما ارسال شده است . لطفاً در اسرع وقت به تیکت مورد نظر پاسخ دهید. 
                                               <br>
                                               <br>

                                            </p>
                                            <p style="direction:rtl;font-size:13px;line-height:26px;text-align:center;">
سعی کنید در اولین فرصت پاسخ تیکت را ارسال نمائید، چرا که پاسخ دهی سریع به تیکت ها افزایش رضایت کاربران  به همراه خواهد داشت.
                                            </p>
                                            <br>                                        
                                            <p style="text-align:center;direction:rtl;font-weight:bold;color: #525252">' . get_bloginfo('description') . '</p>
                                            <div style="width:100%;text-align:center;margin-top:40px;margin-bottom:10px">
                                                <a href="' . site_url() . '/user-panel/supporter-tickets"
 style="padding: 6px;
    border: 3px solid #03A9F4;
    border-radius: 3px;
    color: #ffffff;
    font-size: 13px;
    font-weight: 700;
    text-decoration: none;
    background-color: #03a9f4;"
                                                   target="_blank"
                                                   >
                                                   مشاهده تیکت و ارسال پاسخ جدید
                                                   </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
    </body>
    </html> 
    
    ';
}

function tiva_user_send_reply_ticket_email_temp($operatorDispalyName, $userDispalyName, $dateTime)
{

    return '
    
<html lang="fa">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title></title>
        <style type="text/css">

          @import url("' . site_url() . '/blog/wp-content/themes/tiva/css/email-temp-fonts.css"); 

        *{
    font-family: IRANSans !important;
        }
</style>
    </head>
    <body>
    <table style="border-collapse:collapse;margin:auto;max-width:635px;min-width:320px;width:100%">
        <tbody>
        <tr>
            <td style="padding:0 20px" valign="top">
                <table style="border-collapse:collapse;border-radius:3px;color:#545454;border-bottom:1px solid #ddd;font-size:13px;line-height:20px;margin:0 auto;width:100%"
                       align="center" border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                    <tr>
                        <td valign="top">
                            <table style="border:none;border-collapse:separate;font-size:1px;height:50px;line-height:3px;width:100%"
                                   border="0" cellpadding="0" cellspacing="0">
                                <tbody>
                                <tr>
                                    <td style="background:#03a9f4;border-radius: 10px 10px 0 0;border:none;width:100%;font-weight:700;color:#fff;text-align:center;font-size:24px;height: 70px;" bgcolor="#fff">' . get_bloginfo('name') . '</td>
                                </tr>
                                </tbody>
                            </table>

                            <table style="border-collapse:collapse;border-color:#dddddd;border-radius:0 0 3px 3px;border-style:solid solid none;border-width:0 1px 1px;width:100%"
                                   border="0" cellpadding="0" cellspacing="0">
                                <tbody>
                                <tr>
                                    <td style="background:white;border-radius:0 0 3px 3px;color:#242323;font-size:15px;line-height:22px;overflow:hidden;padding:20px 40px 30px"
                                       bgcolor="white">
                                        <div style="margin-top:0;padding:10px;text-align:right;font-family:shabnam">
                                            <p style="direction:rtl;font-size:13px;line-height:26px;text-align:right">
                                                <b style="font-size:14px"> سلام</b> ' . $operatorDispalyName . '
                                                <br>
 یک پاسخ از طرف  ' . $userDispalyName . '  در تاریخ ' . tiva_change_number($dateTime) . ' برای شما ارسال شده است . لطفاً در اسرع وقت به تیکت مورد نظر پاسخ دهید. 
                                               <br>
                                               <br>

                                            </p>
                                            <p style="direction:rtl;font-size:13px;line-height:26px;text-align:center;">
سعی کنید در اولین فرصت پاسخ تیکت را ارسال نمائید، چرا که پاسخ دهی سریع به تیکت ها افزایش رضایت کاربران  به همراه خواهد داشت.
                                            </p>
                                            <br>                                        
                                            <p style="text-align:center;direction:rtl;font-weight:bold;color: #525252">' . get_bloginfo('description') . '</p>
                                            <div style="width:100%;text-align:center;margin-top:40px;margin-bottom:10px">
                                                <a href="' . site_url() . '/user-panel/supporter-tickets"
 style="padding: 6px;
    border: 3px solid #03A9F4;
    border-radius: 3px;
    color: #ffffff;
    font-size: 13px;
    font-weight: 700;
    text-decoration: none;
    background-color: #03a9f4;"
                                                   target="_blank"
                                                   >
                                                   مشاهده تیکت و ارسال پاسخ جدید
                                                   </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
    </body>
    </html> 
    
    ';
}

function tiva_user_oprator_reply_ticket_email_temp($operatorDispalyName, $userDispalyName, $dateTime)
{

    return
        '
    
<html lang="fa">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title></title>
        <style type="text/css">
          @import url("' . site_url() . '/blog/wp-content/themes/tiva/css/email-temp-fonts.css"); 

        *{
    font-family: IRANSans !important;
        }
</style>
    </head>
    <body>
    <table style="border-collapse:collapse;margin:auto;max-width:635px;min-width:320px;width:100%">
        <tbody>
        <tr>
            <td style="padding:0 20px" valign="top">
                <table style="border-collapse:collapse;border-radius:3px;color:#545454;border-bottom:1px solid #ddd;font-size:13px;line-height:20px;margin:0 auto;width:100%"
                       align="center" border="0" cellpadding="0" cellspacing="0">
                    <tbody>
                    <tr>
                        <td valign="top">
                            <table style="border:none;border-collapse:separate;font-size:1px;height:50px;line-height:3px;width:100%"
                                   border="0" cellpadding="0" cellspacing="0">
                                <tbody>
                                <tr>
                                    <td style="background:#03a9f4;border-radius: 10px 10px 0 0;border:none;width:100%;font-weight:700;color:#fff;text-align:center;font-size:24px;height: 70px;" bgcolor="#fff">' . get_bloginfo('name') . '</td>
                                </tr>
                                </tbody>
                            </table>

                            <table style="border-collapse:collapse;border-color:#dddddd;border-radius:0 0 3px 3px;border-style:solid solid none;border-width:0 1px 1px;width:100%"
                                   border="0" cellpadding="0" cellspacing="0">
                                <tbody>
                                <tr>
                                    <td  style="background:white;border-radius:0 0 3px 3px;color:#242323;font-size:15px;line-height:22px;overflow:hidden;padding:20px 40px 30px"
                                        bgcolor="white">
                                        <div style="margin-top:0;padding:10px;text-align:right;font-family:shabnam">
                                            <p style="direction:rtl;font-size:13px;line-height:26px;text-align:right">
                                                <b style="font-size:14px"> سلام</b> ' . $operatorDispalyName . '
                                                <br>
 یک پاسخ جدید از طرف  ' . $userDispalyName . '  در تاریخ ' . tiva_change_number($dateTime) . ' برای شما ارسال شده است . لطفاً در اسرع وقت به تیکت مورد نظر پاسخ دهید. 
                                               <br>
                                               <br>

                                            </p>
                                            <p style="direction:rtl;font-size:13px;line-height:26px;text-align:center;">
نگران پشتیبانی نباشید، ما سعیمون بر اینه که همیشه در دسترس باشیم.
                                            </p>
                                            <br>
                                            <p style="text-align:center;direction:rtl;font-weight:bold;color: #525252">' . get_bloginfo('description') . '</p>
                                            <div style="width:100%;text-align:center;margin-top:40px;margin-bottom:10px">
                                                <a href="' . site_url() . '/user-panel/tickets"
                                                    style="padding: 6px;
    border: 3px solid #03A9F4;
    border-radius: 3px;
    color: #ffffff;
    font-size: 13px;
    font-weight: 700;
    text-decoration: none;
    background-color: #03a9f4;"
                                                   target="_blank"
                                                   >
                                                   مشاهده تیکت و ارسال پاسخ جدید
                                                   </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
    </body>
    </html> 

    ';
}

function tiva_comment_reply_email_template($comment_content, $comment_link)
{

    return '
    
    <html lang="fa">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title></title>
	<style type="text/css">
          @import url("' . site_url() . '/blog/wp-content/themes/tiva/css/email-temp-fonts.css"); 

        *{
    font-family: IRANSans !important;
        }
</style>
</head>
<body>
<table style="border-collapse:collapse;margin:auto;max-width:635px;min-width:320px;width:100%">
	<tbody>
	<tr>
		<td style="padding:0 20px" valign="top">
			<table style="border-collapse:collapse;border-radius:3px;color:#545454;border-bottom:1px solid #ddd;font-size:13px;line-height:20px;margin:0 auto;width:100%"
			       align="center" border="0" cellpadding="0" cellspacing="0">
				<tbody>
				<tr>
					<td valign="top">
						<table style="border:none;border-collapse:separate;font-size:1px;height:50px;line-height:3px;width:100%"
						       border="0" cellpadding="0" cellspacing="0">
							<tbody>
							<tr>
                                    <td style="background:#03a9f4;border-radius: 10px 10px 0 0;border:none;width:100%;font-weight:700;color:#fff;text-align:center;font-size:24px;height: 70px;" bgcolor="#fff">' . get_bloginfo('name') . '</td>
							</tr>
							</tbody>
						</table>
						<table style="border-collapse:collapse;border-color:#dddddd;border-radius:0 0 3px 3px;border-style:solid solid none;border-width:0 1px 1px;width:100%"
						       border="0" cellpadding="0" cellspacing="0">
							<tbody>
							<tr>
								<td style="background:white;border-radius:0 0 3px 3px;color:#525252;font-size:15px;line-height:22px;overflow:hidden;padding:20px 40px 30px"
								    bgcolor="white">
									<div style="margin-top:0;padding:10px;text-align:right;font-family:shabnam">
										<p style="direction:rtl;font-size:13px;line-height:26px;text-align:right">
											<b style="font-size:14px"> ديدگاه شما :</b>
											<br>
											' . $comment_content . '
											<br>
											<br>
										</p>
										<br>
							          <div style="width:100%;text-align:center;margin-top:40px;margin-bottom:10px">
											<a href="' . $comment_link . '"
											   style="padding: 6px;
    border: 3px solid #03A9F4;
    border-radius: 3px;
    color: #ffffff;
    font-size: 13px;
    font-weight: 700;
    text-decoration: none;
    background-color: #03a9f4;"
											   target="_blank"
											>

												مشاهده پاسخ دیدگاه شما
											</a>
										</div>
										<br>
									                                            <p style="text-align:center;direction:rtl;font-weight:bold;color: #525252">' . get_bloginfo('description') . '</p>
									</div>
								</td>
							</tr>
							</tbody>
						</table>
					</td>
				</tr>
				</tbody>
			</table>
		</td>
	</tr>
	</tbody>
</table>
</body>
</html>
    
    ';
}

function tiva_user_register_send_activation_link_email_template($link)
{

    return '
    
    <html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <style type="text/css">
        @import url("' . site_url() . '/blog/wp-content/themes/tiva/css/email-temp-fonts.css");

        * {
            font-family: IRANSans !important;
        }
    </style>
</head>
<body>
<table style="border-collapse:collapse;margin:auto;max-width:635px;min-width:320px;width:100%">
    <tbody>
    <tr>
        <td style="padding:0 20px" valign="top">
            <table style="border-collapse:collapse;border-radius:3px;color:#545454;border-bottom:1px solid #ddd;font-size:13px;line-height:20px;margin:0 auto;width:100%"
                   align="center" border="0" cellpadding="0" cellspacing="0">
                <tbody>
                <tr>
                    <td valign="top">
                        <table style="border:none;border-collapse:separate;font-size:1px;height:50px;line-height:3px;width:100%"
                               border="0" cellpadding="0" cellspacing="0">
                            <tbody>
                            <tr>
                                <td style="background:#03a9f4;border-radius: 10px 10px 0 0;border:none;width:100%;font-weight:700;color:#fff;text-align:center;font-size:24px;height: 70px;"
                                    bgcolor="#fff">' . get_bloginfo('name') . '
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <table style="border-collapse:collapse;border-color:#dddddd;border-radius:0 0 3px 3px;border-style:solid solid none;border-width:0 1px 1px;width:100%"
                               border="0" cellpadding="0" cellspacing="0">
                            <tbody>
                            <tr>
                                <td style="background:white;border-radius:0 0 3px 3px;color:#525252;font-size:15px;line-height:22px;overflow:hidden;padding:20px 40px 30px"
                                    bgcolor="white">
                                    <div style="margin-top:0;padding:10px;text-align:right;font-family:shabnam">
                                        <p style="direction:rtl;font-size:13px;line-height:26px;text-align:center">
                                            <b style="font-size:14px">کاربر عزیز سلام</b>
                                            <br>
                                            <br>
شما با موفقیت در سایت ما عضو شدید برای فعال کردن حساب کاربری خود و همچنین استفاده از پنل کاربری سایت باید حساب خود را فعال کنید پس لطفا روی دکمه زیر کلیک کنید.
                                            <br>
                                            <br>
                                        </p>
                                        <br>
                                        <div style="width:100%;text-align:center;margin-top:40px;margin-bottom:10px">
                                            <a href="' . $link . '"
                                               style="padding: 6px;
    border: 3px solid #03A9F4;
    border-radius: 3px;
    color: #ffffff;
    font-size: 13px;
    font-weight: 700;
    text-decoration: none;
    background-color: #03a9f4;"
                                               target="_blank"
                                            >
                                                فعال سازی حساب شما
                                            </a>
                                        </div>
                                        <br>
                                        <p style="text-align:center;direction:rtl;font-weight:bold;color: #525252">' .
        get_bloginfo('description') . '</p>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>
</body>
</html>
    
    ';

}

function tiva_user_recovery_pass_email_template($new_pass)
{
    return '
    
    <html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <style type="text/css">
        @import url("' . site_url() . '/blog/wp-content/themes/tiva/css/email-temp-fonts.css");

        * {
            font-family: IRANSans !important;
        }
    </style>
</head>
<body>
<table style="border-collapse:collapse;margin:auto;max-width:635px;min-width:320px;width:100%">
    <tbody>
    <tr>
        <td style="padding:0 20px" valign="top">
            <table style="border-collapse:collapse;border-radius:3px;color:#545454;border-bottom:1px solid #ddd;font-size:13px;line-height:20px;margin:0 auto;width:100%"
                   align="center" border="0" cellpadding="0" cellspacing="0">
                <tbody>
                <tr>
                    <td valign="top">
                        <table style="border:none;border-collapse:separate;font-size:1px;height:50px;line-height:3px;width:100%"
                               border="0" cellpadding="0" cellspacing="0">
                            <tbody>
                            <tr>
                                <td style="background:#03a9f4;border-radius: 10px 10px 0 0;border:none;width:100%;font-weight:700;color:#fff;text-align:center;font-size:24px;height: 70px;"
                                    bgcolor="#fff">' . get_bloginfo('name') . '
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <table style="border-collapse:collapse;border-color:#dddddd;border-radius:0 0 3px 3px;border-style:solid solid none;border-width:0 1px 1px;width:100%"
                               border="0" cellpadding="0" cellspacing="0">
                            <tbody>
                            <tr>
                                <td style="background:white;border-radius:0 0 3px 3px;color:#525252;font-size:15px;line-height:22px;overflow:hidden;padding:20px 40px 30px"
                                    bgcolor="white">
                                    <div style="margin-top:0;padding:10px;text-align:right;font-family:shabnam">
                                        <p style="direction:rtl;font-size:13px;line-height:26px;text-align:center">
                                            <b style="font-size:14px">کاربر عزیز سلام</b>
                                            <br>
                                            <br>
                                            کاربر عزیز رمز عبور شما با موفقیت بازیابی شد و رمز جدید شما به این صورت است.
                                            <br>
                                            <br>
                                            <b style="font-size:14px">' . $new_pass . '</b>
                                        </p>
                                        <br>
                                        <br>
                                        <p style="text-align:center;direction:rtl;font-weight:bold;color: #525252">' .
        get_bloginfo('description') . '</p>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>
</body>
</html>
    
    ';
}