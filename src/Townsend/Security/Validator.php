<?php

namespace townsend\security;

/**
 * Class Validator
 * @package townsend\security
 */
class Validator
{
    /**
     * @param String $name
     * @return false|int
     */
    public static function isValidName(String $name)
    {
        return preg_match("/^[a-zA-Z-' ]*$/",$name);
    }

    /**
     * @param String $phoneNumber
     * @return false|int
     */
    public static function isValidPhoneNumber(String $phoneNumber, int $minLength = 10)
    {
        if(strlen($phoneNumber) < $minLength) return false;
        return preg_match("/^[0-9 \(\)]*$/",$phoneNumber);
    }

    /**
     * @param String $email
     * @return mixed
     */
    public static function isValidEmail(String $email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    /**
     * @param String $message
     * @param int $minLength
     * @return bool
     */
    public static function isValidMessage(String $message, int $minLength = 25)
    {
        return strlen($message) >= $minLength;
    }
}