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
        $this->Modelhelp = new Help();
        $this->ModelLibrary = new Library();
        $this->ModelBook = new Book();
        $this->ModelAuthor = new Author();
    }


    public function help()
    {
        $date = $this->Modelhelp->getAllQuestions();
        $title = 'Comment ça marche';
        return [
            'data' => $date,
            'title' => $title
        ];
    }

    public function search()
    {
        $data = $this->Modelhelp->searchALL([
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
        $data['book_month'] = $this->ModelBook->getLatestBook(3);
        $data['author_month'] = $this->ModelAuthor->getAuthorMonth();
        $title = 'Accueil';
        return [
            'data' => $data,
            'title' => $title
        ];
    }

    public function about()
    {
        $data = $this->ModelLibrary->view(1);
        $title = 'Tout savoir sur nous';
        return [
            'data' => $data,
            'title' => $title
        ];
    }

    public function user_createAnswer()
    {
        $question = $this->Modelhelp->getQuestion($this->request->id)->question;
        if ($_SERVER['REQUEST_METHOD'] === "POST" && empty($this->request->errors)) {
            $this->request->sent->question_id = $this->request->id;
            $this->Modelhelp->createAnwser($this->request->sent);
            Session::setMessage('Merci, d’avoir répondu à cette question');
            header('Location:' . $_SERVER['PHP_SELF'] . '?m=page&a=help');
            die();
        } else {
            $data['errors'] = $this->request->errors;
            $data['sent'] = $this->request->sent;
            $data['question'] = $this->Modelhelp->getQuestion($this->request->id);
        }
        $title = 'Répondre à&nbsp;: ' . $question;
        return [
            'data' => $data,
            'title' => $title
        ];
    }

    public function user_createQuestion()
    {

        if ($_SERVER['REQUEST_METHOD'] === "POST" && empty($this->request->errors)) {
            $this->Modelhelp->createQuestion($this->request->sent);
            Session::setMessage('Merci, votre question a été demandé');
            header('Location:' . $_SERVER['PHP_SELF'] . '?m=page&a=help');
            die();
        } else {
            $data['errors'] = $this->request->errors;
            $data['sent'] = $this->request->sent;
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
            $date = $this->Modelhelp->getAllQuestions();
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
            $data = $this->Modelhelp->getQuestionAndAnswer($this->request->id);
            $title = 'Supprimer une question et sa réponse';
            return [
                'data' => $data,
                'title' => $title
            ];
        }
    }

    public function admin_deleteQuestion()
    {
        $this->Modelhelp->deleteQuestion($this->request->id);
        Session::setMessage('La question et reponse ont été supprimés avec succès.');
        header('Location:' . $_SERVER['PHP_SELF'] . '?m=page&a=admin_indexHelp');
        die();

    }

    public function admin_editQuestion()
    {
        $data = '';
        if(isset($this->request->error["answer"])){
            die('on modifie juste la question');
            $this->Modelhelp->createQuestion($this->request->sent);
            Session::setMessage('Merci, votre question a été demandé');
            header('Location:' . $_SERVER['PHP_SELF'] . '?m=page&a=help');
            die();
        };
        if ($_SERVER['REQUEST_METHOD'] === "POST" && empty($this->request->errors)) {
            die('ok on modifie la question et la réponse');
            $this->Modelhelp->createQuestion($this->request->sent);
            Session::setMessage('Merci, votre question a été demandé');
            header('Location:' . $_SERVER['PHP_SELF'] . '?m=page&a=help');
            die();
        } else {
            $data['errors'] = $this->request->errors;
            $data['sent'] = $this->request->sent;
        }
        $data['data'] = $this->Modelhelp->getQuestionAndAnswer($this->request->id);
        $title = 'Modifer une question et ca réponse';
        return [
            'data' => $data,
            'title' => $title
        ];
    }

}