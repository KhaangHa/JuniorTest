<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magenest\Junior\Helper;

use Magento\Braintree\Model\Adminhtml\System\Config\Country as CountryConfig;
use \Magento\Customer\Model\ResourceModel\Group\CollectionFactory;

/**
 * Class Country
 */
class CustomerGroup
{
    /**
     * @var CollectionFactory
     */
    private $collectionFactory;

    /**
     * @var array
     */
    private $groups;

    /**
     * @param CollectionFactory $factory
     * @param CountryConfig $countryConfig
     */
    public function __construct(CollectionFactory $factory)
    {
        $this->collectionFactory = $factory;
    }

    /**
     * Returns countries array
     *
     * @return array
     */
    public function getGroups()
    {
        if (!$this->groups) {
            $this->groups= $this->collectionFactory->create()
                ->loadData()
                ->toOptionArray(false);
        }
        return $this->groups;
    }
}
