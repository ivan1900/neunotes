<?php namespace App\Src\bussines\notes\infrastructure;

use App\Src\bussines\notes\domain\Note;
use App\Src\bussines\notes\domain\NoteUuid;
use App\Src\bussines\notes\domain\INoteRepository;
use App\Src\bussines\notes\domain\INoteSpecification;
use App\Src\shared\infrastructure\codeigniter\CIRepository;
use App\Src\bussines\notes\application\ResponseNote;
//use App\Src\bussines\notes\application\ResponseNotesList;

use DateTimeZone;

final class NoteRepositoryMySql extends CIRepository implements INoteRepository
{

    public function save(Note $note)
    {
        $data = [
            'uuid' => $note->uuid()->value(),
            'title' => $note->title()->value(),
            'content' => $note->content()->value(),
            'created_at' => $note->created_at()->value(),
            'updated_at' => $note->updated_at()->value()
        ];
        $db = \Config\Database::connect();
        $builder = $db->table('notes');
        $builder->insert($data);
    }

    public function searchByCriteria(INoteSpecification $specification)
    {

    }

    public function delete(NoteUuid $Uuid)
    {

    }

}