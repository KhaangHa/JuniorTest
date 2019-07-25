<?php
namespace Magenest\Junior\Plugin\Rules;
use Magento\Framework\App\ObjectManager;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\ResultFactory;
use Symfony\Component\DependencyInjection\Tests\Compiler\H;

class AfterSave
{
    protected $_messageManager;

    protected $_resultRedirect;

    protected $_objectManager;

    public function __construct(
        \Magento\Framework\Message\ManagerInterface $messageManager,
        ResultFactory $result,
        \Magento\Framework\ObjectManagerInterface $objectManager
    )
    {
        $this->_messageManager   = $messageManager;
        $this->_resultRedirect   = $result;
        $this->_objectManager    = $objectManager;
    }

    public function afterSave(\Magenest\Junior\Model\Rules $subject, $proceed)
    {
        $model = $this->_objectManager->get('Magenest\Junior\Model\Log');
        $model->setStamp("Saved at " . date("Y-m-d H:i:s"));
            $model->save();
            return $proceed;
    }
    public function afterLoad(\Magenest\Junior\Model\Rules $subject, $proceed)
    {
        $model = $this->_objectManager->get('Magenest\Junior\Model\Log');
        $model->setStamp("Loaded at " . date("Y-m-d H:i:s"));
        $model->save();
        return $proceed;
    }
}