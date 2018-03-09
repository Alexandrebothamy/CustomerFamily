<?php

namespace CustomerFamily\Controller\Admin;

use CustomerFamily\CustomerFamily;
use CustomerFamily\Model\CustomerFamilyCode;
use CustomerFamily\Model\CustomerFamilyCodeQuery;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Thelia\Controller\Admin\BaseAdminController;
use Thelia\Core\Security\AccessManager;
use Thelia\Core\Security\Resource\AdminResources;
use Thelia\Form\Exception\FormValidationException;
use Thelia\Tools\URL;
/**
 * Class CustomerFamilyCodeController
 * @package CustomerFamily\ Controller
 */
class CustomerFamilyCodeController extends BaseAdminController
{
    /**
     * Add or update amounts and factor to calculate promo codes for customer families
     *
     * @return mixed|\Symfony\Component\HttpFoundation\Response|\Thelia\Core\HttpFoundation\Response|static
     */
    public function updateAction()
    {
        // Check rights
        if (null !== $response = $this->checkAuth(
                [AdminResources::MODULE],
                ['CustomerFamily'],
                [AccessManager::VIEW, AccessManager::CREATE, AccessManager::UPDATE]
            )) {
            return $response;
        }

        $form = $this->createForm('customer_family_code_update');
        $error = null;
        $ex = null;

        try {
            $vForm = $this->validateForm($form);

            // If no entry exists for the given CustomerFamilyId & promo_code, create it
            if (null === $customerFamilyCode = CustomerFamilyCodeQuery::create()
                    ->findPk([$vForm->get('customer_family_id')->getData(), $vForm->get('promo_code')->getData()])) {
                // Create new CustomerFamilyCode
                $customerFamilyCode = new CustomerFamilyCode();
                $customerFamilyCode
                    ->setCustomerFamilyId($vForm->get('customer_family_id')->getData())
                    ->setPromoCode($vForm->get('promo_code')->getData());
            }

            // Save data
            $customerFamilyCode
                ->setUseEquationProductSelling($vForm->get('use_equation_product_selling')->getData())
                ->setAmountAddedBefore($vForm->get('amount_added_before')->getData())
                ->setAmountAddedAfter($vForm->get('amount_added_after')->getData())
                ->setMultiplicationCoefficient($vForm->get('coefficient')->getData())
                ->setShippingOffered($vForm->get('shipping_offered')->getData())
                ->save();

        } catch (FormValidationException $ex) {
            $error = $this->createStandardFormValidationErrorMessage($ex);
        } catch (\Exception $ex) {
            $error = $ex->getMessage();
        }

        if ($error !== null) {
            $this->setupFormErrorContext(
                $this->getTranslator()->trans("CustomerFamily configuration", [], CustomerFamily::MODULE_DOMAIN),
                $error,
                $form,
                $ex
            );
            return $this->render('module-configure', ['module_code' => 'CustomerFamily']);
        }

        return RedirectResponse::create(URL::getInstance()->absoluteUrl("/admin/module/CustomerFamily"));
    }
}