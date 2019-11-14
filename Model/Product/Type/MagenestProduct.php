<?php

namespace Magenest\Junior\Model\Product\Type;

class MagenestProduct extends \Magento\Catalog\Model\Product\Type\Virtual
{
    const TYPE_ID = 'magenest_junior_product_type';

    /**
     * {@inheritdoc}
     */
    public function deleteTypeSpecificData(\Magento\Catalog\Model\Product $product)
    {
        // method intentionally empty
    }
}