<?php

namespace Magenest\Junior\Ui\DataProvider\Product\Form\Modifier;

use Magento\Catalog\Ui\DataProvider\Product\Form\Modifier\AbstractModifier;
use Magento\Ui\Component\Form\Fieldset;
use Magento\Ui\Component\Form\Field;
use Magento\Ui\Component\Form\Element\Select;
use Magento\Ui\Component\Form\Element\Input;
use Magento\Ui\Component\Form\Element\DataType\Text;

class Fields extends AbstractModifier
{
    public function modifyMeta(array $meta)
    {
        $meta = array_replace_recursive(
            $meta,
            [
                'magenest' => [
                    'arguments' => [
                        'data' => [
                            'config' => [
                                'label' => __('Magenest First Field'),
                                'collapsible' => true,
                                'componentType' => Fieldset::NAME,
                                'dataScope' => 'data.magenest',
                                'sortOrder' => 10
                            ],
                        ],
                    ],
                    'children' => $this->getFields()
                ],
            ]
        );

        return $meta;
    }

    protected function getFields()
    {
        return [
            'status'    => [
                'arguments' => [
                    'data' => [
                        'config' => [
                            'label'         => __('Magenest Dropdown'),
                            'componentType' => Field::NAME,
                            'formElement'   => Select::NAME,
                            'dataScope'     => 'status',
                            'dataType'      => Text::NAME,
                            'sortOrder'     => 10,
                            'options'       => [
                                ['value' => '0', 'label' => __('Level 0')],
                                ['value' => '1', 'label' => __('Level 1')]
                            ],
                        ],
                    ],
                ],
            ]
        ];
    }

    public function modifyData(array $data)
    {
        return $data;
    }
}