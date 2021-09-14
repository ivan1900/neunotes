<?php 

namespace App\Models;

use CodeIgniter\Model;
//use CodeIgniter\Database\ConnectionInterface;
    class CIModel extends Model
    {
            //protected $table = 'usuarios';
            protected $returnType = 'array';
            //protected $db;
            //protected $primaryKey = 'usuario';
            /*
            public function __construct(ConnectionInterface &$db)
            {
                $this->db = &$db;
            } */
            
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
                //$builder = $this->db->table($table);
                //$builder->insert($data);
                $db = $this->db;
                $pQuery = $db->prepare(function($db){
                    return $db->table($this->table)
                                ->insert($this->data);
                });
            }

            public function removeSql($delete)
            {
                $query = $this->db->query($delete);
                return $query;
            }
    }