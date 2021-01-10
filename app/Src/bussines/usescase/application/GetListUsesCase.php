<?php namespace App\Src\bussines\usescase\application;

use App\Src\shared\domain\criteria\Field;
use App\Src\shared\domain\criteria\Filter;
use App\Src\shared\domain\criteria\Join;
use App\Src\shared\domain\criteria\Criteria;
use App\Src\bussines\usescase\application\UsesCaseFinder;
use App\Src\bussines\usescase\infrastructure\UsesCaseRepositoryMySql;
use App\Src\bussines\usescase\domain\UseCaseNotExists;
use App\Src\bussines\session\application\SessionExceptionMessage;

class GetListUsesCase
{
    public function __invoke()
    {
        $criteria = new Criteria('casos',$this->fields(), null,null,null,null,null);
        $repository = new UsesCaseRepositoryMySql();
        $useCaseFinder = new UsesCaseFinder($repository);
        try
        {
            return $useCaseFinder($criteria);
        }
        catch (UseCaseNotExists $e)
        {
            SessionExceptionMessage::setExceptionMessage($e);
            return null;
        }
    }

    private function fields()
    {
        $fields[0] = new Field('*');
        return $fields;
    }
}