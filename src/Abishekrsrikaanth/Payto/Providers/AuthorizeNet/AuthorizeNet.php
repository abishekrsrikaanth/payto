<?php namespace Abishekrsrikaanth\Payto\Providers\AuthorizeNet;

use Abishekrsrikaanth\Payto\Providers\BaseProvider;

class AuthorizeNet extends BaseProvider
{
	private $_version = "3.1";
	private $_delimitData = "TRUE";
	private $_delimitChar = "|";
	private $_relayResponse = "FALSE";
	private $_api_url = "https://secure.authorize.net/gateway/transact.dll";

	public function authorize() {

	}

	public function sale() {
		// TODO: Implement charge() method.
	}

	public function void() {
		// TODO: Implement void() method.
	}

	public function refund() {
		// TODO: Implement refund() method.
	}

	public function capture() {

	}

	protected function _execute(array $data) {
		$post_string = http_build_query($data, null, "&");
		$request     = curl_init($this->_api_url);
		curl_setopt($request, CURLOPT_HEADER, 0);
		curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($request, CURLOPT_POSTFIELDS, $post_string);
		curl_setopt($request, CURLOPT_SSL_VERIFYPEER, FALSE);

		return curl_exec($request);
	}

	protected function _processResponse($response) {

	}
}