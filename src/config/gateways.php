<?php
return array(
    'authnet' => array(
        'login'              => '',
        'transaction_key'    => '',
        'environment'        => 'sandbox',
        'response_delimiter' => '|'
    ),
    'paypal'  => array(),
    'litle'   => array(
        'user'                => '',
        'password'            => '',
        'merchantId'          => '',
        'timeout'             => '65',
        'proxy'               => '',
        'reportGroup'         => 'Default Report Group',
        'version'             => '',
        'environment'         => 'sandbox', //sandbox,cert,precert,production1,production2
        'litle_requests_path' => '',
        'batch_requests_path' => '',
        'sftp_username'       => '',
        'sftp_password'       => '',
        'batch_url'           => '',
        'tcp_port'            => '',
        'tcp_ssl'             => '1',
        'tcp_timeout'         => '',
        'print_xml'           => '0',
    ),
    'nmi'     => array(
        'login'       => '',
        'password'    => '',
        'environment' => 'sandbox'
    )
);
