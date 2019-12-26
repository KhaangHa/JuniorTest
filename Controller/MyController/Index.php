<?php

namespace Magenest\Junior\Controller\MyController;

use Magenest\Junior\Api\MyInterface;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;

class Index extends Action
{
    protected $_interface;

    public function __construct(Context $context, MyInterface $interface)
    {
        $this->_interface = $interface;
        parent::__construct($context);
    }

    public function execute()
    {
        $this->_interface->foo();
    }
}