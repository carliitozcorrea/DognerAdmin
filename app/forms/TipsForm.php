<?php
namespace Vokuro\Forms;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\TextArea;
use Phalcon\Forms\Element\File;

class TipsForm extends Form
{

    public function initialize($entity = null, $options = null)
    {

        if (isset($options['edit']) && $options['edit']) {
            $id = new Hidden('id');
        } else {
            $id = new Text('id');
        }

        $this->add($id);

        $name = new Text('title', [
            'placeholder' => 'Title',
            'class' => 'form-control',
        ]);

        $this->add($name);

        $description = new TextArea('description',[
            'placeholder' => 'description',
            'rows' => '10',
            'class' => 'form-control'
        ]);

        $this->add($description);

        $date = new Text('date',[
            'placeholder' => 'date',
            'class' => 'form-control'
        ]);


        $this->add($date);

        $photo = new File('photo',[]);

        $this->add($photo);

        $video = new File('video',[]);



        $this->add($video);

    }
}
