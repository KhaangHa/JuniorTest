<?php

namespace Magenest\Demo\Helper;

class ReadConfig extends \Magento\Framework\App\Helper\AbstractHelper
{
    protected $_scopeConfig;

    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    )
    {
        $this->_scopeConfig = $scopeConfig;
        parent::__construct($context);
    }

    public function getConfig($path)
    {
        return $this->_scopeConfig->getValue($path,
            \Magento\Store\Model\ScopeInterface::SCOPE_WEBSITE);
    }
    public function isSetFlag($path)
    {
        return $this->scopeConfig->isSetFlag($path, 'default');
    }
}