<?php

namespace Magenest\Junior\Block\Product;

use Magenest\Junior\Helper\Cookie;
use Magento\Framework\View\Element\Template;
use Magento\Sales\Model\Order;
use Magento\Sales\Model\OrderRepository;

class View extends Template
{
    protected $cookieHelper;
    protected $orderRepository;
    public function __construct(
        Cookie $cookieHelper,
        Template\Context $context,
        OrderRepository $orderRepository,
        array $data = []
    )
    {
        $this->cookieHelper = $cookieHelper;
        $this->orderRepository = $orderRepository;
        parent::__construct($context, $data);
    }

    public function getOrderDetail(){
        $param = $this->_request->getParams();
        $orderId = $param['order_id'] ?? null;
        if($orderId){
            $order =  $this->orderRepository->get($orderId);
            return $this->getGiftCardInfo($order);
        }
        else {
            return null;
        }
    }

    /**
     * @param Order $order
     * @return array
     */
    public function getGiftCardInfo($order){
        $result = [];
        $giftCardInfo = $order->getGiftCard() ?? null;
        if($giftCardInfo){
            $result = json_decode($giftCardInfo, true);
        }
        return $result;
    }

    /**
     * @return bool
     */
    public function giftCardHasInfo()
    {
        $cardInfo = $this->cookieHelper->get();
        if ($cardInfo == null) {
            return false;
        }
        return true;
    }
}