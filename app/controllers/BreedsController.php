<?php
namespace Vokuro\Controllers;

use Phalcon\Http\Response;
use Vokuro\Models\Breeds;
use Phalcon\Paginator\Adapter\Model as Paginator;

class BreedsController extends ControllerBase {

    public function initialize()
    {
        $this->view->setTemplateBefore('private');

    }

    public function indexAction()
    {
        return $this->dispatcher->forward(["action" => "search"]);
    }

    public function searchAction()
    {

        $numberPage = 1;

        $numberPage = $this->request->getQuery("page", "int");

        $parameters = [];

        if ($this->persistent->searchParams) {
            $parameters = $this->persistent->searchParams;
        }

        $breeds = Breeds::find($parameters);

        $paginator = new Paginator([
            "data" => $breeds,
            "limit" => 10,
            "page" => $numberPage
        ]);

        $this->view->page = $paginator->getPaginate();
    }

    public function editAction(){

    }
    public function createAction(){

    }

}
