<?php
namespace Magenest\Junior\Setup;
use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\UpgradeSchemaInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{


    /**
     * {@inheritdoc}
     */
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();

        if (version_compare($context->getVersion(), '1.0.8') < 0) {
            $this->createJuniorLog($installer);
        }

        $installer->endSetup();
    }
    public function createJuniorLog($installer)
    {
        $tableName = 'magenest_junior_log';
        if ($installer->tableExists($tableName)) {
            $installer->getConnection()->dropTable($tableName);
        }

        $table = $installer->getConnection()
            ->newTable($installer->getTable($tableName))
            ->addColumn(
                'id',
                Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'ID'
            )
            ->addColumn(
                'stamp',
                Table::TYPE_TEXT,
                255,
                ['nullable' => false],
                "Log stamp"
            );
        $installer->getConnection()->createTable($table);
    }
}