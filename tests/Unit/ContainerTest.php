<?php

use Core\Container;

test('Container test', function () {
    $container = new Container();

    $container->bind('foo', fn () => 'bar');

    $result = $container->resolve('foo');

    expect($result)->toEqual('bar');
});
