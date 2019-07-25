<?php

namespace Magenest\Junior\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * @codeCoverageIgnore
 */
class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();
        $installer->getConnection()->dropTable($installer->getTable('magenest_rules'));

        $table = $installer->getConnection()
            ->newTable($installer->getTable('magenest_rules'))
            ->addColumn(
                'id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                10,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'primary key'
            )->addColumn(
                'title',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                50,
                ['unsigned' => true, 'nullable' => true],
                'Title'
            )->addColumn(
                'status',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                10,
                ['unsigned' => true, 'nullable' => true],
                'Status'
            )->addColumn(
                'rule_type',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                11,
                [
                    'nullable' => true
                ],
                'Rule type'
            )->addColumn(
                'condition_serialized',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                [
                    'nullable' => true
                ],
                'Condition Serialzed'
            )
            ->setComment('Magenest Rules Table');
        $installer->getConnection()->createTable($table);

    }
}