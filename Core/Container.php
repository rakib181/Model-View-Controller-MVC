<?php

namespace Core;

class Container
{
    public static $container = [];
    public function bind($key, $resolver): void
    {
        static::$container[$key] = $resolver;
    }

    public function resolve($key){
        if(!array_key_exists($key, static::$container)){
            throw new \Exception("Resource not found");
        }
        $resolver = static::$container[$key];
        return call_user_func($resolver);
    }

}