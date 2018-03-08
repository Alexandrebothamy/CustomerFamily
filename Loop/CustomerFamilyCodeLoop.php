<?php

namespace CustomerFamily\Loop;

use CustomerFamily\Model\CustomerFamilyPriceQuery;
use Propel\Runtime\ActiveQuery\Criteria;
use Thelia\Core\Template\Element\BaseLoop;
use Thelia\Core\Template\Element\LoopResult;
use Thelia\Core\Template\Element\LoopResultRow;
use Thelia\Core\Template\Element\PropelSearchLoopInterface;
use Thelia\Core\Template\Loop\Argument\Argument;
use Thelia\Core\Template\Loop\Argument\ArgumentCollection;

/**
 * Class CustomerFamilyCodeLoop
 * @package CustomerFamily\Loop
 * @author  Alexandre BOTHAMY
 */
class CustomerFamilyPriceLoop extends BaseLoop implements PropelSearchLoopInterface
{
    /**
     * Definition of loop arguments
     *
     * @return \Thelia\Core\Template\Loop\Argument\ArgumentCollection
     */
    protected function getArgDefinitions()
    {
        return new ArgumentCollection(
            Argument::createIntListTypeArgument('customer_family_id'),
            Argument::createBooleanTypeArgument('promo_code'),
            Argument::createBooleanTypeArgument('use_equation_product_selling')
        );
    }

    /**
     * @return CustomerFamilyPriceQuery
     */
    public function buildModelCriteria()
    {
        $search = CustomerFamilyPriceQuery::create();

        if (null !== $customerFamilyId = $this->getCustomerFamilyId()) {
            $search->filterByCustomerFamilyId($customerFamilyId, Criteria::IN);
        }

        if (null !== $promoCode = $this->getPromoCode()) {
            $search->filterByPromoCode($promoCode);
        }

        if (null !== $useEquationProductSelling = $this->getUseEquationProductSelling()) {
            $search->filterByUseEquationProductSelling($useEquationProductSelling);
        }

        return $search;
    }

    /**
     * @param LoopResult $loopResult
     *
     * @return LoopResult
     */
    public function parseResults(LoopResult $loopResult)
    {
        /** @var \CustomerFamily\Model\CustomerFamilyCode $customerFamilyCode */
        foreach ($loopResult->getResultDataCollection() as $customerFamilyCode) {
            $loopResultRow = new LoopResultRow($customerFamilyCode);

            $loopResultRow
                ->set('CUSTOMER_FAMILY_ID', $customerFamilyCode->getCustomerFamilyId())
                ->set('PROMO_CODE', $customerFamilyCode->getPromoCode())
                ->set('USE_EQUATION_PRODUCT_SELLING', $customerFamilyCode->getUseEquationProductSelling())
                ->set('AMOUNT_ADDED_BEFORE', $customerFamilyCode->getAmountAddedBefore())
                ->set('AMOUNT_ADDED_AFTER', $customerFamilyCode->getAmountAddedAfter())
                ->set('COEFFICIENT', $customerFamilyCode->getMultiplicationCoefficient())
                ->set('SHIPPING_OFFERED', $customerFamilyCode->getShippingOffered());

            $loopResult->addRow($loopResultRow);
        }

        return $loopResult;
    }
}