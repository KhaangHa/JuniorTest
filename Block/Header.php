<?php
namespace Magenest\Junior\Block;
use \Magento\Store\Model\ScopeInterface;

/**
 * Class Header
 * @package Magenest\Junior\Block
 */
class Header extends \Magento\Framework\View\Element\Template
{
    /**
     * @return mixed
     */
    public function getTextColor()
    {
        $textColor = $this->_scopeConfig->getValue('magenest_clock/general/text_color', ScopeInterface::SCOPE_WEBSITE);
        return $textColor;
    }

    /**
     * @return mixed
     */
    public function getBackgroundColor()
    {
        $color = $this->_scopeConfig->getValue('magenest_clock/general/clock_color', ScopeInterface::SCOPE_WEBSITE);
        return $color;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->_scopeConfig->getValue('magenest_clock/general/clock_title', ScopeInterface::SCOPE_WEBSITE);
    }

    /**
     * @return mixed
     */
    public function getSize()
    {
        return $this->_scopeConfig->getValue('magenest_clock/general/clock_size', ScopeInterface::SCOPE_WEBSITE);
    }
}
