<?php namespace App\Src\bussines\readmodel\languages;

use App\Src\shared\infrastructure\codeigniter\CIRepository;
use App\Src\bussines\readmodel\languages\IGetLanguagesList;
use App\Src\bussines\readmodel\languages\ListLanguages;

class GetLanguagesList extends CIRepository implements IGetLanguagesList
{
    public function getData():array
    {
        $sql = 'select * from languages';
        $result = $this->db->selectSqlArray($sql);
        /*
        $list = array_map(static function ($row){
            $listRow = new ListLanguages();
            $listRow->id = $row['id'];
            $listRow->value = $row['value'];
        }, $result);
        */

        foreach($result as $item)
        {
            $list[] = ListLanguages::new(...$item);
        }

        return $list;
    }
}