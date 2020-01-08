<?php

namespace Magenest\Junior\Block\Product;

use Magenest\Junior\Helper\Cookie;
use Magento\Framework\View\Element\Template;

class View extends Template
{
    protected $cookieHelper;
    public function __construct(
        Cookie $cookieHelper,
        Template\Context $context,
        array $data = []
    )
    {
        $this->cookieHelper = $cookieHelper;
        parent::__construct($context, $data);
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