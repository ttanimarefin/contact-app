<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit60dc5627c94cc8e80fb9ac14ac4e90c5
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Faker\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Faker\\' => 
        array (
            0 => __DIR__ . '/..' . '/fakerphp/faker/src/Faker',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit60dc5627c94cc8e80fb9ac14ac4e90c5::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit60dc5627c94cc8e80fb9ac14ac4e90c5::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit60dc5627c94cc8e80fb9ac14ac4e90c5::$classMap;

        }, null, ClassLoader::class);
    }
}
