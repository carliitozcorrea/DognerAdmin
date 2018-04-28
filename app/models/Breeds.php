<?php

namespace Vokuro\Models;

use Phalcon\Mvc\Model;

class Breeds extends Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(column="id", type="integer", length=11, nullable=false)
     */
    public $id;

    /**
     *
     * @var integer
     * @Column(column="id_specie", type="integer", length=11, nullable=false)
     */
    public $id_specie;

    /**
     *
     * @var integer
     * @Column(column="id_country_origin", type="integer", length=11, nullable=false)
     */
    public $id_country_origin;

    /**
     *
     * @var string
     * @Column(column="name", type="string", length=100, nullable=false)
     */
    public $name;
    
    
    /**
     *
     * @var string
     * @Column(column="img", type="string", length=255, nullable=false)
     */
    public $img;

    /**
     *
     * @var string
     * @Column(column="description", type="string", nullable=false)
     */
    public $description;

    /**
     *
     * @var string
     * @Column(column="fci", type="string", length=5, nullable=true)
     */
    public $fci;

    /**
     *
     * @var string
     * @Column(column="size", type="string", length=1, nullable=true)
     */
    public $size;

    /**
     *
     * @var string
     * @Column(column="male_size", type="string", length=15, nullable=true)
     */
    public $male_size;

    /**
     *
     * @var string
     * @Column(column="female_size", type="string", length=15, nullable=true)
     */
    public $female_size;

    /**
     *
     * @var string
     * @Column(column="male_weight", type="string", length=15, nullable=true)
     */
    public $male_weight;

    /**
     *
     * @var string
     * @Column(column="female_weight", type="string", length=15, nullable=true)
     */
    public $female_weight;

    /**
     *
     * @var string
     * @Column(column="space", type="string", length=15, nullable=true)
     */
    public $space;

    /**
     *
     * @var integer
     * @Column(column="lifespan", type="integer", length=11, nullable=true)
     */
    public $lifespan;

    /**
     *
     * @var integer
     * @Column(column="puppies_per_litter", type="integer", length=11, nullable=true)
     */
    public $puppies_per_litter;

    /**
     *
     * @var integer
     * @Column(column="learning_capability", type="integer", length=11, nullable=true)
     */
    public $learning_capability;

    /**
     *
     * @var integer
     * @Column(column="protection", type="integer", length=11, nullable=true)
     */
    public $protection;

    /**
     *
     * @var integer
     * @Column(column="guard", type="integer", length=11, nullable=true)
     */
    public $guard;

    /**
     *
     * @var integer
     * @Column(column="sheepherding", type="integer", length=11, nullable=true)
     */
    public $sheepherding;

    /**
     *
     * @var integer
     * @Column(column="hunting", type="integer", length=11, nullable=true)
     */
    public $hunting;

    /**
     *
     * @var integer
     * @Column(column="aggressiveness", type="integer", length=11, nullable=true)
     */
    public $aggressiveness;

    /**
     *
     * @var integer
     * @Column(column="barks_tendency", type="integer", length=11, nullable=true)
     */
    public $barks_tendency;

    /**
     *
     * @var integer
     * @Column(column="socialization_with_dogs", type="integer", length=11, nullable=true)
     */
    public $socialization_with_dogs;

    /**
     *
     * @var integer
     * @Column(column="socialization_with_kids", type="integer", length=11, nullable=true)
     */
    public $socialization_with_kids;

    /**
     *
     * @var integer
     * @Column(column="activity_level", type="integer", length=11, nullable=true)
     */
    public $activity_level;

    /**
     *
     * @var integer
     * @Column(column="exercise_requirements", type="integer", length=11, nullable=true)
     */
    public $exercise_requirements;
    
    /**
     *
     * @var integer
     * @Column(column="$hairloss", type="integer", length=11, nullable=true)
     */
    public $hairloss;    

    /**
     *
     * @var integer
     * @Column(column="professional_grooming", type="integer", length=11, nullable=true)
     */
    public $professional_grooming;

    /**
     *
     * @var integer
     * @Column(column="aesthetic_requirements", type="integer", length=11, nullable=true)
     */
    public $aesthetic_requirements;

    /**
     *
     * @var integer
     * @Column(column="sickly", type="integer", length=11, nullable=true)
     */
    public $sickly;

    /**
     *
     * @var string
     * @Column(column="created", type="string", nullable=false)
     */
    public $created;

    /**
     *
     * @var string
     * @Column(column="modified", type="string", nullable=false)
     */
    public $modified;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("dogner");
        $this->setSource("breeds");
        $this->hasMany('id', 'App\Models\Pets', 'id_breed', ['alias' => 'Pets']);
        $this->hasMany('id', 'App\Models\PostsCapp', 'id_breed', ['alias' => 'PostsCapp']);
        $this->belongsTo('id_specie', 'App\Models\Species', 'id', ['alias' => 'Species']);
        $this->belongsTo('id_country_origin', 'App\Models\Countries', 'id', ['alias' => 'Countries']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'breeds';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Breeds[]|Breeds|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Breeds|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
