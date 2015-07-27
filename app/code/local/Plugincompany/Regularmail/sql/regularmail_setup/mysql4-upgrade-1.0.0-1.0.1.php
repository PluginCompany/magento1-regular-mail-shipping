<?php
$installer = $this;
$installer->startSetup();

$installer->addAttributeGroup(Mage_Catalog_Model_Product::ENTITY, 'Default', 'Regular Mail', 1000);

$installer->addAttribute("catalog_product", "allow_regularmail",  array(
    'group'	   => 'Regular Mail',
    "type"     => "int",
    "backend"  => "",
    "frontend" => "",
    "label"    => "Enable Shipping Method",
    "input"    => "select",
    "class"    => "",
    "source"   => "regularmail/source_yesnodefault",
    "global"   => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
    "visible"  => true,
    "required" => false,
    "user_defined"  => false,
    "default" => 0,
    "searchable" => false,
    "filterable" => false,
    "comparable" => false,
    "visible_on_front"  => false,
    "unique"     => false,
    "note"       => "",
    "sort_order" => 1
	));

$installer->addAttribute("catalog_product", "regularmail_units",  array(
    'group'	   => 'Regular Mail',
    "type"     => "decimal",
    "backend"  => "",
    "frontend" => "",
    "input_renderer" => 'regularmail/renderer_units',
    "label"    => "Product Size",
    "default"  => "",
    "global"   => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
    "visible"  => true,
    "required" => false,
    "user_defined"  => false,
    "searchable" => false,
    "filterable" => false,
    "comparable" => false,
    "visible_on_front"  => false,
    "unique"     => false,
    "note"       => "The size of one item measured in amount of <span class='pcunits'>envelope units</span>. Leave empty to use the default configuration value.",
    "sort_order" => 10
));
$installer->endSetup();
	 