<?php
    require_once("../Simplify.php");
    Simplify::$publicKey = 'sbpb_MzU1MmEwZTUtN2RlZS00Y2ZhLTlmYTgtNzc4ZmFmMjllNzIx';
    Simplify::$privateKey = 'UBba2MSVPrO4bRbzhICNNQaITectH3T0GNCp/5D9sCB5YFFQL0ODSXAOkNtXTToq';
    $token = $_POST['simplifyToken'];
    $payment = Simplify_Payment::createPayment(array(
            'amount' => '1000',
            'token' => $token,
            'description' => 'prod description',
            'currency' => 'EURO'
    ));
    if ($payment->paymentStatus == 'APPROVED') {
        echo "Payment approved\n";
    }
?>