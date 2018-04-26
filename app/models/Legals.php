<?php

namespace Vokuro\Models;

use Phalcon\Mvc\Model;
use Phalcon\Validation;
use Phalcon\Validation\Validator\Date as DateValidator;



class Legals extends Model
{
    public $id;

    public $name;

    public $content;

    public $version;

    public $created;

    public $modified;


    public function initialize(){}

    public function beforeValidationOnCreate(){}

    public function beforeValidationOnUpdate(){
        $today = new \DateTime();
        $format = $today->format('Y-m-d H:i:s');
        $this->modified = $format;
        $this->version++;
    }

    public function validation(){
        $validator = new Validation();
        $validator->add(
            [
                "created",
                "modified",
            ],
            new DateValidator(
                [
                    "format" => "Y-m-d H:i:s", "message" => "The date is invalid",
                ]
            )
        );

        return $this->validate($validator);
    }

}