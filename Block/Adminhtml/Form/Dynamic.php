<?php

namespace Magenest\Junior\Block\Adminhtml\Form;

use Magento\Config\Block\System\Config\Form\Field\FieldArray\AbstractFieldArray;
use Magento\Customer\Model\ResourceModel\Group\Collection;
use Magento\Framework\Data\Form\Element\Factory;
use Magento\Backend\Block\Template\Context;
use Magenest\Junior\Helper\ClockType;

class Dynamic extends AbstractFieldArray
{
    protected $elementFactory;
    protected $customerGroup;
    protected $type;
    public function __construct(
        ClockType $clockType,
        Collection $customerGroup,
        Factory $elementFactory,
        Context $context,
        array $data = []
    )
    {
        parent::__construct($context, $data);
        $this->customerGroup = $customerGroup;
        $this->elementFactory = $elementFactory;
        $this->type = $clockType;
    }

    protected function _prepareToRender()
    {
        $this->addColumn('customer_group', ['label' => __('Customer Group')]);
        $this->addColumn('clock_type', ['label' => __('Clock Type')]);
        $this->_addAfter = false;
        $this->_addButtonLabel = __('Add Clock Type');
    }


    public function renderCellTemplate($columnName)
    {
        if ($columnName == 'customer_group' && isset($this->_columns[$columnName])) {
            $options = $this->customerGroup->toOptionArray();;
            $element = $this->elementFactory->create('select');
            $element->setForm(
                $this->getForm()
            )->setName(
                $this->_getCellInputElementName($columnName)
            )->setHtmlId(
                $this->_getCellInputElementId('<%- _id %>', $columnName)
            )->setValues(
                $options
            )->setDisabled('disabled');
            return str_replace("\n", '', $element->getElementHtml());
        }

        if ($columnName == 'clock_type' && isset($this->_columns[$columnName])
        ) {
            $options = $this->type->getTypes();
            $element = $this->elementFactory->create('select');
            $element->setForm(
                $this->getForm()
            )->setName(
                $this->_getCellInputElementName($columnName)
            )->setHtmlId(
                $this->_getCellInputElementId('<%- _id %>', $columnName)
            )->setValues(
                $options
            );
            return str_replace("\n", '', $element->getElementHtml());
        }
        return parent::renderCellTemplate($columnName);
    }
}