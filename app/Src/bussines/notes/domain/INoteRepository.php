<?php namespace App\Src\bussines\notes\domain;

interface INoteRepository
{
    public function save(Note $note);

    public function searchByCriteria(INoteSpecification $specification);

    public function delete(NoteUuid $Uuid);

}