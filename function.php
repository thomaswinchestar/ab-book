<?php

function str_lreplace($search, $replace, $subject)
{
    $pos = strrpos($subject, $search);

    if ($pos !== false) {
        $subject = substr_replace($subject, $replace, $pos, strlen($search));
    }

    return $subject;
}

function dd($value)
{
    echo '<pre>';
    die(var_dump($value));
}
function dump($value)
{
    echo '<pre>';
    (var_dump($value));
}
