<?php
/**
 * Copyright (c) 2014-2026 Plugin Company
 *
 * This file is part of Regular Mail Shipping, released under the MIT License.
 * See the LICENSE file in the project root.
 */
/**
 * Admin source yes/no/default model
 *
 * @category    Plugincompany
 * @package     Plugincompany_Storelocator
 * @author      Milan Simek
 */
class Plugincompany_Regularmail_Model_Source_Yesnodefault
    extends Mage_Eav_Model_Entity_Attribute_Source_Abstract {
    const YES = 1;
    const NO = 2;
    const USE_DEFAULT = 0;
    /**
     * get possible values
     * @access public
     * @return array
     * @author Milan Simek
     */
    public function toOptionArray(){
        return array(
            array(
                'label' => Mage::helper('regularmail')->__('Use default config'),
                'value' => self::USE_DEFAULT
            ),
            array(
                'label' => Mage::helper('regularmail')->__('Yes'),
                'value' => self::YES
            ),
            array(
                'label' => Mage::helper('regularmail')->__('No'),
                'value' => self::NO
            )
        );
    }
    /**
     * Get list of all available values
     * @access public
     * @return array
     * @author Milan Simek
     */
    public function getAllOptions() {
        return $this->toOptionArray();
    }
}