<?php

namespace Townsend\Security;

/**
 * Class CsrfGuard
 * @package townsend\security
 */
class CsrfGuard
{
    /**
     * @var string
     */
    private static $salt = "noels";
    private static $CSRFGuard_name = "";

    /**
     * @return string
     */
    public static function generateToken()
    {
        CsrfGuard::$CSRFGuard_name = "CSRFGuard_" . mt_rand(0, mt_getrandmax());
        return md5(CsrfGuard::$CSRFGuard_name . CsrfGuard::$salt);
    }

    /**
     * @param $guardName
     * @param $token
     * @return bool
     */
    public static function isValidToken(String $guardName, String $token)
    {
        return isset($guardName) || $token === md5($guardName . CsrfGuard::$salt);
    }

    public static function getGuardName()
    {
        return CsrfGuard::$CSRFGuard_name;
    }
}