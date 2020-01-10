<?php

namespace Magenest\Junior\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Sales\Model\Order;
use Magento\Sales\Setup\SalesSetup;
use Magento\Sales\Setup\SalesSetupFactory;

/**
 * Class UpgradeData
 * @package Magenest\Junior\Setup
 */
class UpgradeData implements UpgradeDataInterface
{
    /**
     * @var SalesSetupFactory
     */
    protected $saleSetup;

    /**
     * UpgradeData constructor.
     * @param SalesSetupFactory $salesSetupFactory
     */
    public function __construct(
        SalesSetupFactory $salesSetupFactory
    )
    {
        $this->saleSetup = $salesSetupFactory;
    }

    /**
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $installer = $setup;
        if (version_compare($context->getVersion(), '1.0.3', '<')) {
            $this->addOrderGiftCardAttr($installer);
        }
        $setup->endSetup();
    }

    /**
     * @param ModuleDataSetupInterface $installer
     */
    private function addOrderGiftCardAttr($installer)
    {
        /** @var SalesSetup $saleSetup */
        $saleSetup = $this->saleSetup->create(['resourceName' => 'sales_setup', 'setup' => $installer]);
        $saleSetup->addAttribute(Order::ENTITY, 'gift_card', [
            'type' => Table::TYPE_TEXT,
            'length' => null,
            'visible' => true,
            'nullable' => true
        ]);
        $installer->getConnection()->addColumn(
            $installer->getTable('sales_order_grid'),
            'gift_card',
            [
                'type' => Table::TYPE_TEXT,
                'length' => null,
                'comment' => 'Gift card'
            ]
        );
    }
}