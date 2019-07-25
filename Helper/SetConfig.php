<?php

namespace Magenest\Demo\Helper;

class SetConfig extends \Magento\Framework\App\Helper\AbstractHelper
{
    protected $_logger;
    protected $_storeManager;
    protected $_configWriter;

    public function __construct(
        \Psr\Log\LoggerInterface $logger,
        \Magento\Framework\App\Config\Storage\WriterInterface $configWriter,
        \Magento\Store\Model\StoreManagerInterface $storeManager

    ){
        $this->_logger = $logger;
        $this->_configWriter = $configWriter;
        $this->_storeManager = $storeManager;
    }

    public function setConfig($path,$value)
    {
        //for all websites
        $websites = $this->_storeManager->getWebsites();
        $scope = "default";
        foreach($websites as $website) {
            echo $website->getId().":\n";

            $this->_configWriter->save($path, $value, $scope, 0);
        }

        return $this;
    }
}