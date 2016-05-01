<?php

function maskEmail($email)
{
    $mail_segments = explode("@", $email);
    $mail_segments[0] = substr($mail_segments[0],0, 1) . str_repeat("*", strlen($mail_segments[0])-1) . substr($mail_segments[0],-1);

    return implode("@", $mail_segments);
}

function maskName($name)
{
    $loop = 1;
    $mask = '';
    $name_segments = explode(" ", $name);
    foreach( $name_segments as $segment )
    {
        if ($loop == 1)
        {
            $loop++;
            $mask .= substr($segment,0, 1) . str_repeat("*", strlen($segment)-1) . ' ';
        }
        else
        {
            $mask .= str_repeat("*", strlen($segment)) . ' ';
        }
    }

    return $mask;
}