<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5acbf7fe670dde54e2809c06a06f9dc3
{
    public static $prefixLengthsPsr4 = array (
        'V' => 
        array (
            'Valitron\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Valitron\\' => 
        array (
            0 => __DIR__ . '/..' . '/vlucas/valitron/src/Valitron',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5acbf7fe670dde54e2809c06a06f9dc3::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5acbf7fe670dde54e2809c06a06f9dc3::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit5acbf7fe670dde54e2809c06a06f9dc3::$classMap;

        }, null, ClassLoader::class);
    }
}