<?php
return[
    Models\AuthorRepositoryInterface::class => Models\Author::class,
    Models\BookRepositoryInterface::class => Models\Book::class,
    Models\EditorRepositoryInterface ::class => Models\Editor::class,
    Models\HelpRepositoryInterface ::class => Models\Help::class,
    Models\LibraryRepositoryInterface ::class => Models\Library::class,
    Models\UserRepositoryInterface ::class => Models\User::class,
    Models\GenreRepositoryInterface ::class => Models\Genre::class,
    Models\ModelRepositoryInterface ::class => Models\Model::class,
    Models\YearRepositoryInterface ::class => Models\Year::class
];