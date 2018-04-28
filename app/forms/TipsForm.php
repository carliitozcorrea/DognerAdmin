<?php
namespace Vokuro\Forms;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\TextArea;

class LegalsForm extends Form
{

    public function initialize($entity = null, $options = null)
    {

        // In edition the id is hidden
        if (isset($options['edit']) && $options['edit']) {
            $id = new Hidden('id');
            $nameDisabled = true;
        } else {
            $id = new Text('id');
            $nameDisabled = false;
        }

        $this->add($id);

        $name = new Text('name', [
            'placeholder' => 'Name',
            'disabled' => $nameDisabled,
            'class' => 'form-control',
        ]);

        $this->add($name);

        $content = new TextArea('content',[
            'placeholder' => 'content',
            'rows' => '10',
            'class' => 'form-control'
        ]);

        $this->add($content);

    }
}
