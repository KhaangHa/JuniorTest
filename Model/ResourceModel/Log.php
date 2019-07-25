<?php
/**
 * Created by PhpStorm.
 * User: ninhvu
 * Date: 09/03/2018
 * Time: 14:27
 */
namespace Magenest\Junior\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Log extends AbstractDb{

    public function _construct()
    {

        $this->_init("magenest_junior_log","id");
    }
}