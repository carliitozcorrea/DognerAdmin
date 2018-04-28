<?php

namespace Vokuro\Controllers;

use Phalcon\Paginator\Adapter\Model as Paginator;
use Vokuro\Models\Tips;
use Vokuro\Forms\TipsForm;

class TipsController extends ControllerBase
{
    const PHOTO_PREFIX = '/img/tips/';
    const VIDEO_PREFIX = '/video/tips/';

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

    public function editAction($id)
    {
        $tip = Tips::findFirstById($id);
        if (!$tip) {
            $this->flash->error("Tip was not found");
            return $this->dispatcher->forward([
                'action' => 'search'
            ]);
        }

        if ($this->request->isPost()) {
            $tip->assign([
                'title' => $this->request->getPost('title'),
                'description' => $this->request->getPost('description'),
                'date' => $this->request->getPost('date'),
            ]);

            $form = new TipsForm($tip, [
                'edit' => true
            ]);

            if (!$form->isValid($this->request->getPost())) {
                foreach ($form->getMessages() as $message) {
                    $this->flash->error($message);
                }
            } else {

                try {
                    if ($this->request->hasFiles()) {
                        foreach ($this->request->getUploadedFiles() as $file) {
                            if ($file->getName() != '') {
                                if ($file->getError()) {
                                    throw new \Exception("Your ".$file->getKey()." is too big. Max file size: 5MB");
                                } else {
                                    $continue = true;
                                    switch ($file->getKey()) {
                                        case 'photo':
                                            $fileName = self::PHOTO_PREFIX . $this->request->getPost('title') . '.' . $file->getExtension();
                                            if ($file->getType() != 'image/jpeg' && $file->getType() != 'image/png') {
                                                $continue = false;
                                                throw new \Exception("Your image must be a JPEG or PNG file");
                                            }
                                            break;

                                        case 'video':
                                            $fileName = self::VIDEO_PREFIX . $this->request->getPost('title') . '.' . $file->getExtension();
                                            if ($file->getType() != 'video/mp4' && $file->getType() != 'image/png') {
                                                $this->flash->error('Your Video must be a MP4 file');
                                                $continue = false;
                                                throw new \Exception("Your Video must be a MP4 file");
                                            }
                                            break;
                                    }
                                    if ($continue) {
                                        $fileNameWithOutSpace = str_replace(' ', '_', $fileName);
                                        $fileNameToLower = strtolower($fileNameWithOutSpace);
                                        if ($file->moveTo(PUBLIC_PATH . $fileNameToLower)) {
                                            $tip->assign([$file->getKey() => $fileNameToLower]);
                                        } else {
                                            throw new \Exception("File Cant Save");
                                        };
                                    }
                                }
                            }
                        }
                    }
                    if (!$tip->save()) {
                        $this->flash->error($tip->getMessages());
                    } else {
                        $this->flash->success("Tip was updated successfully");
                    }

                } catch (\Exception $e) {
                    $this->flash->error($e->getMessage());
                }
            }
        }

        $this->view->tip = $tip;

        $this->view->form = new TipsForm($tip, [
            'edit' => true
        ]);
    }

    public function createAction()
    {
//        $form = new LegalsForm(null);
//        $this->view->form = $form;
    }
}
