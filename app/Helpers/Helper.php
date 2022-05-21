<?php
use App\Models\Etemplate;
use App\Models\Settings;


if (! function_exists('send_email')) {

    function send_email( $to, $name, $subject, $message)
    {
        $temp = Etemplate::first();
        $gnl = Settings::first();
        $template = $temp->emessage;
        $from = $temp->esender;
		if($gnl->email_notify == 1)
		{
			$headers = "From: $gnl->site_name <$from> \r\n";
			$headers .= "Reply-To: $gnl->site_name <$from> \r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

			$mm = str_replace("{{name}}",$name,$template);
			$message = str_replace("{{message}}",$message,$mm);

			if (mail($to, $subject, $message, $headers)) {
			  // echo 'Your message has been sent.';
			} else {
			 //echo 'There was a problem sending the email.';
			}
		}
    }
}

if (! function_exists('user_ip')) {
    function user_ip() {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
           $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }
}


if (! function_exists('send_sms'))
{

    function send_sms( $to, $message)
    {
        $temp = Etemplate::first();
        $gnl = Settings::first();
        if($gnl->sms_notify == 1)
        {
            $sendtext = urlencode($message);
            $appi = $temp->smsapi;
            $appi = str_replace("{{number}}",$to,$appi);
            $appi = str_replace("{{message}}",$sendtext,$appi);
            $result = file_get_contents($appi);
        }
    }
}


if (! function_exists('notify'))
{
    function notify( $user, $subject, $message)
    {
        send_email($user->email, $user->name, $subject, $message);
        send_sms($user->mobile, strip_tags($message));
    }
}




if (!function_exists('send_email_verification')) {
    function send_email_verification($to, $name, $subject, $message)
    {
        $temp = Etemplate::first();
        $gnl = Settings::first();
        $template = $temp->emessage;
        $from = $temp->esender;

        $headers = "From: $gnl->site_name <$from> \r\n";
        $headers .= "Reply-To: $gnl->site_name <$from> \r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        $mm = str_replace("{{name}}", $name, $template);
        $message = str_replace("{{message}}", $message, $mm);

        if (mail($to, $subject, $message, $headers)) {
            // echo 'Your message has been sent.';
        } else {
            //echo 'There was a problem sending the email.';
        }
    }
}


if (!function_exists('send_sms_verification')) {

    function send_sms_verification($to, $message)
    {
        $temp = Etemplate::first();
        $gnl = Settings::first();
        if ($gnl->sms_verification == 1) {
            $sendtext = urlencode($message);
            $appi = $temp->smsapi;
            $appi = str_replace("{{number}}", $to, $appi);
            $appi = str_replace("{{message}}", $sendtext, $appi);
            $result = file_get_contents($appi);
        }
    }
}

if (!function_exists('castrotime')) {

    function castrotime($timestamp)
    {
        $datetime1=new DateTime("now");
        $datetime2=date_create($timestamp);
        $diff=date_diff($datetime1, $datetime2);
        $timemsg='';
        if($diff->y > 0){
            $timemsg = $diff->y * 12 * 30 ;
        }
        else if($diff->m > 0){
            $timemsg = $diff->m *30;
        }
        else if($diff->d > 0){
            $timemsg = $diff->d *1;
        }    
        if($timemsg == "")
            $timemsg = 0;
        else
            $timemsg = $timemsg;
    
        return $timemsg;
    }
}
if (!function_exists('castrotime')) {

    function castrotime($timestamp)
    {
        $datetime1=new DateTime("now");
        $datetime2=date_create($timestamp);
        $diff=date_diff($datetime1, $datetime2);
        $timemsg='';
        if($diff->y > 0){
            $timemsg = $diff->y * 12 * 30 ;
        }
        else if($diff->m > 0){
            $timemsg = $diff->m *30;
        }
        else if($diff->d > 0){
            $timemsg = $diff->d *1;
        }    
        if($timemsg == "")
            $timemsg = 0;
        else
            $timemsg = $timemsg;
    
        return $timemsg;
    }
}

if (!function_exists('timeAgo')) {
    function timeAgo($timestamp){
        //$time_now = mktime(date('h')+0,date('i')+30,date('s'));
        $datetime1=new DateTime("now");
        $datetime2=date_create($timestamp);
        $diff=date_diff($datetime1, $datetime2);
        $timemsg='';
        if($diff->y > 0){
            $timemsg = $diff->y .' year'. ($diff->y > 1?"s":'');
    
        }
        else if($diff->m > 0){
            $timemsg = $diff->m . ' month'. ($diff->m > 1?"s":'');
        }
        else if($diff->d > 0){
            $timemsg = $diff->d .' day'. ($diff->d > 1?"s":'');
        }
        else if($diff->h > 0){
            $timemsg = $diff->h .' hour'.($diff->h > 1 ? "s":'');
        }
        else if($diff->i > 0){
            $timemsg = $diff->i .' minute'. ($diff->i > 1?"s":'');
        }
        else if($diff->s > 0){
            $timemsg = $diff->s .' second'. ($diff->s > 1?"s":'');
        }
        if($timemsg == "")
            $timemsg = "Just now";
        else
            $timemsg = $timemsg.' ago';
    
        return $timemsg;
    }
}

if (!function_exists('convertFloat')) {
    function convertFloat($floatAsString)
    {
        $norm = strval(floatval($floatAsString));
    
        if (($e = strrchr($norm, 'E')) === false) {
            return $norm;
        }
    
        return number_format($norm, -intval(substr($e, 1)));
    }
}
