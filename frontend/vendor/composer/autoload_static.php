<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit15366eaf8d2f8feca4383b54bd35ad71
{
    public static $prefixLengthsPsr4 = array (
        'k' => 
        array (
            'kartik\\plugins\\dateformatter\\' => 29,
            'kartik\\datecontrol\\' => 19,
            'kartik\\base\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'kartik\\plugins\\dateformatter\\' => 
        array (
            0 => __DIR__ . '/..' . '/kartik-v/php-date-formatter',
        ),
        'kartik\\datecontrol\\' => 
        array (
            0 => __DIR__ . '/..' . '/kartik-v/yii2-datecontrol/src',
        ),
        'kartik\\base\\' => 
        array (
            0 => __DIR__ . '/..' . '/kartik-v/yii2-krajee-base/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit15366eaf8d2f8feca4383b54bd35ad71::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit15366eaf8d2f8feca4383b54bd35ad71::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
