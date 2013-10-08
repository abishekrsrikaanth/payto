<?php

namespace Abishekrsrikaanth\Payto\Providers;


abstract class BaseProviderResponse
{
	protected $_response;
	protected $_responseText;
	protected $_transactionId;
	protected $_isSuccessFull;

	public function getResponse() {
		return $this->_response;
	}

	public function getResponseText() {
		return $this->_responseText;
	}

	public function getTransactionId() {
		return $this->_transactionId;
	}

	public function isSuccessFull() {
		return $this->_isSuccessFull;
	}

	abstract protected function setResponse($response);

	abstract protected function setResponseText($responseText);

	abstract protected function setTransactionId($transactionId);

	abstract protected function setIsSuccessFull($isSuccessFull);
}