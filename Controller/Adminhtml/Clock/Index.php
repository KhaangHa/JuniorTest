<?php

namespace Magenest\Junior\Controller\Adminhtml\Clock;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'Magenest_Junior::clock';

    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * @param Context     $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(Context $context, PageFactory $resultPageFactory)
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * Index action
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        /**
         * @var \Magento\Backend\Model\View\Result\Page $resultPage
         */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Magenest_Junior::clock');
        $resultPage->addBreadcrumb(__('Clock'), __('Clock'));
        $resultPage->addBreadcrumb(__('Clock'), __('Clock'));
        $resultPage->getConfig()->getTitle()->prepend(__('Clock'));

        return $resultPage;
    }

    /**
     * {@inheritdoc}
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed(self::ADMIN_RESOURCE);
    }
}
