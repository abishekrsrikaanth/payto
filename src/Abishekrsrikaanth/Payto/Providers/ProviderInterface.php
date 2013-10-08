<?php
namespace Abishekrsrikaanth\Payto\Providers;

interface ProviderInterface
{
	function authorize();

	function sale();

	function void();

	function refund();

	function capture();
}