<?php namespace Abishekrsrikaanth\Payto\Providers\AuthorizeNet;

use Abishekrsrikaanth\Payto\Providers\BaseProvider;
use Abishekrsrikaanth\Payto\Providers\ProviderException;
use Guzzle\Http\Client;
use Illuminate\Support\Facades\Config;

class AuthorizeNet extends BaseProvider
{
	private $_requestData = array();
	private $_prod_api_url = 'https://secure.authorize.net/gateway/transact.dll';
	private $_sandbox_api_url = 'https://test.authorize.net/gateway/transact.dll';

	public function __construct() {
		$this->_requestData = array(
			"x_version"        => "3.1",
			"x_delim_data"     => "TRUE",
			"x_delim_char"     => Config::get('payto::gateways.authnet.response_delimiter'),
			"x_relay_response" => "FALSE",
		);
	}

	public function authorize() {
		if (empty($this->_cardNumber))
			throw new ProviderException("The Card Number is missing");
		else
			$this->_requestData['x_card_num'] = $this->_cardNumber;

		if (empty($this->_cardExpiry))
			throw new ProviderException("The Card Expiry is missing");
		else
			$this->_requestData['x_exp_date'] = $this->_cardExpiry;

		if (empty($this->_cardCVV))
			throw new ProviderException("The Card CVV is missing");
		else
			$this->_requestData['x_card_code'] = $this->_cardCVV;

		if (empty($this->_orderTotal))
			throw new ProviderException('The Order Total is missing');
		else
			$this->_requestData['x_amount'] = $this->_orderTotal;

		if (empty($this->_descriptor))
			throw new ProviderException('The Transaction Descriptor is missing');
		else {
			$this->_requestData['x_description'] = $this->_descriptor;
			$this->_requestData['x_label']       = $this->_descriptor;
		}

		if (empty($this->_firstName))
			throw new ProviderException('The Billing First Name is missing');
		else
			$this->_requestData['x_first_name'] = $this->_firstName;

		if (empty($this->_lastName))
			throw new ProviderException('The Billing Last Name is missing');
		else
			$this->_requestData['x_last_name'] = $this->_lastName;

		if (empty($this->_address))
			throw new ProviderException('The Billing Address is missing');
		else
			$this->_requestData['x_address'] = $this->_address;

		if (empty($this->_city))
			throw new ProviderException('The Billing City is missing');
		else
			$this->_requestData['x_city'] = $this->_city;

		if (empty($this->_state))
			throw new ProviderException('The Billing State is missing');
		else
			$this->_requestData['x_state'] = $this->_state;

		if (empty($this->_zip))
			throw new ProviderException('The Billing Zip is missing');
		else
			$this->_requestData['x_zip'] = $this->_zip;

		if (empty($this->_country))
			throw new ProviderException('The Billing Country is missing');
		else
			$this->_requestData['x_country'] = $this->_country;

		if (empty($this->_phone))
			throw new ProviderException('The Phone Number is missing');
		else
			$this->_requestData['x_phone'] = $this->_phone;

		if (empty($this->_email))
			throw new ProviderException('The Email Id is missing');
		else
			$this->_requestData['x_email'] = $this->_email;

		if (empty($this->_ipAddress))
			throw new ProviderException('The Customer IP Address is missing');
		else
			$this->_requestData['x_customer_ip'] = $this->_ipAddress;

		$this->_requestData['x_type'] = 'AUTH_ONLY';

		$response = $this->_execute();

		return $this->_processResponse($response);
	}

