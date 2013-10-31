<?php
namespace Abishekrsrikaanth\Payto\Providers\NMI;

use Abishekrsrikaanth\Payto\Providers\BaseProvider;
use Abishekrsrikaanth\Payto\Providers\ProviderException;
use Guzzle\Http\Client;
use Illuminate\Support\Facades\Config;

class NMI extends BaseProvider
{
    private $_requestData = array();
    private $_apiUrl = 'https://secure.networkmerchants.com/api/transact.php';


    public function sale() {
        if (empty($this->_cardNumber))
            throw new ProviderException("The Card Number is missing");
        else
            $this->_requestData['ccnumber'] = urlencode($this->_cardNumber);

        if (empty($this->_cardExpiry))
            throw new ProviderException("The Card Expiry is missing");
        else
            $this->_requestData['ccexp'] = urlencode($this->_cardExpiry);

        if (empty($this->_cardCVV))
            throw new ProviderException("The Card CVV is missing");
        else
            $this->_requestData['cvv'] = urlencode($this->_cardCVV);

        if (empty($this->_orderTotal))
            throw new ProviderException('The Order Total is missing');
        else
            $this->_requestData['amount'] = urlencode($this->_orderTotal);

        if (empty($this->_descriptor))
            throw new ProviderException('The Transaction Descriptor is missing');
        else {
            $this->_requestData['descriptor'] = urlencode($this->_descriptor);
        }

        if (empty($this->_firstName))
            throw new ProviderException('The Billing First Name is missing');
        else
            $this->_requestData['firstname'] = urlencode($this->_firstName);

        if (empty($this->_lastName))
            throw new ProviderException('The Billing Last Name is missing');
        else
            $this->_requestData['lastname'] = urlencode($this->_lastName);

        if (empty($this->_address))
            throw new ProviderException('The Billing Address is missing');
        else
            $this->_requestData['address1'] = urlencode($this->_address);

        if (empty($this->_city))
            throw new ProviderException('The Billing City is missing');
        else
            $this->_requestData['city'] = urlencode($this->_city);

        if (empty($this->_state))
            throw new ProviderException('The Billing State is missing');
        else
            $this->_requestData['state'] = urlencode($this->_state);

        if (empty($this->_zip))
            throw new ProviderException('The Billing Zip is missing');
        else
            $this->_requestData['zip'] = urlencode($this->_zip);

        if (empty($this->_country))
            throw new ProviderException('The Billing Country is missing');
        else
            $this->_requestData['country'] = urlencode($this->_country);

        if (empty($this->_phone))
            throw new ProviderException('The Phone Number is missing');
        else
            $this->_requestData['phone'] = urlencode($this->_phone);

        if (empty($this->_email))
            throw new ProviderException('The Email Id is missing');
        else
            $this->_requestData['email'] = urlencode($this->_email);

        if (empty($this->_ipAddress))
            throw new ProviderException('The Customer IP Address is missing');
        else
            $this->_requestData['ipaddress'] = urlencode($this->_ipAddress);
        $this->_requestData['type'] = 'sale';

        $response = $this->_execute();

        return $this->_processResponse($response);
    }

    public function void() {
        if (empty($this->_transactionId))
            throw new ProviderException("The Transaction Id for the refund is missing");
        else
            $this->_requestData['transactionid'] = $this->_transactionId;

        $this->_requestData['type'] = 'void';
        $response                   = $this->_execute();

        return $this->_processResponse($response);
    }

    public function refund() {
        if (empty($this->_transactionId))
            throw new ProviderException("The Transaction Id for the refund is missing");
        else
            $this->_requestData['transactionid'] = $this->_transactionId;

        if (empty($this->_refundAmount))
            throw new ProviderException("The Refund amount is missing");
        else
            $this->_requestData['amount'] = $this->_refundAmount;

        $this->_requestData['type'] = 'refund';
        $response                   = $this->_execute();

        return $this->_processResponse($response);
    }

