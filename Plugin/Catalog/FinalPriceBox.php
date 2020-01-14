<?php
namespace Magenest\Junior\Plugin\Catalog;
use Magento\Customer\Model\Session;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Customer\Model\SessionFactory;
class FinalPriceBox {
    const CONFIG_PATH = 'magenest_junior/hideprice/enable';
    protected $customerSession;
    protected $scopeConfig;
    public function __construct(
        SessionFactory $customerSession,
        ScopeConfigInterface $scopeConfig
    )
    {
        $this->customerSession = $customerSession;
        $this->scopeConfig = $scopeConfig;
    }

    public function afterToHtml($subject, $result){
        if($this->isConfigEnable() && !$this->getCustomerId()){
            $message = __("You need to log in to see product price");
            $result = '<span style="color:red">'. $message .'</span>';
        }
        return $result;
    }
    public function getCustomerId(){
        /** @var Session $customer */
        $customer = $this->customerSession->create();
        return $customer->getCustomer()->getId();
    }

    public function isConfigEnable(){
        return $this->scopeConfig->getValue(self::CONFIG_PATH);
    }
}