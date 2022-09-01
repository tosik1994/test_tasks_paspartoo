<?php

$deliveryMethodsArray = [
    [
        'code' => 'dhl',
        'customer_costs' => [
            22 => '4.300',
            11 => '1.800',
            33 => '5.800',
            44 => '3.800',
            55 => '2.800',
            66 => '7.800',
        ]
    ],
    [
        'code' => 'fedex',
        'customer_costs' => [
            22 => '3.100',
            11 => '6.200',
            33 => '7.200',
            44 => '1.200',
            55 => '9.200',
            66 => '2.200',
        ]
    ]
];

function myArrowFunc($i)
{
    return str_repeat('<', $i) . str_repeat('>', $i);
}

function sortDeliveryMethods($deliveryMethodsArray)
{
    $result_array = [];
    foreach ($deliveryMethodsArray as $item) {
        foreach ($item['customer_costs'] as $key => $value) {
            if ($result_array[$key]) {
                $result_array[$key] += [$item['code'] => $value];
            }
            $result_array += [$key => [$item['code'] => $value]];
        }
    }

    foreach ($result_array as $key => $value) {
        uasort($result_array[$key], function ($x, $y) {
            return ($x > $y);
        });
    }
    return $result_array;
}

echo myArrowFunc(9);

echo '<pre>';
print_r(sortDeliveryMethods($deliveryMethodsArray));
echo '</pre>';



?>