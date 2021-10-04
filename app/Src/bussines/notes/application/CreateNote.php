<?php namespace App\Src\bussines\notes\application;

use App\Src\shared\infrastructure\EventDispatcher;
use App\Src\bussines\notes\domain\Note;
use App\Src\bussines\notes\domain\NoteUuid;
use App\Src\bussines\notes\domain\NoteTitle;
use App\Src\bussines\notes\domain\NoteContent;
use App\Src\bussines\notes\domain\NoteCreated_at;
use App\Src\bussines\notes\domain\NoteUpdated_at;
use App\Src\bussines\notes\domain\NoteWasCreated;
use App\Src\bussines\notes\application\RequestCreateNote;
use App\Src\bussines\notes\infrastructure\NoteRepositoryMySql;

final class CreateNote 
{
    private $dispatcher;

    public function __construct()
    {   
        $this->dispatcher = new EventDispatcher;
    }

    public function create(RequestCreateNote $request)
    {
        $uuidCreator = new NoteUuid(null);
        $uuid = $uuidCreator->random();
        $title = new NoteTitle($request->title);
        $content = new NoteContent($request->content);

        $newNote = Note::create($uuid,$title,$content);
        $repository = new NoteRepositoryMySql();

        $repository->save($newNote);

        $events = $newNote->pullDomainEvents();
        $this->dispatcher->notify($events);
    }
}