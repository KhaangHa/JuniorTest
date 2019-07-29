<?php
namespace Magenest\Junior\Block;
use \Magento\Framework\App\Config\ScopeConfigInterface;
use \Magento\Store\Model\ScopeInterface;
class Header extends \Magento\Framework\View\Element\Template
{
    public function getTextColor()
    {
        $textColor = $this->_scopeConfig->getValue('magenest_clock/general/text_color', ScopeInterface::SCOPE_WEBSITE);
        return $textColor;
    }
    public function getBackgroundColor()
    {
        $color = $this->_scopeConfig->getValue('magenest_clock/general/clock_color', ScopeInterface::SCOPE_WEBSITE);
        return $color;
    }
    public function getTitle()
    {
        return $this->_scopeConfig->getValue('magenest_clock/general/clock_title', ScopeInterface::SCOPE_WEBSITE);
    }

}
