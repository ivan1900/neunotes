<?php

namespace App\Filters;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

use \App\Libraries\Oauth;
use \OAuth2\Request;
use \OAuth2\Response;


class OauthFilter extends ResourceController implements FilterInterface 
{
  public function before(RequestInterface $request, $arguments = null)
  {
    $oauth = new Oauth();
    $request = Request::createFromGlobals();
    $response = new Response();

    //this remove in production
    
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
      // header("HTTP/1.1 204 OK");
      //$this->response->setStatusCode(201);
     // $response->setStatusCode(200);
     header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
        header('Access-Control-Allow-Headers: token, Content-Type');
        header('Access-Control-Max-Age: 1728000');
        header('Content-Length: 0');
        header('Content-Type: text/plain');
      // die();
      return $response;
    } 

    if (!$oauth->server->verifyResourceRequest($request)) {
      $oauth->server->getResponse()->send();
      die();
    }
  }

  //--------------------------------------------------------------------

  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
  {
    // Do something here
  }
}
