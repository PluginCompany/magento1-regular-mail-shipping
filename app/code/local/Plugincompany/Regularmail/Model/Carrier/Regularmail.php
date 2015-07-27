<?php  
    class Plugincompany_Regularmail_Model_Carrier_Regularmail
		extends Mage_Shipping_Model_Carrier_Abstract
		implements Mage_Shipping_Model_Carrier_Interface
	{  
        protected $_code = 'regularmail';
      
        /** 
        * Collect rates for this shipping method based on information in $request 
        * 
        * @param Mage_Shipping_Model_Rate_Request $data 
        * @return Mage_Shipping_Model_Rate_Result 
        */  
        public function collectRates(Mage_Shipping_Model_Rate_Request $request)
        {

            $unitsPerEnvelope = $this->getConfigData('units_per_envelope');
            $maxEnvelopes = $this->getConfigData('max_envelopes');
            $price = $this->getConfigData('price');
            $priceAdditional = $this->getConfigData('additional_price');

            $helper = Mage::helper('regularmail');

            $totalUnits = 0;
            foreach($request->getAllItems() as $item){
                $allowed = $helper->getAllowRegularMail($item->getProduct()->getId());
                if(!$allowed){
                    return false;
                }
                $units = $helper->getSizeUnits($item->getProduct()->getId());
                $totalUnits += ($units * $item->getQty());
                if($maxEnvelopes){
                    if($totalUnits > ($unitsPerEnvelope * $maxEnvelopes)){
                        return false;
                    }
                }
            }

            $rate = $price;
            $totalUnits = $totalUnits - $unitsPerEnvelope;
            if($totalUnits > 0){
                $additional = ceil($totalUnits / $unitsPerEnvelope);
                $rate += $additional * $priceAdditional;
            }

            $result = Mage::getModel('shipping/rate_result');
            $method = Mage::getModel('shipping/rate_result_method');  
            $method->setCarrier($this->_code);  
            $method->setCarrierTitle($this->getConfigData('title'));
            $method->setMethod($this->_code);  
            $method->setMethodTitle($this->getConfigData('name'));
		    $method->setPrice($rate);
			$method->setCost($rate);
            $result->append($method);  
            return $result;  
        }  

		/**
		 * Get allowed shipping methods
		 *
		 * @return array
		 */
		public function getAllowedMethods()
		{
			return array($this->_code=>$this->getConfigData('name'));
		}
    }  
