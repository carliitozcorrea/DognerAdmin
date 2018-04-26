<?php

namespace Vokuro\Models;

use Phalcon\Mvc\Model;

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
