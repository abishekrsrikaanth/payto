<?php

namespace Abishekrsrikaanth\Payto\Providers;


abstract class BaseProviderResponse
{
	protected $_response;
	protected $_responseText;
	protected $_transactionId;
	protected $_isSuccessFull;
	protected $_responseObject;

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

	public function getResponseObject(){
		return $this->_responseObject;
	}

	abstract protected function setResponse($response);

	abstract protected function setResponseText($responseText);

	abstract protected function setTransactionId($transactionId);

	abstract protected function setIsSuccessFull($isSuccessFull);

	abstract protected function setResponseObject($responseObject);
}