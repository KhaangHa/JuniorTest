<?php

namespace Magenest\Junior\Block\Adminhtml\Form;

use Magento\Config\Block\System\Config\Form\Field\FieldArray\AbstractFieldArray;
use Magento\Framework\DataObject;

/**
 * Class Dynamic
 */
class Dynamic extends AbstractFieldArray
{
    protected $countryRenderer = null;
    protected $renderer = null;
    /**
     * @var CcTypes
     */
    protected $ccTypesRenderer = null;

    protected function getGroupRenderer()
    {
        if (!$this->countryRenderer) {
            $this->countryRenderer = $this->getLayout()->createBlock(
                CustomerGroups::class,
                '',
                ['data' => ['is_render_to_js_template' => true]]
            );
        }
        return $this->countryRenderer;
    }
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


    protected function _prepareToRender()
    {
        $this->addColumn(
            'customer_group',
            [
                'label'     => __('Customer Groups'),
                'renderer'  => $this->getGroupRenderer(),
            ]
        );
        $this->addColumn(
            'clock_type',
            [
                'label'     => __('Clock Type'),
                'renderer'  => $this->getClockType(),
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

}