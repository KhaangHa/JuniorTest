<?php

namespace Magenest\Junior\Block\Adminhtml\Form;

use Magento\Config\Block\System\Config\Form\Field\FieldArray\AbstractFieldArray;
use Magento\Framework\DataObject;

/**
 * Class Dynamic
 */
class Dynamic extends AbstractFieldArray
{
    /**
     * @var null
     */
    protected $groupRenderer = null;
    /**
     * @var null
     */
    protected $renderer = null;


    /**
     * @return \Magento\Framework\View\Element\BlockInterface|null
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    protected function getGroupRenderer()
    {
        if (!$this->groupRenderer) {
            $this->groupRenderer = $this->getLayout()->createBlock(
                CustomerGroups::class,
                '',
                ['data' => ['is_render_to_js_template' => true]]
            );
        }
        return $this->groupRenderer;
    }

    /**
     * @return \Magento\Framework\View\Element\BlockInterface|null
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    protected function getClockType()
    {
        if (!$this->renderer) {
            $this->renderer = $this->getLayout()->createBlock(
                ClockTypes::class,
                '',
                ['data' => ['is_render_to_js_template' => true]]
            );
        }
        return $this->renderer;
    }


    /**
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    protected function _prepareToRender()
    {
        $this->addColumn(
            'customer_group',
            [
                'label' => __('Customer Groups'),
                'renderer' => $this->getGroupRenderer(),
            ]
        );
        $this->addColumn(
            'clock_type',
            [
                'label' => __('Clock Type'),
                'renderer' => $this->getClockType(),
            ]
        );
        $this->_addAfter = false;
        $this->_addButtonLabel = __('Add Type');
    }

    /**
     * Prepare existing row data object
     *
     * @param DataObject $row
     * @return void
     */
    protected function _prepareArrayRow(DataObject $row)
    {
        $customerGroup = $row->getGroupRenderer();
        $options = [];
        if ($customerGroup) {
            $options['option_' . $this->getGroupRenderer()->calcOptionHash($customerGroup)]
                = 'selected="selected"';
            $clockType = $row->getClockType();
            $options['option_' . $this->getClockType()->calcOptionHash($clockType)]
                = 'selected="selected"';
        }
        $row->setData('option_extra_attrs', $options);
    }
}