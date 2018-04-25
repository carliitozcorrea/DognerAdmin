<?php
namespace Vokuro\Forms;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\TextArea;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;
use Vokuro\Models\Profiles;

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
            'disabled' => $nameDisabled
        ]);

        $this->add($name);

        $content = new TextArea('content',[
            'placeholder' => 'content',
            'rows' => '10',
            'class' => 'form-control'
        ]);

        $this->add($content);

//        $paternal = new Text('paternal', [
//            'placeholder' => 'Paternal'
//        ]);
//
//        $paternal->addValidators([
//            new PresenceOf([
//                'message' => 'The paternal is required'
//            ])
//        ]);
//
//        $this->add($paternal);
//
//        $maternal = new Text('maternal', [
//            'placeholder' => 'Maternal'
//        ]);
//
//        $maternal->addValidators([
//            new PresenceOf([
//                'message' => 'The paternal is required'
//            ])
//        ]);
//
//        $this->add($maternal);
//
//        $email = new Text('email', [
//            'placeholder' => 'Email'
//        ]);
//
//        $email->addValidators([
//            new PresenceOf([
//                'message' => 'The e-mail is required'
//            ]),
//            new Email([
//                'message' => 'The e-mail is not valid'
//            ])
//        ]);
//
//        $this->add($email);
//
//        $profiles = Profiles::find([
//            'active = :active:',
//            'bind' => [
//                'active' => 'Y'
//            ]
//        ]);
//
//        $this->add(new Select('profilesId', $profiles, [
//            'using' => [
//                'id',
//                'name'
//            ],
//            'useEmpty' => true,
//            'emptyText' => '...',
//            'emptyValue' => ''
//        ]));
//
//        $this->add(new Select('banned', [
//            'Y' => 'Yes',
//            'N' => 'No'
//        ]));
//
//        $this->add(new Select('suspended', [
//            'Y' => 'Yes',
//            'N' => 'No'
//        ]));
//
//        $this->add(new Select('active', [
//            'Y' => 'Yes',
//            'N' => 'No'
//        ]));
    }
}
