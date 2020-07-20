<?php

namespace Viet\Max\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class UpgradeSchema implements UpgradeSchemaInterface
{
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $tableName = $setup->getTable('viet_max');
        if (version_compare($context->getVersion(),'1.0.1','<')){
            if ($setup->getConnection()->isTableExists($tableName) != true){
                $table = $setup->getConnection()->newTable($tableName)
                    ->addColumn(
                        'id',
                        Table::TYPE_INTEGER,
                        null,
                        [
                            'identity' => true,
                            'unsigned' => true,
                            'nullable' => false,
                            'primary' => true
                        ],
                        'Id'
                    )
                    ->addColumn(
                        'name',
                        Table::TYPE_TEXT,
                        null,
                        [
                            'nullable' => false,
                            'default' => ''
                        ],
                        'Name'
                    )
                    ->addColumn(
                        'price',
                        Table::TYPE_FLOAT,
                        null,
                        [
                            'nullable' => false,
                            'default' => '0'
                        ],
                        'Price'
                    )
                    ->addColumn(
                        'status',
                        Table::TYPE_SMALLINT,
                        null,
                        [
                            'nullable' => false,
                            'default' => '1'
                        ],
                        'Status'
                    )
                    ->addColumn(
                        'image',
                        Table::TYPE_TEXT,
                        null,
                        [
                            'nullable' => false,
                            'default' => ''
                        ],
                        'Image'
                    )
                    ->addColumn(
                        'create_at',
                        Table::TYPE_TIMESTAMP,
                        null,
                        [
                            'nullable' => false,
                            'default' => 'CURRENT_TIMESTAMP'
                        ],
                        'Create_at'
                    )
                    ->setComment('Viet Max')
                    ->setOption('type','InnoDB')
                    ->setOption('charset','utf8');
                $setup->getConnection()->createTable($table);
            }
        }
        if (version_compare($context->getVersion(),'1.0.1','<')){
            if ($setup->getConnection()->isTableExists($tableName) == true){
                $column = [
                    'category' => [
                        'type' => Table::TYPE_TEXT,
                        [
                            'nullable' => true,
                            'default' => ''
                        ],
                        'comment' => 'Category',
                    ],
                ];
                foreach ($column as $name => $definition){
                    $setup->getConnection()->addColumn($tableName,$name,$definition);
                }
            }
        }
        $setup->endSetup();
    }
}
