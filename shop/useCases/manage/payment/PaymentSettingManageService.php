<?php

namespace shop\useCases\manage\payment;


use shop\entities\payment\PaymentKeys;
use shop\entities\payment\PaymentOfferta;
use shop\entities\payment\PaymentRules;
use shop\forms\manage\payment\PaymentKeysForm;
use shop\forms\manage\payment\PaymentOffertaForm;
use shop\forms\manage\payment\PaymentRulesForm;

class PaymentSettingManageService
{

    public function editKeys(PaymentKeysForm $form): PaymentKeys
    {
        $paymentKeys = PaymentKeys::findOne(1);
        $paymentKeys->edit($form->privateKey, $form->publicKey);
        $paymentKeys->save();
        return $paymentKeys;
    }


    public function editRules(PaymentRulesForm $form): PaymentRules
    {
        $paymentRules = PaymentRules::findOne(1);
        $paymentRules->edit($form->title, $form->description);
        $paymentRules->save();
        return $paymentRules;
    }


    public function editOfferta(PaymentOffertaForm $form): PaymentOfferta
    {
        $paymentOfferta = PaymentOfferta::findOne(1);
        $paymentOfferta->edit($form->title, $form->description);
        $paymentOfferta->save();
        return $paymentOfferta;
    }


}