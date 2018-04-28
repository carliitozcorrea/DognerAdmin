<?php

namespace Vokuro\Models;

use Phalcon\Mvc\Model;
use Phalcon\Validation;
use Phalcon\Validation\Validator\Date as DateValidator;

class Tips extends Model
{

    /**
     *
     * @var integer
     * @Column(column="id", type="integer", length=11, nullable=false)
     */
    public $id;

    /**
     *
     * @var string
     * @Column(column="date", type="string", nullable=false)
     */
    public $date;

    /**
     *
     * @var string
     * @Column(column="video", type="string", length=100, nullable=false)
     */
    public $video;

    /**
     *
     * @var string
     * @Column(column="photo", type="string", length=100, nullable=false)
     */
    public $photo;

    /**
     *
     * @var string
     * @Column(column="title", type="string", length=150, nullable=false)
     */
    public $title;

    /**
     *
     * @var string
     * @Column(column="description", type="string", nullable=false)
     */
    public $description;

    /**
     *
     * @var string
     * @Column(column="description", type="string", nullable=false)
     */
    public $created;

    /**
     *
     * @var string
     * @Column(column="description", type="string", nullable=false)
     */
    public $modified;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("dogner");
        $this->setSource("tips");
    }

    public function validation()
    {
        $validator = new Validation();

        $validator->add(
            [
                "created",
                "modified",
            ],
            new DateValidator(
                [
                    "format" => "Y-m-d H:i:s",
                    "message" => "The date is invalid",
                ]
            )
        );
        $validator->add(
            [
                "date",
            ],
            new DateValidator(
                [
                    "format" => "Y-m-d",
                    "message" => "The date is invalid",
                ]
            )
        );
        return $this->validate($validator);
    }
    public function beforeValidationOnUpdate()
    {
        $today = new \DateTime();
        $format = $today->format('Y-m-d H:i:s');
        $this->modified = $format;
    }

    public function beforeValidationOnCreate()
    {
        $today = new \DateTime();
        $format = $today->format('Y-m-d H:i:s');
        $this->modified = $format;
        $this->created = $format;
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'tips';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Tips[]|Tips|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Tips|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
