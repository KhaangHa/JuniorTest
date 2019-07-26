<?php

namespace Magenest\Junior\Block\Adminhtml\Config;

use Magento\Config\Block\System\Config\Form\Field\FieldArray\AbstractFieldArray;

/**
 * Class Dynamic
 */
class Dynamic extends AbstractFieldArray
{
    /**
     * Prepare rendering the new field by adding all the needed columns
     */
//    protected $_cmsPage, $pageLayoutBuilder;
//    public function __construct(
//        \Magento\Backend\Block\Template\Context $context,
//        \Magento\Cms\Model\Page $cmsPage,
//        \Magento\Framework\View\Model\PageLayout\Config\BuilderInterface $pageLayoutBuilder,
//        array $data = []
//    ) {
//        $this->_cmsPage = $cmsPage;
//        $this->pageLayoutBuilder = $pageLayoutBuilder;\
//        parent::__construct($context, $data);
//    }

    protected function _prepareToRender()
    {
        $this->addColumn('from_qty', ['label' => __('From'), 'class' => 'select admin__control-select', 'option' => ['value' => 1, 'label' => 'Shit']]);
        $this->addColumn('to_qty', [
            'id' => 'field-config-path-id',     // Dictates store config XML path
            'type' => 'select',            // Sets type of config field
            'sortOrder' => 50,                  // Sort order of field
            'showInDefault' => '1',             // Show in default scope
            'showInWebsite' => '0',             // Show in website scope
            'showInStore' => '0',               // Show in store scope
            'label' => __('My Dynamic Field'),  // Label of field shown in admin
            'options' => [                      // Define field values for types which support fixed values.
                // Alternatively, source_model could be used.
                'option' => [
                    'value1' => [
                        [
                            'value' => 'value1',
                            'label' => 'Label 1'
                        ]
                    ],
                    'value2' => [
                        [
                            'value' => 'value2',
                            'label' => 'Label 2'
                        ]
                    ]
                ]
            ],
            'comment' => __(                    // Field comment
                'This field was generated dynamically'
            ),
            '_elementType' => 'field',          // Fixed value of 'field'
            'path' => 'some-tab/some-group'
        ]);
        $this->addColumn('price', ['label' => __('Price'), 'class' => 'required-entry']);


        $this->_addAfter = false;
        $this->_addButtonLabel = __('Add Type');
    }
}