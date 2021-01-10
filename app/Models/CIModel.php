<?php 

namespace App\Models;

use CodeIgniter\Model;

    class CIModel extends Model
    {
            //protected $table = 'usuarios';
            protected $returnType = 'array';
            //protected $primaryKey = 'usuario';

            
            public function searchByName($table, $item, $value)
            {
                $builder = $this->db->table($table);
                $builder->Where($item, $value);

                $query =  $builder->get(); 
                $array = $query->getRow();   
                return $array;
            }

            public function selectSql($select)
            {
                $query = $this->db->query($select);
                $result = $query->getResult();
                return $result;
            }

            public function selectSqlArray($select)
            {
                $query = $this->db->query($select);
                $result = $query->getResultArray();
                return $result;
            }

            public function searchCriteria($consulta)
            {
                    
            }

            public function insertData($table, $data)
            {
                $builder = $this->db->table($table);
                $builder->insert($data);
            }

            public function removeSql($delete)
            {
                $query = $this->db->query($delete);
                return $query;
            }
    }