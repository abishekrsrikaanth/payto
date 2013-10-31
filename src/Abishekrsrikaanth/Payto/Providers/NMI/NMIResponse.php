<?php

namespace Abishekrsrikaanth\Payto\Providers\NMI;

use Abishekrsrikaanth\Payto\Providers\BaseProviderResponse;

class NMIResponse extends BaseProviderResponse
{
    public function __construct($response)
    {
        $responseObj   = explode('&', $response);
        $responseArray = array();
        for ($i = 0; $i < count($responseObj); $i++) {
            $rdata                                = explode("=", $responseObj[$i]);
            $responseArray[strtoupper($rdata[0])] = $rdata[1];
        }
        $this->setResponse($responseArray['RESPONSE']);
        $this->setResponseText($responseArray['RESPONSETEXT']);
        $this->setTransactionId($responseArray['TRANSACTIONID']);
        $this->setIsSuccessFull($this->_response == 1 ? true : false);
        $this->setResponseObject($responseArray);

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

    protected function setResponseObject($responseObject)
    {
        $this->_responseObject = $responseObject;
    }
}
