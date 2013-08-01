<?php
namespace Abishekrsrikaanth\Payto;
use Abishekrsrikaanth\Payto\Providers\AuthorizeNet;
use Abishekrsrikaanth\Payto\Providers\Litle\Litle;

class Payto
{
	public function AuthorizeNet()
	{
		return new AuthorizeNet\AuthorizeNet();
	}


	public function NMI()
	{
		return new NMI();
	}

	public function Litle()
	{
		return new Litle();
	}
}