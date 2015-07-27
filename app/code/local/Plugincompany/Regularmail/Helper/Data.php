<?php
class Plugincompany_Regularmail_Helper_Data extends Mage_Core_Helper_Abstract
{
    public function getAllowRegularMail($productId)
    {
        $_resource = Mage::getSingleton('catalog/product')->getResource();
        $allowed = $_resource->getAttributeRawValue($productId,  'allow_regularmail', Mage::app()->getStore());
        if($allowed === false){
            return Mage::getStoreConfigFlag('carriers/regularmail/product_enabled');
        }
        if($allowed == Plugincompany_Regularmail_Model_Source_Yesnodefault::NO){
            return false;
        }
        return true;
    }

    public function getSizeUnits($productId)
    {
        $_resource = Mage::getSingleton('catalog/product')->getResource();
        $units = $_resource->getAttributeRawValue($productId,  'regularmail_units', Mage::app()->getStore());
        if(!$units){
            return Mage::getStoreConfig('carriers/regularmail/default_units');
        }
        return $units;
    }
}
	 