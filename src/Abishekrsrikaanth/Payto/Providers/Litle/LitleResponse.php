<?php namespace Abishekrsrikaanth\Payto\Providers\Litle;

use Abishekrsrikaanth\Payto\Providers\BaseProviderResponse;
use Abishekrsrikaanth\Payto\Providers\Litle\lib\XMLParser;

class LitleResponse extends BaseProviderResponse
{
	public function __construct($responseObj) {
		$response      = strtoupper(XMLParser::getNode($responseObj, 'response'));
		$responseText  = strtoupper(XMLParser::getNode($responseObj, 'message'));
		$transactionId = XMLParser::getNode($responseObj, 'litleTxnId');

		$this->setResponse($response);
		$this->setResponseText($responseText);
		$this->setTransactionId($transactionId);
		$this->setIsSuccessFull(trim($response) == '000' ? true : false);

		$obj = simplexml_load_string($responseObj);
		$this->setResponseObject(json_decode(json_encode($obj), true));
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

	protected function setResponseObject($responseObject) {
		$this->_responseObject = $responseObject;
	}

}