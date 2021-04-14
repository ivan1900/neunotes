<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

use \App\Libraries\Oauth;
use \OAuth2\Request;
use \OAuth2\Response;


class OauthFilter implements FilterInterface
{
  public function before(RequestInterface $request, $arguments = null)
  {
    $oauth = new Oauth();
    $request = Request::createFromGlobals();
    $response = new Response();
/*
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
      header("HTTP/1.1 200 OK");
      return $response;
    } */

    if (!$oauth->server->verifyResourceRequest($request)) {
      $oauth->server->getResponse()->send();
      //$this->response->setHeader("Access-Control-Allow-Credentials", "true");
      die();
    }
  }

  //--------------------------------------------------------------------

  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
  {
    // Do something here
  }
}
