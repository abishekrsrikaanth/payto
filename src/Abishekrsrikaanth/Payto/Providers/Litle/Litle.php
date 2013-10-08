<?php

namespace Abishekrsrikaanth\Payto\Providers\Litle;

use Abishekrsrikaanth\Payto\Providers\BaseProvider;
use Abishekrsrikaanth\Payto\Providers\Litle\lib\LitleOnlineRequest;
use Abishekrsrikaanth\Payto\Providers\Litle\lib\XMLParser;
use Abishekrsrikaanth\Payto\Providers\ProviderException;

class Litle extends BaseProvider
{
	private $_orderSource;

	public function setOrderSource($orderSource) {
		$this->_orderSource = $orderSource;

		return $this;
	}

	public function sale() {
		$data = array();

		if (empty($this->_orderTotal))
			throw new ProviderException('The Order Total is missing');
		else
			$data['amount'] = $this->_orderTotal;

		if (empty($this->_orderId))
			throw new ProviderException('The Order Id is missing');
		else
			$data['orderId'] = $this->_orderId;

		$billingAddress = array();
		if (empty($this->_firstName) || empty($this->_lastName))
			throw new ProviderException('The Customer Billing Name is missing');
		else
			$billingAddress['name'] = $this->_firstName . ' ' . $this->_lastName;

		if (empty($this->_address))
			throw new ProviderException('The Billing Address is missing');
		else
			$billingAddress['addressLine1'] = $this->_address;

		if (empty($this->_city))
			throw new ProviderException('The Billing City is missing');
		else
			$billingAddress['city'] = $this->_city;

		if (empty($this->_state))
			throw new ProviderException('The Billing State is missing');
		else
			$billingAddress['state'] = $this->_state;

		if (empty($this->_zip))
			throw new ProviderException('The Billing Zip is missing');
		else
			$billingAddress['zip'] = $this->_zip;

		if (empty($this->_country))
			throw new ProviderException('The Billing Country is missing');
		else
			$billingAddress['country'] = $this->_country;

		$data['billToAddress'] = $billingAddress;

		$cardInfo = array();

		if (empty($this->_cardNumber))
			throw new ProviderException("The Card Number is missing");
		else
			$cardInfo['number'] = $this->_cardNumber;

		if (empty($this->_cardNumber))
			throw new ProviderException("The Card Expiry is missing");
		else
			$cardInfo['expDate'] = $this->_cardExpiry;

		if (empty($this->_cardCVV))
			throw new ProviderException("The Card CVV is missing");
		else
			$cardInfo['cardValidationNum'] = $this->_cardCVV;

		if (empty($this->_cardType))
			throw new ProviderException("The Card Type is missing");
		else
			$cardInfo['type'] = $this->_cardType;

		$data['card'] = $cardInfo;

		if (empty($this->_orderSource))
			throw new ProviderException('Order Source is missing');
		else
			$data['orderSource'] = $this->_orderSource;

		$initialize = new LitleOnlineRequest();
		$response   = $initialize->saleRequest($data);

		return $this->_processResponse($response);
	}

	public function void() {
		$data = array();

		if (empty($this->_transactionId))
			throw new ProviderException("The Transaction Id for the refund is missing");
		else
			$data['litleTxnId'] = $this->_transactionId;

		if (empty($this->_orderId))
			throw new ProviderException("The Order Id for Transaction is missing");
		else
			$data['id'] = $this->_orderId;

		$initialize = new LitleOnlineRequest();
		$response   = $initialize->voidRequest($data);

		return $this->_processResponse($response);
	}

	public function refund() {
		$data = array();

		if (empty($this->_transactionId))
			throw new ProviderException("The Transaction Id for the refund is missing");
		else
			$data['litleTxnId'] = $this->_transactionId;

		if (empty($this->_orderId))
			throw new ProviderException("The Order Id for Transaction is missing");
		else
			$data['id'] = $this->_orderId;

		if (empty($this->_refundAmount))
			throw new ProviderException("The Refund amount is missing");
		else
			$data['amount'] = $this->_refundAmount;

		$initialize = new LitleOnlineRequest();
		$response   = $initialize->creditRequest($data);

		return $this->_processResponse($response);
	}

	public function authorize() {
		$data = array();

		if (empty($this->_orderTotal))
			throw new ProviderException('The Order Total is missing');
		else
			$data['amount'] = $this->_orderTotal;

		if (empty($this->_orderId))
			throw new ProviderException('The Order Id is missing');
		else
			$data['orderId'] = $this->_orderId;

		$billingAddress = array();
		if (empty($this->_firstName) || empty($this->_lastName))
			throw new ProviderException('The Customer Billing Name is missing');
		else
			$billingAddress['name'] = $this->_firstName . ' ' . $this->_lastName;

		if (empty($this->_address))
			throw new ProviderException('The Billing Address is missing');
		else
			$billingAddress['addressLine1'] = $this->_address;

		if (empty($this->_city))
			throw new ProviderException('The Billing City is missing');
		else
			$billingAddress['city'] = $this->_city;

		if (empty($this->_state))
			throw new ProviderException('The Billing State is missing');
		else
			$billingAddress['state'] = $this->_state;

		if (empty($this->_zip))
			throw new ProviderException('The Billing Zip is missing');
		else
			$billingAddress['zip'] = $this->_zip;

		if (empty($this->_country))
			throw new ProviderException('The Billing Country is missing');
		else
			$billingAddress['country'] = $this->_country;

		$data['billToAddress'] = $billingAddress;

		$cardInfo = array();

		if (empty($this->_cardNumber))
			throw new ProviderException("The Card Number is missing");
		else
			$cardInfo['number'] = $this->_cardNumber;

		if (empty($this->_cardNumber))
			throw new ProviderException("The Card Expiry is missing");
		else
			$cardInfo['expDate'] = $this->_cardExpiry;

		if (empty($this->_cardCVV))
			throw new ProviderException("The Card CVV is missing");
		else
			$cardInfo['cardValidationNum'] = $this->_cardCVV;

		if (empty($this->_cardType))
			throw new ProviderException("The Card Type is missing");
		else
			$cardInfo['type'] = $this->_cardType;

		$data['card'] = $cardInfo;

		$initialize = new LitleOnlineRequest();
		$response   = $initialize->authorizationRequest($data);

		return $this->_processResponse($response);
	}

	public function capture() {
		$data = array();

		if (empty($this->_transactionId))
			throw new ProviderException("The Transaction Id for the refund is missing");
		else
			$data['litleTxnId'] = $this->_transactionId;

		if (empty($this->_orderId))
			throw new ProviderException("The Order Id for the Transaction is missing");
		else
			$data['id'] = $this->_orderId;

		$initialize = new LitleOnlineRequest();
		$response   = $initialize->captureRequest($data);

		return $this->_processResponse($response);
	}

	protected function _processResponse($responseObj) {
		$response      = strtoupper(XMLParser::getNode($responseObj, 'response'));
		$responseText  = strtoupper(XMLParser::getNode($responseObj, 'message'));
		$transactionId = XMLParser::getNode($responseObj, 'litleTxnId');

		return new LitleResponse($response, $responseText, $transactionId, true);
	}
}