    public function authorize() {
        if (empty($this->_cardNumber))
            throw new ProviderException("The Card Number is missing");
        else
            $this->_requestData['ccnumber'] = urlencode($this->_cardNumber);

        if (empty($this->_cardExpiry))
            throw new ProviderException("The Card Expiry is missing");
        else
            $this->_requestData['ccexp'] = urlencode($this->_cardExpiry);

        if (empty($this->_cardCVV))
            throw new ProviderException("The Card CVV is missing");
        else
            $this->_requestData['cvv'] = urlencode($this->_cardCVV);

        if (empty($this->_orderTotal))
            throw new ProviderException('The Order Total is missing');
        else
            $this->_requestData['amount'] = urlencode($this->_orderTotal);

        if (empty($this->_descriptor))
            throw new ProviderException('The Transaction Descriptor is missing');
        else {
            $this->_requestData['descriptor'] = urlencode($this->_descriptor);
        }

        if (empty($this->_firstName))
            throw new ProviderException('The Billing First Name is missing');
        else
            $this->_requestData['firstname'] = urlencode($this->_firstName);

        if (empty($this->_lastName))
            throw new ProviderException('The Billing Last Name is missing');
        else
            $this->_requestData['lastname'] = urlencode($this->_lastName);

        if (empty($this->_address))
            throw new ProviderException('The Billing Address is missing');
        else
            $this->_requestData['address1'] = urlencode($this->_address);

        if (empty($this->_city))
            throw new ProviderException('The Billing City is missing');
        else
            $this->_requestData['city'] = urlencode($this->_city);

        if (empty($this->_state))
            throw new ProviderException('The Billing State is missing');
        else
            $this->_requestData['state'] = urlencode($this->_state);

        if (empty($this->_zip))
            throw new ProviderException('The Billing Zip is missing');
        else
            $this->_requestData['zip'] = urlencode($this->_zip);

        if (empty($this->_country))
            throw new ProviderException('The Billing Country is missing');
        else
            $this->_requestData['country'] = urlencode($this->_country);

        if (empty($this->_phone))
            throw new ProviderException('The Phone Number is missing');
        else
            $this->_requestData['phone'] = urlencode($this->_phone);

        if (empty($this->_email))
            throw new ProviderException('The Email Id is missing');
        else
            $this->_requestData['email'] = urlencode($this->_email);

        if (empty($this->_ipAddress))
            throw new ProviderException('The Customer IP Address is missing');
        else
            $this->_requestData['ipaddress'] = urlencode($this->_ipAddress);

        $this->_requestData['type'] = 'auth';
        $response                   = $this->_execute();

        return $this->_processResponse($response);
    }

    public function capture() {
        if (empty($this->_transactionId))
            throw new ProviderException("The Transaction Id for the refund is missing");
        else
            $this->_requestData['transactionid'] = $this->_transactionId;

        if (empty($this->_orderTotal))
            throw new ProviderException("The Refund amount is missing");
        else
            $this->_requestData['amount'] = $this->_orderTotal;

        $this->_requestData['type'] = 'capture';
        $response                   = $this->_execute();

        return $this->_processResponse($response);
    }

    protected function _execute() {
        $login    = Config::get('payto::gateways.nmi.login');
        $password = Config::get('payto::gateways.nmi.password');
        $env      = Config::get('payto::gateways.nmi.environment');

        if (empty($login)) {
            if ($env != "sandbox")
                throw new ProviderException("The Login is missing");
            else
                $this->_requestData['username'] = "demo";
        } else
            $this->_requestData['username'] = $env == "sandbox" ? "demo" : $login;

        if (empty($password)) {
            if ($env != "sandbox")
                throw new ProviderException("The Password is missing");
            else
                $this->_requestData['password'] = "password";
        } else
            $this->_requestData['password'] = $env == "sandbox" ? "password" : $password;


        $client = new Client($this->_apiUrl, array(
            'curl.options' => array(
                'CURLOPT_SSLVERSION' => '3'
            )));

        $client->setSslVerification(false, false, 0);
        $request = $client->post($this->_apiUrl, array(), $this->_requestData);

        return $request->send()->getBody(true);
    }

    protected function _processResponse($response) {
        return new NMIResponse($response);
    }
}