<?php
namespace Abishekrsrikaanth\Payto\Providers;

interface ProviderInterface {
	public function charge();
	public function void();
	public function refund();
}