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

	function setFirstName($firstName) {
		$this->_firstName = $firstName;

		return $this;
	}

	function setLastName($lastName) {
		$this->_lastName = $lastName;

		return $this;
	}

	function setAddress($address) {
		$this->_address = $address;

		return $this;
	}

	function setState($state) {
		$this->_state = $state;

		return $this;
	}

	function setCity($city) {
		$this->_city = $city;

		return $this;
	}

	function setZip($zip) {
		$this->_zip = $zip;

		return $this;
	}

	function setCountry($country) {
		$this->_country = $country;

		return $this;
	}

	function setPhone($phone) {
		$this->_phone = $phone;

		return $this;
	}

	function setEmail($email) {
		$this->_email = $email;

		return $this;
	}

	function setCardNumber($cardNumber) {
		$this->_cardNumber = $cardNumber;

		return $this;
	}

	function setCardExpiry($expiry) {
		$this->_cardExpiry = $expiry;

		return $this;
	}

	function setCardCVV($cvv) {
		$this->_cardCVV = $cvv;

		return $this;
	}

	function setCardType($cardType) {
		$this->_cardType = $cardType;

		return $this;
	}

	function setOrderTotal($orderTotal) {
		$this->_orderTotal = $orderTotal;

		return $this;
	}

	function setDescriptor($descriptor) {
		$this->_descriptor = $descriptor;

		return $this;
	}

	function setIPAddress($ipAddress) {
		$this->_ipAddress = $ipAddress;

		return $this;
	}

	function setTransactionId($transactionId) {
		$this->_transactionId = $transactionId;

		return $this;
	}

	function setRefundAmount($refundAmount) {
		$this->_refundAmount = $refundAmount;

		return $this;
	}

	function setOrderId($orderId) {
		$this->_orderId = $orderId;

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