<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit391c0c46efbd30c6792e7f566d2e553a
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit391c0c46efbd30c6792e7f566d2e553a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit391c0c46efbd30c6792e7f566d2e553a::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit391c0c46efbd30c6792e7f566d2e553a::$classMap;

        }, null, ClassLoader::class);
    }
}
