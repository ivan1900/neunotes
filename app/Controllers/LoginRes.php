<?php namespace App\Controllers;

use \App\Libraries\Oauth;
use \OAuth2\Request;
use CodeIgniter\API\ResponseTrait;

class LoginRes extends BaseController
{
	use ResponseTrait;

	public function login()
	{
		$oauth = new Oauth();
		$request = new Request();
		$response = $oauth->server->handleTokenRequest($request->createFromGlobals());
		$code = $response->getStatusCode();
		$body = $response->getResponseBody();
		if($code == 401){
			$body = '{"error":"invalid_grant","error_description":"Usuario o contraseña invalidos"}';
		}
		
		//desde aquí eliminar para producción
		$this->response->setHeader("Access-Control-Allow-Origin", "*");
		$this->response->setHeader("Access-Control-Allow-Methods","GET, POST, OPTIONS, PUT, DELETE");
		$this->response->setHeader("Access-Control-Allow-Headers", "Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
		
		$this->response->setStatusCode(200);
		//hasta aquí eliminar para producción

		return $this->respond(json_decode($body), $code);
	}

	

}