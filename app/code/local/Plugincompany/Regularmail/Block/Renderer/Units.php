<?php
/**
 * Copyright (c) 2014-2026 Plugin Company
 *
 * This file is part of Regular Mail Shipping, released under the MIT License.
 * See the LICENSE file in the project root.
 */
class Plugincompany_Regularmail_Block_Renderer_Units extends Varien_Data_Form_Element_Text
{
    public function getAfterElementHtml()
    {
        $html = parent::getAfterElementHtml();
        return $html."  <script type='text/javascript'>
                            document.observe('dom:loaded', function(){
                                $$('.pcunits').each(function(element){
                                    element.update('" . Mage::getStoreConfig('carriers/regularmail/unit_title') . "');
                                });

                            });
        				</script>";
    }
}