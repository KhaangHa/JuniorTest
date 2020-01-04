<?php
namespace Magenest\Junior\Plugin\Catalog;
use Magento\Customer\Model\Session;
use Magento\Framework\App\Config\ScopeConfigInterface;

class FinalPriceBox {
    const CONFIG_PATH = 'magenest_junior/hideprice/enable';
    protected $customerSession;
    protected $scopeConfig;
    public function __construct(
        Session $customerSession,
        ScopeConfigInterface $scopeConfig
    )
    {
        $this->customerSession = $customerSession;
        $this->scopeConfig = $scopeConfig;
    }

    public function afterToHtml($subject, $result){
        if($this->isConfigEnable() && !$this->customerSession->isLoggedIn()){
            $result = '<span style="color:red">You need to log in to see product price</span>';
        }
        return $result;
    }

    public function isConfigEnable(){
        return $this->scopeConfig->getValue(self::CONFIG_PATH);
    }
}