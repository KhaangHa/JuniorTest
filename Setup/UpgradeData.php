<?php
namespace Magenest\Junior\Setup;

use Magento\Framework\DB\DataConverter\SerializedToJson;
use Magento\Setup\Exception;

class UpgradeData implements \Magento\Framework\Setup\UpgradeDataInterface
{
    /**
     * @var \Magento\Framework\DB\FieldDataConverterFactory
     */
    private $fieldDataConverterFactory;

    /**
     * @var \Magento\Framework\DB\Select\QueryModifierFactory
     */
    private $queryModifierFactory;

    /**
     * @var \Magento\Framework\DB\Query\Generator
     */
    private $queryGenerator;

    /**
     * Constructor
     *
     * @param \Magento\Framework\DB\FieldDataConverterFactory $fieldDataConverterFactory
     * @param \Magento\Framework\DB\Select\QueryModifierFactory $queryModifierFactory
     * @param \Magento\Framework\DB\Query\Generator $queryGenerator
     */
    public function __construct(
        \Magento\Framework\DB\FieldDataConverterFactory $fieldDataConverterFactory,
        \Magento\Framework\DB\Select\QueryModifierFactory $queryModifierFactory,
        \Magento\Framework\DB\Query\Generator $queryGenerator
    ) {
        $this->fieldDataConverterFactory = $fieldDataConverterFactory;
        $this->queryModifierFactory = $queryModifierFactory;
        $this->queryGenerator = $queryGenerator;
    }

    /**
     * {@inheritdoc}
     */
    public function upgrade(
        \Magento\Framework\Setup\ModuleDataSetupInterface $setup,
        \Magento\Framework\Setup\ModuleContextInterface $context
    )
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $productMetadata = $objectManager->get('Magento\Framework\App\ProductMetadataInterface');

        if (version_compare($context->getVersion(), '1.0.14', '<')) {
            if ($productMetadata->getVersion() > 2.1)
            {
                $this->convertSerializedDataToJson($setup);
            }
            else $this->convertJsonToSerialize($setup);
        }
    }

    /**
     * Upgrade to version 2.0.1, convert data for the sales_order_item.product_options and quote_item_option.value
     * from serialized to JSON format
     *
     * @param \Magento\Framework\Setup\ModuleDataSetupInterface $setup
     * @throws
     * @return void
     */
    private function convertSerializedDataToJson(\Magento\Framework\Setup\ModuleDataSetupInterface $setup)
    {
        try{
            $fieldDataConverter = $this->fieldDataConverterFactory->create(SerializedToJson::class);

            $fieldDataConverter->convert(
                $setup->getConnection(),
                $setup->getTable('magenest_rules'),
                'id',
                'condition_serialized'
            );
        }catch (\Exception $e)
        {
            throw $e;
        }

    }
    private function convertJsonToSerialize(\Magento\Framework\Setup\ModuleDataSetupInterface $setup)
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $collection = $objectManager->create('Magenest\Junior\Model\ResourceModel\Rules\Collection');
        foreach($collection as $item){
            $model = $objectManager->get('Magenest\Junior\Model\Rules')->load($item['id']);
            $data = json_decode($model->getConditionSerialized());
            $model->setConditionSerialized($this->serialize($data))->save();
        }
    }
    private function serialize($data)
    {
        if (class_exists(\Magento\Framework\Serialize\SerializerInterface::class)) {
            $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
            $serializer = $objectManager->create(\Magento\Framework\Serialize\SerializerInterface::class);
            return $serializer->serialize($data);
        }
        return \serialize($data);
    }
}
