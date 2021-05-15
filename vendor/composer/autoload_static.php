<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8ece1ddb3b47ee99772221782e6cb571
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit8ece1ddb3b47ee99772221782e6cb571::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8ece1ddb3b47ee99772221782e6cb571::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit8ece1ddb3b47ee99772221782e6cb571::$classMap;

        }, null, ClassLoader::class);
    }
}
