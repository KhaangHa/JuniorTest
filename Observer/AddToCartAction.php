<?php
namespace Magenest\Junior\Observer;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class AddToCartAction implements ObserverInterface{
    public function execute(Observer $observer)
    {
        $product = $observer->getEvent()->getProduct();
        $additionalOptions = [];
        $additionalOptions[] = array(
            'label' => "Time Stamp",
            'value' => date("h:i:sa d/m/Y"),
        );
        $product->addCustomOption('additional_options', json_encode($additionalOptions));
    }
}