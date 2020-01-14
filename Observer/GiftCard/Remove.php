<?php
namespace Magenest\Junior\Observer\GiftCard;
use Magenest\Junior\Helper\Cookie;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class Remove implements ObserverInterface{
    protected $cookieHelper;
    public function __construct(Cookie $cookieHelper)
    {
        $this->cookieHelper = $cookieHelper;
    }

    public function execute(Observer $observer)
    {
        $this->cookieHelper->delete();
    }
}