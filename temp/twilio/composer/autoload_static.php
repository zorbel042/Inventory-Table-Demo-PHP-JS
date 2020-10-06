<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitdebe751b655478f3e6eb67666148d358
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Twilio\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Twilio\\' => 
        array (
            0 => __DIR__ . '/..' . '/twilio/sdk/Twilio',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitdebe751b655478f3e6eb67666148d358::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitdebe751b655478f3e6eb67666148d358::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
