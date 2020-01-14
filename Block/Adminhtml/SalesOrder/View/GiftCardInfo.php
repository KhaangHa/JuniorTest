<?php
namespace Magenest\Junior\Block\Adminhtml\SalesOrder\View;

/**
 * Class GiftCardInfo
 * @package Magenest\Junior\Block\Adminhtml\SalesOrder\View
 */
class GiftCardInfo extends \Magento\Sales\Block\Order\Info {
    /**
     * @param $order
     * @return mixed|null
     */
    public function getGiftCard($order){
        if($order == null){
            return null;
        } else if($order->getGiftCard()) {
            return json_decode($order->getGiftCard(),true);
        }
        return null;
    }
}