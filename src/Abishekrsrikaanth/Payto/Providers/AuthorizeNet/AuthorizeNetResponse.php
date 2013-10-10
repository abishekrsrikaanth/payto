<?php namespace Abishekrsrikaanth\Payto\Providers\AuthorizeNet;

use Abishekrsrikaanth\Payto\Providers\BaseProviderResponse;
use Illuminate\Support\Facades\Config;

class AuthorizeNetResponse extends BaseProviderResponse
{
	public function __construct($response) {
		$responseArray = explode(Config::get('payto::gateways.authnet.response_delimiter'), $response);
		$responseObj   = array(
			'response_code'         => $responseArray[0],
			'response_subcode'      => $responseArray[1],
			'response_reason_code'  => $responseArray[2],
			'response_reason_text'  => $responseArray[3],
			'authorization_code'    => $responseArray[4],
			'avs_response'          => $responseArray[5],
			'transaction_id'        => $responseArray[6],
			'invoice_number'        => $responseArray[7],
			'description'           => $responseArray[8],
			'amount'                => $responseArray[9],
			'method'                => $responseArray[10],
			'transaction_type'      => $responseArray[11],
			'customer_id'           => $responseArray[12],
			'first_name'            => $responseArray[13],
			'last_name'             => $responseArray[14],
			'company'               => $responseArray[15],
			'address'               => $responseArray[16],
			'city'                  => $responseArray[17],
			'state'                 => $responseArray[18],
			'zip_code'              => $responseArray[19],
			'country'               => $responseArray[20],
			'phone'                 => $responseArray[21],
			'fax'                   => $responseArray[22],
			'email_address'         => $responseArray[23],
			'ship_to_first_name'    => $responseArray[24],
			'ship_to_last_name'     => $responseArray[25],
			'ship_to_company'       => $responseArray[26],
			'ship_to_address'       => $responseArray[27],
			'ship_to_city'          => $responseArray[28],
			'ship_to_state'         => $responseArray[29],
			'ship_to_zip_code'      => $responseArray[30],
			'ship_to_country'       => $responseArray[31],
			'tax'                   => $responseArray[32],
			'duty'                  => $responseArray[33],
			'freight'               => $responseArray[34],
			'tax_exempt'            => $responseArray[35],
			'purchase_order_number' => $responseArray[36],
			'md5_hash'              => $responseArray[37],
			'card_code_response'    => $responseArray[38],
			'cavv_response'         => $responseArray[39],
			'account_number'        => $responseArray[50],
			'card_type'             => $responseArray[51],
			'split_tender_id'       => $responseArray[52],
			'requested_amount'      => $responseArray[53],
			'balance_on_card'       => $responseArray[54],
		);
		$this->setResponse($responseObj['response_code']);
		$this->setResponseText($responseObj['response_reason_text']);
		$this->setTransactionId($responseObj['transaction_id']);
		if (trim($this->_response) == 1)
			$this->setIsSuccessFull(true);
		else
			$this->setIsSuccessFull(false);

		$this->setResponseObject($responseObj);
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

	public function getAuthorizationCode() {
		return $this->_responseObject['authorization_code'];
	}
}