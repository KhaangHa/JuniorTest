<?php
/**
 * Created by PhpStorm.
 * User: ninhvu
 * Date: 09/03/2018
 * Time: 14:21
 */
namespace Magenest\Junior\Model;

use Magento\Framework\Model\AbstractModel;

class Log extends AbstractModel
{
    protected function _construct()
    {
        $this->_init('Magenest\Junior\Model\ResourceModel\Log');
        $this->setIdFieldName('id');
    }
}
