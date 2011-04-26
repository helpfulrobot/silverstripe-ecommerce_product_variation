<?php

Director::addRules(50, array(
	'createecommercevariations/$Action/$ProductID' => 'CreateEcommerceVariations',
	'createecommercevariationsbatch/$Action' => 'CreateEcommerceVariations_Batch'
));

Object::add_extension("ProductVariation", "Buyable");
Object::add_extension("Product", "ProductWithVariationDecorator");
Object::add_extension("Product_Controller", "ProductWithVariationDecorator_Controller");
Object::add_extension("ProductBulkLoader","ProductVariationBulkLoader");

Product_Controller::$allowed_actions[] = 'VariationForm';
Product_Controller::$allowed_actions[] = 'addvariation';
LeftAndMain::require_javascript(THIRDPARTY_DIR."/jquery/jquery.js");
LeftAndMain::require_javascript(THIRDPARTY_DIR."/jquery-livequery/jquery.livequery.js");
LeftAndMain::require_javascript("ecommerce_product_variation/javascript/CreateEcommerceVariationsField.js");
LeftAndMain::require_themed_css("CreateEcommerceVariationsField");

ProductsAndGroupsModelAdmin::$model_importers['ProductVariation'] = null;

//copy the lines between the START AND END line to your /mysite/_config.php file and choose the right settings
// __________________________________ START ECOMMERCE PRODUCT VARIATIONS MODULE CONFIG __________________________________
//MAY SET
//ProductVariation::add_title_style_option($code = "minimal", $showType = true, $betweenTypeAndValue = ": ", $betweenVariations  =" / ");
//ProductsAndGroupsModelAdmin::add_managed_model("ProductAttributeValue");
//ProductsAndGroupsModelAdmin::add_managed_model("ProductAttributeType");
//LeftAndMain::require_javascript("mysite/javascript/MyCreateEcommerceVariationsField.js");
//Object::add_extension("ProductAttributeValue", "ProductAttributeDecoratorColour_Value");
//Object::add_extension("ProductAttributeType", "ProductAttributeDecoratorColour_Type");
//ProductAttributeDecoratorColour_Value::set_default_contrast_colour("FFFFFF");
//ProductAttributeDecoratorColour_Value::set_default_colour("000000");
//ProductWithVariationDecorator_Controller::set_use_js_validation(false);
//ProductWithVariationDecorator_Controller::set_alternative_validator_class_name("MyValidatorClass");
// __________________________________ END ECOMMERCE PRODUCT VARIATIONS MODULE CONFIG __________________________________
