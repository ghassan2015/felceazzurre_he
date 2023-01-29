<?php

namespace App\Repository\Orders;

interface OrderInterface
{
    public function index();
    public function addOrder($request);

}
