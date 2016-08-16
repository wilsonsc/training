<?php

/**
 * Created by PhpStorm.
 * User: scottwilson
 * Date: 8/16/16
 * Time: 9:25 AM
 */
class Order
{
    private $shippingCost;
    private $handlingCost;
    private $orderItems;
    private $discountCode;

    private function getDiscount($code) {
        switch ($code) {
            case "PUSH":
                return 0.05;
            case "FIFTEEN":
                return 0.15;
            case "GOBLUE":
                return 0.80;
            default:
                return 0;
        }
    }

    public function getShippingCost()
    {
        return $this->shippingCost;
    }

    public function setShippingCost($shippingCost)
    {
        $this->shippingCost = $shippingCost;
    }

    public function getHandlingCost()
    {
        return $this->handlingCost;
    }

    public function setHandlingCost($handlingCost)
    {
        $this->handlingCost = $handlingCost;
    }

    public function getOrderItems()
    {
        return $this->orderItems;
    }

    public function setOrderItems($orderItems)
    {
        $this->orderItems = $orderItems;
    }

    public function getDiscountCode()
    {
        return $this->discountCode;
    }

    public function setDiscountCode($discountCode)
    {
        $this->discountCode = $discountCode;
    }

    public function getTotalCost() {

        $totalPrice = 0;

        foreach ($this->orderItems as $orderItem) {
            $totalPrice += ($orderItem.getPrice() * $orderItem.getQuantity());
        }

        $totalPrice *= (1 - getDiscount($this->discountCode));
        $totalPrice += $this->shippingCost + $this->handlingCost;

        return $totalPrice;

    }
}