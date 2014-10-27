<?php

class String
{
    /**
     * capitalize, se você nao programa em java, é uppercase apenas da primeira letra
     * @param $value string
     * @return string
     */
    public static function capitalize($value)
    {
        return ucfirst(strtolower($value));
    }
}