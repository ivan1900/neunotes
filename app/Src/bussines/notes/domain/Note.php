<?php namespace App\Src\bussines\notes\domain;

use App\Src\shared\domain\aggregate\AggregateRoot;
use App\Src\bussines\notes\domain\NoteUuid;
use App\Src\bussines\notes\domain\NoteTitle;
use App\Src\bussines\notes\domain\NoteContent;
use App\Src\bussines\notes\domain\NoteCreated_at;
use App\Src\bussines\notes\domain\NoteUpdated_at;
use App\Src\bussines\notes\domain\NoteWasCreated;

final class Note extends AggregateRoot
{
    public function __construct(
        private NoteUuid $uuid,
        private NoteTitle $title,
        private NoteContent $content,
        private NoteCreated_at $created_at,
        private NoteUpdated_at $updated_at
    )
    {}

    public static function create(
        NoteUuid $uuid,
        NoteTitle $title,
        Notecontent $content,
        NoteCreated_at $noteCreated_at,
        NoteUpdated_at $noteUpdated_at
    ):Note
    {
        $note = new self($uuid, $title, $content, $noteCreated_at, $noteUpdated_at);

        $note->record(new NoteWasCreated(
            $title->value(),
            $uuid->value()
        ));

        return $note;
    }
}