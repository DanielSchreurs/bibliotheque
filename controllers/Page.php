<?php

namespace Controllers;


use Components\Session;
use Models\Author;
use Models\Book;
use Models\Help;
use Models\Library;

class Page extends Base
{
    function __construct(Request $request)
    {
        parent::__construct($request);
        $this->modelHelp = new Help();
        $this->modelLibrary = new Library();
        $this->modelBook = new Book();
        $this->modelAuthor = new Author();
    }


    public function help()
    {
        $date = $this->modelHelp->getAllQuestions();
        $title = 'Comment ça marche';
        return [
            'data' => $date,
            'title' => $title
        ];
    }

    public function search()
    {
        $data = $this->modelHelp->searchALL([
                'books' => [
                    'get' => 'title, id',
                    'where' => ['title', 'datepub'],
                    'what' => $_POST['search']
                ],
                'authors' => [
                    'get' => 'first_name, last_name, id',
                    'where' => ['first_name', 'last_name'],
                    'what' => $_POST['search']
                ],
                'editors' => [
                    'get' => 'name, id',
                    'where' => ['website', 'name'],
                    'what' => $_POST['search']
                ]
            ]
        );
        $title = $_POST['search'];
        return [
            'data' => $data,
            'title' => $title
        ];

    }


    public function accueil()
    {
        $data['book_month'] = $this->modelBook->getLatestBook(3);
        $data['author_month'] = $this->modelAuthor->getAuthorMonth();
        $title = 'Accueil';
        return [
            'data' => $data,
            'title' => $title
        ];
    }

    public function about()
    {
        $data = $this->modelLibrary->view(1);
        $title = 'Tout savoir sur nous';
        return [
            'data' => $data,
            'title' => $title
        ];
    }

    public function user_createAnswer()
    {
        $data['question'] = $this->modelHelp->getQuestion($this->request->id);
        if ($_SERVER['REQUEST_METHOD'] === "POST") {

            $this->modelHelp->validate($this->request->sent);

            if ($this->modelHelp->isValid()) {

                $this->request->sent->question_id = $this->request->id;
                $this->modelHelp->createAnwser($this->request->sent);
                Session::setMessage('Merci, d’avoir répondu à cette question');
                header('Location:' . $_SERVER['PHP_SELF'] . '?m=page&a=help');
                die();
            } else {
                $data['errors'] =$this->modelHelp->getErrors();
                $data['sent'] = $this->request->sent;
            }
        }
        $title = 'Répondre à&nbsp;: ' . $data['question']->question;
        return [
            'data' => $data,
            'title' => $title
        ];
    }

    public function user_createQuestion()
    {

        $data='';
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $this->modelHelp->validate($this->request->sent);

            if ($this->modelHelp->isValid()) {
                $this->modelHelp->createQuestion($this->request->sent);
                Session::setMessage('Merci, la question a été posé avec succès');
                header('Location:' . $_SERVER['PHP_SELF'] . '?m=page&a=help');
            } else {
                $data['errors'] = $this->modelHelp->getErrors();
                $data['sent'] = $this->request->sent;
            }
        }
        $title = 'Poser une question';
        return [
            'data' => $data,
            'title' => $title
        ];
    }

    public function admin_indexHelp()
    {
        {
            $date = $this->modelHelp->getAllQuestions();
            $title = 'Administrer les questions et réponses';
            return [
                'data' => $date,
                'title' => $title
            ];
        }
    }

    public function admin_showQuestion()
    {

        {
            $data = $this->modelHelp->getQuestionAndAnswer($this->request->id);
            $title = 'Supprimer une question et sa réponse';
            return [
                'data' => $data,
                'title' => $title
            ];
        }
    }

    public function admin_deleteQuestion()
    {
        $this->modelHelp->deleteQuestion($this->request->id);
        Session::setMessage('La question et reponse ont été supprimés avec succès.');
        header('Location:' . $_SERVER['PHP_SELF'] . '?m=page&a=admin_indexHelp');
        die();

    }

    public function admin_editQuestion()
    {
        $data['data'] = $this->modelHelp->getQuestionAndAnswer($this->request->id);

        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $this->modelHelp->validate($this->request->sent);
            if ($this->modelHelp->isValid()) {
                $this->modelHelp->updateQuestion($this->request->sent);
                $this->modelHelp->updateAnswer($this->request->sent);
                Session::setMessage('Merci, la question et la réponse ont été modifiés');
                header('Location:' . $_SERVER['PHP_SELF'] . '?m=page&a=admin_indexHelp');
                die();
            } else {
                $data['errors'] =$this->modelHelp->getErrors();
                $data['sent'] = $this->request->sent;
            }
        }
        $title = 'Modifer une question et sa réponse';
        return [
            'data' => $data,
            'title' => $title
        ];
    }

}