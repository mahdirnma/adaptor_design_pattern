<?php
interface PaymentAdaptorInterface{
    public function pay($price);
}
class Pos{
    public function paymentWithCard($price)
    {
        echo "pay price with card: ".$price;
    }

}

class PosAdaptor implements PaymentAdaptorInterface{
    private $pos;
    public function __construct(Pos $pos)
    {
        $this->pos=$pos;
    }

    public function pay($price)
    {
        $this->pos->paymentWithCard($price);
    }

}


class Gateway{
    public function payWithGateway($price)
    {
        echo "pay price with gateway: ".$price;
    }
}
class GatewayAdaptor implements PaymentAdaptorInterface{
    private $gateway;
    public function __construct(Gateway $gateway)
    {
        $this->gateway=$gateway;
    }

    public function pay($price)
    {
        $this->gateway->payWithGateway($price);
    }
}
$gatewayAdaptor=new GatewayAdaptor(new Gateway());
$gatewayAdaptor->pay(2000);

$posAdaptor=new PosAdaptor(new Pos());
$posAdaptor->pay(25000);