<?php
namespace Abishekrsrikaanth\Payto;

use Abishekrsrikaanth\Payto\Providers\AuthorizeNet\AuthorizeNet;
use Abishekrsrikaanth\Payto\Providers\Litle\Litle;
use Abishekrsrikaanth\Payto\Providers\NMI\NMI;

class Payto
{
    public function AuthNet()
    {
        return new AuthorizeNet();
    }

    public function NMI()
    {
        return new NMI();
    }

    /**
     * Creates and Instance of the Litle Class
     * @return Litle
     */
    public function Litle()
    {
        return new Litle();
    }
}
