<?php namespace App\Src\bussines\configuration\application;

use App\Src\bussines\configuration\domain\configuration;
use App\Src\bussines\configuration\domain\ConfigNotExist;
use App\Src\bussines\configuration\application\ConfigFinder;
use App\Src\bussines\configuration\infrastructure\ConfigRepositoryMySql;
use App\Src\bussines\configuration\domain\LanguageWasLoaded;
use App\Src\shared\infrastructure\EventDispatcher;

class GetConfigLanguage
{
    public static function execute()
    {
        $repository = new ConfigRepositoryMySql();
        $configFinder = new ConfigFinder($repository);
        try {
            $language = $configFinder('language');
        } catch (ConfigNotExist $e) {
            throw new \Exception($e->errorCode().' '.$e->errorMessage());
        }
        
        $dispatcher = new EventDispatcher();
        $event[] = new LanguageWasLoaded($language->value());
        $dispatcher->notify($event);

        return $language;
    }
}