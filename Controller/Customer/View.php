<?php

namespace Magenest\Junior\Controller\Customer;

use Magenest\Junior\Helper\Cookie;
use Magento\Framework\App\Action\HttpGetActionInterface as HttpGetActionInterface;
use Magento\Framework\View\Element\Template;
use Magento\Sales\Controller\OrderInterface;

class View extends \Magento\Sales\Controller\AbstractController\View implements OrderInterface, HttpGetActionInterface
{
}