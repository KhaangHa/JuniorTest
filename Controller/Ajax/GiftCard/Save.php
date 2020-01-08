<?php
namespace Magenest\Junior\Controller\Ajax\GiftCard;
use Magenest\Junior\Helper\Cookie;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;

/**
 * Class Save
 * @package Magenest\Junior\Controller\Ajax\GiftCard
 */
class Save extends Action{
    /**
     * @var Cookie
     */
    protected $cookieHelper;

    /**
     * Save constructor.
     * @param Context $context
     * @param Cookie $cookieHelper
     */
    public function __construct(Context $context, Cookie $cookieHelper)
    {
        $this->cookieHelper = $cookieHelper;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $result = $this->resultFactory->create(ResultFactory::TYPE_JSON);
        try{
            if($this->_request->isAjax()){
                $params = $this->_request->getParams();
                $this->cookieHelper->set(json_encode($params));
                return $result->setData([
                    'errMsg' => false
                ]);
            }
        } catch (\Exception $exception){
            return $result->setData(
                [
                    'errMsg' => $exception->getMessage()
                ]
            );
        }
        return $result->setData([
            'errMsg' => false
        ]);
    }
}