<?php
/**
 * @author Pavel Tsydzik <xagero@gmail.com>
 * @date   21.11.2016 12:04
 */


$x = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h'];


function convert(array $x): array
{
    $result = [];

    foreach ($x as $item) {
        $result = [$item => $result];
    }

    return $result;
}


print_r(convert($x));