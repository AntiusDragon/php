<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit457664ca815d04348c0848e6b3bdfc19
{
    public static $prefixLengthsPsr4 = array (
        'V' => 
        array (
            'Visai\\Kitas\\Dalykas\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Visai\\Kitas\\Dalykas\\' => 
        array (
            0 => __DIR__ . '/../..' . '/d2',
        ),
    );

    public static $fallbackDirsPsr4 = array (
        0 => __DIR__ . '/../..' . '/',
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit457664ca815d04348c0848e6b3bdfc19::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit457664ca815d04348c0848e6b3bdfc19::$prefixDirsPsr4;
            $loader->fallbackDirsPsr4 = ComposerStaticInit457664ca815d04348c0848e6b3bdfc19::$fallbackDirsPsr4;
            $loader->classMap = ComposerStaticInit457664ca815d04348c0848e6b3bdfc19::$classMap;

        }, null, ClassLoader::class);
    }
}
