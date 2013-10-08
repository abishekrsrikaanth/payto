<?php namespace Abishekrsrikaanth\Payto\Providers\Litle;

use Abishekrsrikaanth\Payto\Providers\BaseProviderResponse;

class LitleResponse extends BaseProviderResponse
{
	public function __construct($response, $responseText, $transactionId, $isSuccessFull) {
		$this->setResponse($response);
		$this->setResponseText($responseText);
		$this->setTransactionId($transactionId);
		$this->setIsSuccessFull($isSuccessFull);
	}

	protected function setResponse($response) {
		$this->_response = $response;
	}

	protected function setResponseText($responseText) {
		$this->_responseText = $responseText;
	}

	protected function setTransactionId($transactionId) {
		$this->_transactionId = $transactionId;
	}

	protected function setIsSuccessFull($isSuccessFull) {
		$this->_isSuccessFull = $isSuccessFull;
	}
}