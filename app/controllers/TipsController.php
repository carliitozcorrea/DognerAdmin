<?php

namespace Vokuro\Controllers;

use Vokuro\Models\Tips;
use Phalcon\Paginator\Adapter\Model as Paginator;

class TipsController extends ControllerBase
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

        $tips = Tips::find($parameters);

        $paginator = new Paginator([
            "data" => $tips,
            "limit" => 10,
            "page" => $numberPage
        ]);

        $this->view->page = $paginator->getPaginate();
    }

    public function editAction($id){
        $tip = Tips::findFirstById($id);
        if (!$tip) {
            $this->flash->error("Tip was not found");
            return $this->dispatcher->forward([
                'action' => 'search'
            ]);
        }
//
//        if ($this->request->isPost()) {
//
//            $tip->assign([
//                'content' => $this->request->getPost('content'),
//            ]);

//            $form = new LegalsForm($tip, [
//                'edit' => true
//            ]);


//            if ($form->isValid($this->request->getPost()) == false) {
//
//                foreach ($form->getMessages() as $message) {
//                    $this->flash->error($message);
//                }
//
//            } else {
//                if (!$legal->save()) {
//                    $this->flash->error($legal->getMessages());
//                } else {
//                    $this->flash->success("Legal was updated successfully");
//                }
//            }
//        }
        $this->view->tip = $tip;

//        $this->view->form = new LegalsForm($legal, [
//            'edit' => true
//        ]);
    }

    public function createAction(){
//        $form = new LegalsForm(null);
//        $this->view->form = $form;
    }
}
