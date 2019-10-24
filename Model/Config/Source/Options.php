<?php

namespace Magenest\Junior\Model\Config\Source;

use Magento\Eav\Model\ResourceModel\Entity\Attribute\OptionFactory;

use Magento\Framework\DB\Ddl\Table;

/**
 * Custom Attribute Renderer
 */
class Options extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource

{
    /**
     *
     * @var \Magento\Customer\Model\ResourceModel\Group\Collection
     */
    protected $_customerGroupColl;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Customer\Model\ResourceModel\Group\Collection $customerGroupColl
     * @param array $data
     */
    public function __construct(
        \Magento\Customer\Model\ResourceModel\Group\Collection $customerGroupColl
    ) {
        $this->_customerGroupColl = $customerGroupColl;
    }
    /**
     * Get all options
     *
     * @return array
     */

    public function getAllOptions()
    {
        /* your Attribute options list*/

        $customerGroups = $this->_customerGroupColl->toOptionArray();
        return $customerGroups;
    }


}

