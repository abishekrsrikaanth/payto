<?php
namespace Abishekrsrikaanth\Payto\Providers;

interface ProviderInterface
{
    public function authorize();

    public function sale();

    public function void();

    public function refund();

    public function capture();
}
