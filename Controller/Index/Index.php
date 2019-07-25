<?php
namespace Magenest\Junior\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;

/**
 * Class Index
 * @package Magenest\Junior\Controller\Index
 */
class Index extends Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    /**
     * @var \Magenest\Junior\Model\ResourceModel\Rules\CollectionFactory|\Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory, $collectionFactory;

    /**
     * Index constructor.
     * @param Context $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     * @param \Magenest\Junior\Model\ResourceModel\Rules\CollectionFactory $collectionFactory
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magenest\Junior\Model\ResourceModel\Rules\CollectionFactory $collectionFactory
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|\Magento\Framework\View\Result\Page
     */
    public function execute()
    {
//        $model = $this->_objectManager->create('Magenest\Junior\Model\Rules')->load(1);

        $this->collectionFactory->create()->getItemsByColumnValue('status', 'pending');

        $resultPage = $this->resultPageFactory->create();
        return $resultPage;
    }
}