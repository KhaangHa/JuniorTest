<?php
/**
 * Created by PhpStorm.
 * User: ninhvu
 * Date: 09/03/2018
 * Time: 14:29
 */

namespace Magenest\Junior\Model\ResourceModel\Log;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init('Magenest\Junior\Model\Log', 'Magenest\Junior\Model\ResourceModel\Log');
    }
}
