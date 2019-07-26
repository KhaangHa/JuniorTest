<?php
namespace Magenest\Junior\Model\Config\Clock;

class Size implements \Magento\Framework\Option\ArrayInterface
{


    /**
     * @return array
     */
    public function toOptionArray()
    {
        $data = [
            ['label' => 'Small', 'value' => 1],
            ['label' => 'Medium', 'value' => 2],
            ['label' => 'Large', 'value' => 3]
        ];

        return $data;
    }
}