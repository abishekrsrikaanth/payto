<?php namespace Abishekrsrikaanth\Payto\Providers\Litle;

use Abishekrsrikaanth\Payto\Providers\BaseProviderResponse;
use Abishekrsrikaanth\Payto\Providers\Litle\lib\XMLParser;

class LitleResponse extends BaseProviderResponse
{
	private $_responseObject;

	public function __construct($responseObj)
	{
		$response      = strtoupper(XMLParser::getNode($responseObj, 'response'));
		$responseText  = strtoupper(XMLParser::getNode($responseObj, 'message'));
		$transactionId = XMLParser::getNode($responseObj, 'litleTxnId');

		$this->setResponse($response);
		$this->setResponseText($responseText);
		$this->setTransactionId($transactionId);
		if (trim($response) == '000')
			$this->setIsSuccessFull(true);
		else
			$this->setIsSuccessFull(false);

		$obj                   = simplexml_load_string($responseObj);
		$this->_responseObject = json_decode(json_encode($obj), true);
	}

	protected function setResponse($response)
	{
		$this->_response = $response;
	}

	protected function setResponseText($responseText)
	{
		$this->_responseText = $responseText;
	}

	protected function setTransactionId($transactionId)
	{
		$this->_transactionId = $transactionId;
	}

	protected function setIsSuccessFull($isSuccessFull)
	{
		$this->_isSuccessFull = $isSuccessFull;
	}

	public function getResponseObject()
	{
		return $this->_responseObject;
	}
}