<?php
/**
 * @author Pavel Tsydzik <xagero@gmail.com>
 * @date   21.11.2016 12:31
 */


$data1 = [
    'parent.child.field' => 1,
    'parent.child.field2' => 2,
    'parent2.child.name' => 'test',
    'parent2.child2.name' => 'test',
    'parent2.child2.position' => 10,
    'parent3.child3.position' => 10,
];

/**
 * @param array $data
 *
 * @return array
 */
function convert(array $data): array
{
    $result = [];

    foreach ($data as $key => $value) {
        $pairs = explode('.', $key);
        // поддерживаем только фиксированное число ключей
        $result[$pairs[0]][$pairs[1]][$pairs[2]] = $value;
    }

    return $result;
}

//print_r(convert($data1));

/**
 * @param array $data
 *
 * @return array
 */
function reconvert(array $data)
{
    $result = [];

    // тоже самое поддержка по строгому офрмату
    foreach ($data as $key1 => $value1) {
        foreach ($value1 as $key2 => $value2) {
            foreach ($value2 as $key3 => $value3) {
                $result[implode('.', [$key1,  $key2, $key3])] = $value3;
            }
        }

    }

    return $result;
}

print_r(reconvert(convert($data1)));


// ЗЫ. Функционал не будет работать для разноформатного конфига, но это можно исправить =)