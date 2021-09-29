<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0c937904285c90ad4b3fd7c30bdb22f9
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Acs\\PingScore\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Acs\\PingScore\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0c937904285c90ad4b3fd7c30bdb22f9::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0c937904285c90ad4b3fd7c30bdb22f9::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit0c937904285c90ad4b3fd7c30bdb22f9::$classMap;

        }, null, ClassLoader::class);
    }
}