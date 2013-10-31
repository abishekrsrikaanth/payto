<?php

namespace Abishekrsrikaanth\Payto\Providers;

abstract class BaseProvider implements ProviderInterface
{
    protected $_firstName;
    protected $_lastName;
    protected $_address;
    protected $_state;
    protected $_city;
    protected $_zip;
    protected $_country;
    protected $_phone;
    protected $_email;

    protected $_cardNumber;
    protected $_cardExpiry;
    protected $_cardCVV;
    protected $_orderTotal;
    protected $_descriptor;
    protected $_cardType;

    protected $_ipAddress;

    protected $_transactionId;
    protected $_refundAmount;
    protected $_orderId;
    protected $_currencyCode = 'USD';

    protected $_authCode;

    public function setFirstName($firstName)
    {
        $this->_firstName = $firstName;

        return $this;
    }

    public function setLastName($lastName)
    {
        $this->_lastName = $lastName;

        return $this;
    }

    public function setAddress($address)
    {
        $this->_address = $address;

        return $this;
    }

    public function setState($state)
    {
        $this->_state = $state;

        return $this;
    }

    public function setCity($city)
    {
        $this->_city = $city;

        return $this;
    }

    public function setZip($zip)
    {
        $this->_zip = $zip;

        return $this;
    }

    public function setCountry($country)
    {
        $this->_country = $country;

        return $this;
    }

    public function setPhone($phone)
    {
        $this->_phone = $phone;

        return $this;
    }

    public function setEmail($email)
    {
        $this->_email = $email;

        return $this;
    }

    public function setCardNumber($cardNumber)
    {
        $this->_cardNumber = $cardNumber;

        return $this;
    }

    public function setCardExpiry($expiry)
    {
        $this->_cardExpiry = $expiry;

        return $this;
    }

    public function setCardCVV($cvv)
    {
        $this->_cardCVV = $cvv;

        return $this;
    }

    public function setCardType($cardType)
    {
        $this->_cardType = $cardType;

        return $this;
    }

    public function setOrderTotal($orderTotal)
    {
        $this->_orderTotal = $orderTotal;

        return $this;
    }

    public function setDescriptor($descriptor)
    {
        $this->_descriptor = $descriptor;

        return $this;
    }

    public function setIPAddress($ipAddress)
    {
        $this->_ipAddress = $ipAddress;

        return $this;
    }

    public function setTransactionId($transactionId)
    {
        $this->_transactionId = $transactionId;

        return $this;
    }

    public function setRefundAmount($refundAmount)
    {
        $this->_refundAmount = $refundAmount;

        return $this;
    }

    public function setOrderId($orderId)
    {
        $this->_orderId = $orderId;

        return $this;
    }

    public function setAuthorizationCode($authCode)
    {
        $this->_authCode = $authCode;

        return $this;
    }

    public function setCurrencyCode($currencyCode)
    {
        $this->_currencyCode = $currencyCode;

        return $this;
    }

    abstract protected function _processResponse($data);
}

class ResponseType
{
    const CHARGE = 0;
    const VOID   = 1;
    const REFUND = 2;
}
