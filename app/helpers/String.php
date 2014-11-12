<?php

class String
{
    /**
     * capitalize é uppercase apenas da primeira letra
     * @param $value string
     * @return string
     */
    public static function capitalize($value)
    {
        return ucfirst(strtolower($value));
    }

    public static function slug($str)
    {
        $str = preg_replace("/([A-Z])/", "-$1", $str);
        $str = str_replace(" ", "-", $str);
        $str = str_replace("--", "-", $str);
        $str = Str::slug($str);
        $str = Str::lower($str);
        return $str;
    }
}