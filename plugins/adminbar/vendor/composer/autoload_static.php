<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit593d15d0513011f603f6394ac777fcb7
{
    public static $prefixLengthsPsr4 = array (
        'w' => 
        array (
            'wb\\adminbar\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'wb\\adminbar\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Mexitek\\PHPColors\\Color' => __DIR__ . '/..' . '/mexitek/phpcolors/src/Mexitek/PHPColors/Color.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit593d15d0513011f603f6394ac777fcb7::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit593d15d0513011f603f6394ac777fcb7::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit593d15d0513011f603f6394ac777fcb7::$classMap;

        }, null, ClassLoader::class);
    }
}