<?php

namespace CustomerFamily\Form;

use Thelia\Form\BaseForm;

/**
 * Class CustomerFamilyCodeForm
 * @package CustomerFamily\Form
 * @author Alexandre BOTHAMY
 */
class CustomerFamilyCodeForm extends BaseForm
{
    public function getName()
    {
        return 'customer_family_code_update';
    }

    protected function buildForm()
    {
        $this->formBuilder
            ->add(
                'customer_family_id',
                'integer'
            )
            ->add(
                'promo_code',
                'integer'
            )

            ->add(
                'use_equation_product_selling',
                'checkbox',
                []
            )
            ->add(
                'amount_added_before',
                'number',
                [
                    'precision' => 6,
                    'required' => false
                ]
            )
            ->add(
                'amount_added_after',
                'number',
                [
                    'precision' => 6,
                    'required' => false
                ]
            )
            ->add(
                'coefficient',
                'number',
                [
                    'precision' => 6,
                    'required' => false
                ]
            )
            ->add(
                'shipping_offered',
                'checkbox',
                []
            )
        ;
    }
}