<?php
namespace Magenest\Junior\Observer\SalesOrder;
use Magenest\Junior\Helper\Cookie;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Serialize\Serializer\Json;

class SaveAfter implements ObserverInterface{
    protected $cookieHelper;
    protected $serializer;
    public function __construct(
        Cookie $cookieHelper,
        Json $serializer
    )
    {
        $this->cookieHelper = $cookieHelper;
        $this->serializer = $serializer;
    }

    public function execute(Observer $observer)
    {
        $orderModel = $observer->getEvent()->getOrder();
        $giftCard = $this->cookieHelper->get();
        $orderModel->setGiftCard($giftCard);
    }
}