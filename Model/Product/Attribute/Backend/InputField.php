<?php
namespace Magenest\Junior\Model\Product\Attribute\Backend;

class InputField extends \Magento\Eav\Model\Entity\Attribute\Backend\AbstractBackend
{

    public function beforeSave($object)
    {
        $inputValue = $object->getData('product_input_varchar');
        $object->setData('product_input_varchar', $inputValue.' + varchar(255)');
        return parent::beforeSave($object);
    }

    public function afterLoad($object)
    {
        $inputValue = $object->getData('product_input_varchar');
        $str= str_replace(" + varchar(255)", "", $inputValue);
        $object->setData('product_input_varchar', $str);
        return parent::afterLoad($object);
    }
}
