<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita8206fc1d694a3531061e446c22f9de5
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita8206fc1d694a3531061e446c22f9de5::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita8206fc1d694a3531061e446c22f9de5::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInita8206fc1d694a3531061e446c22f9de5::$classMap;

        }, null, ClassLoader::class);
    }
}