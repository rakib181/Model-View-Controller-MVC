<?php

use Illuminate\Support\Collection;
require_once __DIR__. '/../vendor/autoload.php';


$result = new Collection([1, 2, 3, 4, 5, 6]);

$result = $result->filter(function ($item) {
    return $item % 2 === 0;
});

var_dump($result);
