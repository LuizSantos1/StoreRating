<?php
/**
 * Magento
 *
 *
 */


/* @var $installer Mage_Core_Model_Resource_Setup */

$installer = $this;

$installer->startSetup();

/**
 * Create table 'storerating_rating'
 */
$storeRating = $installer->getConnection()
    ->newTable($installer->getTable('storerating/rating'))

    ->addColumn('rating_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'unsigned'  => true,
        'nullable'  => false,
        'primary'   => true,
        ), 'Rating Id')

    ->addColumn('customer_id', Varien_Db_Ddl_Table::TYPE_INTEGER, 10, array(
        'nullable'  => true,
        ), 'customer id send a rating')

    ->addColumn('stars', Varien_Db_Ddl_Table::TYPE_INTEGER, 10, array(
        'nullable'  => true,
        ), 'stars quantity')

    ->addColumn('title', Varien_Db_Ddl_Table::TYPE_TEXT, 32, array(
        ), 'Member unique Code')

    ->addColumn('text', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'default' => null
        ), 'comment')

    ->addColumn('created_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
        'nullable'  => false,
        ), 'Created At')

    ->addColumn('updated_at', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
        'nullable'  => false,
        ), 'Updated At')

    ->addColumn('dog_name', Varien_Db_Ddl_Table::TYPE_TEXT, 32, array(
        ), 'Dog Name')

    ->addColumn('photo_path', Varien_Db_Ddl_Table::TYPE_TEXT, 32, array(
        ), 'Photo Path')

    ->addColumn('status', Varien_Db_Ddl_Table::TYPE_TEXT, 32, array(
        ), 'Status')

    ->addIndex($installer->getIdxName('storerating/rating', array('status')),
        array('status'))
    
    ->addIndex($installer->getIdxName('storerating/rating', array('customer_id')),
        array('customer_id'));


$installer->getConnection()->createTable($storeRating);

$installer->endSetup();
