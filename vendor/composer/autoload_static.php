<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit43bbfe81f74acdbe0f4844ddd7971e76
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Flanp\\CmsSettings\\' => 18,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Flanp\\CmsSettings\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit43bbfe81f74acdbe0f4844ddd7971e76::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit43bbfe81f74acdbe0f4844ddd7971e76::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit43bbfe81f74acdbe0f4844ddd7971e76::$classMap;

        }, null, ClassLoader::class);
    }
}
