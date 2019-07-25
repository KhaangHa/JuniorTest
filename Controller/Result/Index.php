<?php
namespace Magenest\Junior\Controller\Result;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;

class Index extends Action
{
    protected $resultPageFactory;
    protected $_helper;
    protected $_cacheTypeList, $_cacheFrontendPool;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magenest\Demo\Helper\SetConfig $setConfig,
        \Magento\Framework\App\Cache\TypeListInterface $cacheTypeList,
        \Magento\Framework\App\Cache\Frontend\Pool $cacheFrontendPool
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->_helper = $setConfig;
        $this->_cacheTypeList = $cacheTypeList;
        $this->_cacheFrontendPool = $cacheFrontendPool;
        parent::__construct($context);
    }
    public function execute()
    {
        $model = $this->_objectManager->create('Magenest\Junior\Model\Rules');
        $data = ['sample_data' => 'data', 'date' => date("H:i:s"), 'Base' => 0];
        $model->setTitle('Demo')->setStatus('pending')->setRuleType(1)->setConditionSerialized(serialize($data));
        $model->save();

        $resultRedirect = $this->resultRedirectFactory->create();
        return $resultRedirect->setPath('junior/index');
    }
}