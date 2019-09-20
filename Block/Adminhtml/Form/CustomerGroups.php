<?php
namespace Magenest\Junior\Block\Adminhtml\Form;

use Magenest\Junior\Helper\CustomerGroup;
use Magento\Framework\View\Element\Context;
use Magento\Framework\View\Element\Html\Select;

/**
 * Class Countries
 */
class CustomerGroups extends Select
{
    /**
     * @var Country
     */
    private $helper;

    /**
     * Constructor
     *
     * @param Context $context
     * @param CustomerGroup
     * @param array $data
     */
    public function __construct(Context $context, CustomerGroup $customerHelper, array $data = [])
    {
        parent::__construct($context, $data);
        $this->helper = $customerHelper;
    }

    /**
     * Render block HTML
     *
     * @return string
     */
    protected function _toHtml()
    {
        if (!$this->getOptions()) {
            $this->setOptions($this->helper->getGroups());
        }
        return parent::_toHtml();
    }

    /**
     * Sets name for input element
     *
     * @param string $value
     * @return $this
     */
    public function setInputName($value)
    {
        return $this->setName($value);
    }
}