	public function sale() {
		if (empty($this->_cardNumber))
			throw new ProviderException("The Card Number is missing");
		else
			$this->_requestData['x_card_num'] = $this->_cardNumber;

		if (empty($this->_cardExpiry))
			throw new ProviderException("The Card Expiry is missing");
		else
			$this->_requestData['x_exp_date'] = $this->_cardExpiry;

		if (empty($this->_cardCVV))
			throw new ProviderException("The Card CVV is missing");
		else
			$this->_requestData['x_card_code'] = $this->_cardCVV;

		if (empty($this->_orderTotal))
			throw new ProviderException('The Order Total is missing');
		else
			$this->_requestData['x_amount'] = $this->_orderTotal;

		if (empty($this->_descriptor))
			throw new ProviderException('The Transaction Descriptor is missing');
		else {
			$this->_requestData['x_description'] = $this->_descriptor;
			$this->_requestData['x_label']       = $this->_descriptor;
		}

		if (empty($this->_firstName))
			throw new ProviderException('The Billing First Name is missing');
		else
			$this->_requestData['x_first_name'] = $this->_firstName;

		if (empty($this->_lastName))
			throw new ProviderException('The Billing Last Name is missing');
		else
			$this->_requestData['x_last_name'] = $this->_lastName;

		if (empty($this->_address))
			throw new ProviderException('The Billing Address is missing');
		else
			$this->_requestData['x_address'] = $this->_address;

		if (empty($this->_city))
			throw new ProviderException('The Billing City is missing');
		else
			$this->_requestData['x_city'] = $this->_city;

		if (empty($this->_state))
			throw new ProviderException('The Billing State is missing');
		else
			$this->_requestData['x_state'] = $this->_state;

		if (empty($this->_zip))
			throw new ProviderException('The Billing Zip is missing');
		else
			$this->_requestData['x_zip'] = $this->_zip;

		if (empty($this->_country))
			throw new ProviderException('The Billing Country is missing');
		else
			$this->_requestData['x_country'] = $this->_country;

		if (empty($this->_phone))
			throw new ProviderException('The Phone Number is missing');
		else
			$this->_requestData['x_phone'] = $this->_phone;

		if (empty($this->_email))
			throw new ProviderException('The Email Id is missing');
		else
			$this->_requestData['x_email'] = $this->_email;

		if (empty($this->_ipAddress))
			throw new ProviderException('The Customer IP Address is missing');
		else
			$this->_requestData['x_customer_ip'] = $this->_ipAddress;

		$this->_requestData['x_type'] = 'AUTH_CAPTURE';

		$response = $this->_execute();

		return $this->_processResponse($response);
	}

	public function void() {
		if (empty($this->_transactionId))
			throw new ProviderException('The Transaction Id is missing');
		else
			$this->_requestData['x_trans_id'] = $this->_transactionId;

		$this->_requestData['x_type'] = 'VOID';

		$response = $this->_execute();

		return $this->_processResponse($response);
	}

	public function refund() {
		if (empty($this->_cardNumber))
			throw new ProviderException("The Card Number is missing");
		else
			$this->_requestData['x_card_num'] = $this->_cardNumber;

		if (empty($this->_refundAmount))
			throw new ProviderException('The Refund Amount is missing');
		else
			$this->_requestData['x_amount'] = $this->_refundAmount;

		if (empty($this->_transactionId))
			throw new ProviderException('The Transaction Id is missing');
		else
			$this->_requestData['x_trans_id'] = $this->_transactionId;

		$this->_requestData['x_type'] = 'CREDIT';

		$response = $this->_execute();

		return $this->_processResponse($response);
	}

	public function capture() {
		if (empty($this->_cardNumber))
			throw new ProviderException("The Card Number is missing");
		else
			$this->_requestData['x_card_num'] = $this->_cardNumber;

		if (empty($this->_cardExpiry))
			throw new ProviderException("The Card Expiry is missing");
		else
			$this->_requestData['x_exp_date'] = $this->_cardExpiry;

		if (empty($this->_orderTotal))
			throw new ProviderException('The Order Total is missing');
		else
			$this->_requestData['x_amount'] = $this->_orderTotal;

		if (empty($this->_authCode))
			throw new ProviderException("The Authorization Code is missing");
		else
			$this->_requestData['x_Auth_Code'] = $this->_authCode;
		$this->_requestData['x_type'] = 'CAPTURE_ONLY';

		$response = $this->_execute();

		return $this->_processResponse($response);

	}

	protected function _execute() {
		$login           = Config::get('payto::gateways.authnet.login');
		$transaction_key = Config::get('payto::gateways.authnet.transaction_key');
		if (empty($login))
			throw new ProviderException("The Login is missing");
		else
			$this->_requestData['x_login'] = $login;

		if (empty($transaction_key))
			throw new ProviderException("The Token is missing");
		else
			$this->_requestData['x_tran_key'] = $transaction_key;

		$api_url = Config::get('payto::gateways.authnet.environment') == "sandbox" ? $this->_sandbox_api_url : $this->_prod_api_url;
		$client  = new Client($api_url);
		$request = $client->post(null, array(), $this->_requestData);

		return $request->send()->getBody(true);
	}

	protected function _processResponse($response) {
		return new AuthorizeNetResponse($response);
	}
}