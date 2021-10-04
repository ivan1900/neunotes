<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

use App\Src\bussines\language\application\CurrentLanguage;
use App\Src\bussines\language\application\LanguageForms;
use App\Src\bussines\language\application\LanguageErrorCodes;
use App\Src\bussines\language\application\LanguageDialogs;

class LanguageResf extends ResourceController
{
    protected $format = 'json';

    public function get($language)
    {
        $response['langMap'] = CurrentLanguage::get($language);
        $response['langMapForms'] = LanguageForms::get($language);
        $response['langMapErrorCodes'] = LanguageErrorCodes::get($language);
        $response['langMapDialogs'] = LanguageDialogs::get($language);
        return $this->response->setJson($response);
    }
}