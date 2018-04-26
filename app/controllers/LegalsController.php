<?php

namespace Vokuro\Controllers;

use Vokuro\Models\Legals;
use Phalcon\Paginator\Adapter\Model as Paginator;
use Vokuro\Forms\LegalsForm;

/**
 * Display the terms and conditions page.
 */
class LegalsController extends ControllerBase
{

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

        $legals = Legals::find($parameters);

        $paginator = new Paginator([
            "data" => $legals,
            "limit" => 10,
            "page" => $numberPage
        ]);

        $this->view->page = $paginator->getPaginate();
    }

    public function editAction($id){
        $legal = Legals::findFirstById($id);
        if (!$legal) {
            $this->flash->error("Legal was not found");
            return $this->dispatcher->forward([
                'action' => 'search'
            ]);
        }

        if ($this->request->isPost()) {

            $legal->assign([
                'content' => $this->request->getPost('content'),
            ]);

            $form = new LegalsForm($legal, [
                'edit' => true
            ]);


            if ($form->isValid($this->request->getPost()) == false) {

                foreach ($form->getMessages() as $message) {
                    $this->flash->error($message);
                }

            } else {
                if (!$legal->save()) {
                    $this->flash->error($legal->getMessages());
                } else {
                    $this->flash->success("Legal was updated successfully");
                }
            }
        }
        $this->view->legal = $legal;

        $this->view->form = new LegalsForm($legal, [
            'edit' => true
        ]);
    }

    public function createAction(){
        $form = new LegalsForm(null);
        $this->view->form = $form;
    }
}
