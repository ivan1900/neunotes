<?php namespace App\Src\bussines\notes\domain;

use App\Src\shared\domain\aggregate\AggregateRoot;
use App\Src\bussines\notes\domain\NoteUuid;
use App\Src\bussines\notes\domain\NoteTitle;
use App\Src\bussines\notes\domain\NoteContent;
use App\Src\bussines\notes\domain\NoteCreated_at;
use App\Src\bussines\notes\domain\NoteUpdated_at;
use App\Src\bussines\notes\domain\NoteWasCreated;
use DateTimeZone;
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
    ):Note
    {
        $date = new \DateTime("now", new DateTimeZone('UTC'));
        $noteCreated_at = new NoteCreated_at($date->format('Y-m-d H:i'));
        $noteUpdated_at = new NoteUpdated_at(null);
        $note = new self($uuid, $title, $content, $noteCreated_at, $noteUpdated_at);

        $note->record(new NoteWasCreated(
            $title->value(),
            $uuid->value()
        ));

        return $note;
    }

    public function uuid()
    {
        return $this->uuid;
    }

    public function title()
    {
        return $this->title;
    }

    public function content()
    {
        return $this->content;
    }

    public function created_at()
    {
        return $this->created_at;
    }

    public function updated_at()
    {
        return $this->updated_at;
    }
}