<?php

namespace Fdbc\Carchooser\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * version
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Version
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=512)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="Fdbc\Carchooser\FrontBundle\Entity\Model")
     * @ORM\JoinColumn(nullable=false)
     */
    private $model;

    /**
     * @ORM\ManyToOne(targetEntity="Fdbc\Carchooser\FrontBundle\Entity\Energy")
     * @ORM\JoinColumn(nullable=true)
     */
    private $energy;

    /**
     * @ORM\ManyToOne(targetEntity="Fdbc\Carchooser\FrontBundle\Entity\Gear")
     * @ORM\JoinColumn(nullable=true)
     */
    private $gear;

    /**
     * @ORM\ManyToOne(targetEntity="Fdbc\Carchooser\FrontBundle\Entity\Type")
     * @ORM\JoinColumn(nullable=true)
     */
    private $type;


    /**
     * @ORM\ManyToMany(targetEntity="Fdbc\Carchooser\FrontBundle\Entity\Image", cascade={"persist"})
     */
    private $images;

    /**
     * @var integer
     *
     * @ORM\Column(name="power_adm", type="integer", nullable=true)
     */
    private $powerAdm;

    /**
     * @var integer
     *
     * @ORM\Column(name="power_max", type="integer")
     */
    private $powerMax;

    /**
     * @var integer
     *
     * @ORM\Column(name="nb_gear", type="integer", nullable=true)
     */
    private $nbGear;

    /**
     * @var float
     *
     * @ORM\Column(name="consumption_city", type="float")
     */
    private $consumptionCity;

    /**
     * @var float
     *
     * @ORM\Column(name="consumption_extra", type="float")
     */
    private $consumptionExtra;

    /**
     * @var float
     *
     * @ORM\Column(name="consumption", type="float")
     */
    private $consumption;

    /**
     * @var float
     *
     * @ORM\Column(name="co2", type="float", nullable=true)
     */
    private $co2;

    /**
     * @var float
     *
     * @ORM\Column(name="co", type="float", nullable=true)
     */
    private $co;

    /**
     * @var float
     *
     * @ORM\Column(name="hc", type="float", nullable=true)
     */
    private $hc;

    /**
     * @var float
     *
     * @ORM\Column(name="nox", type="float", nullable=true)
     */
    private $nox;

    /**
     * @var float
     *
     * @ORM\Column(name="particule", type="float", nullable=true)
     */
    private $particule;

    /**
     * @var float
     *
     * @ORM\Column(name="weight", type="float", nullable=true)
     */
    private $weight;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return version
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set powerAdm
     *
     * @param integer $powerAdm
     * @return version
     */
    public function setPowerAdm($powerAdm)
    {
        $this->powerAdm = $powerAdm;

        return $this;
    }

    /**
     * Get powerAdm
     *
     * @return integer
     */
    public function getPowerAdm()
    {
        return $this->powerAdm;
    }

    /**
     * Set powerMax
     *
     * @param integer $powerMax
     * @return version
     */
    public function setPowerMax($powerMax)
    {
        $this->powerMax = $powerMax;

        return $this;
    }

    /**
     * Get powerMax
     *
     * @return integer
     */
    public function getPowerMax()
    {
        return $this->powerMax;
    }

    /**
     * Set nbGear
     *
     * @param integer $nbGear
     * @return version
     */
    public function setNbGear($nbGear)
    {
        $this->nbGear = $nbGear;

        return $this;
    }

    /**
     * Get nbGear
     *
     * @return integer
     */
    public function getNbGear()
    {
        return $this->nbGear;
    }

    /**
     * Set consumptionCity
     *
     * @param float $consumptionCity
     * @return version
     */
    public function setConsumptionCity($consumptionCity)
    {
        $this->consumptionCity = $consumptionCity;

        return $this;
    }

    /**
     * Get consumptionCity
     *
     * @return float
     */
    public function getConsumptionCity()
    {
        return $this->consumptionCity;
    }

    /**
     * Set consumptionExtra
     *
     * @param float $consumptionExtra
     * @return version
     */
    public function setConsumptionExtra($consumptionExtra)
    {
        $this->consumptionExtra = $consumptionExtra;

        return $this;
    }

    /**
     * Get consumptionExtra
     *
     * @return float
     */
    public function getConsumptionExtra()
    {
        return $this->consumptionExtra;
    }

    /**
     * Set consumption
     *
     * @param float $consumption
     * @return version
     */
    public function setConsumption($consumption)
    {
        $this->consumption = $consumption;

        return $this;
    }

    /**
     * Get consumption
     *
     * @return float
     */
    public function getConsumption()
    {
        return $this->consumption;
    }

    /**
     * Set co2
     *
     * @param float $co2
     * @return version
     */
    public function setCo2($co2)
    {
        $this->co2 = $co2;

        return $this;
    }

    /**
     * Get co2
     *
     * @return float
     */
    public function getCo2()
    {
        return $this->co2;
    }

    /**
     * Set hc
     *
     * @param float $hc
     * @return version
     */
    public function setHc($hc)
    {
        $this->hc = $hc;

        return $this;
    }

    /**
     * Get hc
     *
     * @return float
     */
    public function getHc()
    {
        return $this->hc;
    }

    /**
     * Set nox
     *
     * @param float $nox
     * @return version
     */
    public function setNox($nox)
    {
        $this->nox = $nox;

        return $this;
    }

    /**
     * Get nox
     *
     * @return float
     */
    public function getNox()
    {
        return $this->nox;
    }

    /**
     * Set weight
     *
     * @param float $weight
     * @return version
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return float
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set length
     *
     * @param float $length
     * @return version
     */
    public function setLength($length)
    {
        $this->length = $length;

        return $this;
    }

    /**
     * Get length
     *
     * @return float
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * Set width
     *
     * @param float $width
     * @return version
     */
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Get width
     *
     * @return float
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set height
     *
     * @param float $height
     * @return version
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Get height
     *
     * @return float
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set engine
     *
     * @param string $engine
     * @return version
     */
    public function setEngine($engine)
    {
        $this->engine = $engine;

        return $this;
    }

    /**
     * Get engine
     *
     * @return string
     */
    public function getEngine()
    {
        return $this->engine;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->images = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set model
     *
     * @param \Fdbc\Carchooser\FrontBundle\Entity\Model $model
     * @return Version
     */
    public function setModel(\Fdbc\Carchooser\FrontBundle\Entity\Model $model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return \Fdbc\Carchooser\FrontBundle\Entity\Model
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set energy
     *
     * @param \Fdbc\Carchooser\FrontBundle\Entity\Energy $energy
     * @return Version
     */
    public function setEnergy(\Fdbc\Carchooser\FrontBundle\Entity\Energy $energy)
    {
        $this->energy = $energy;

        return $this;
    }

    /**
     * Get energy
     *
     * @return \Fdbc\Carchooser\FrontBundle\Entity\Energy
     */
    public function getEnergy()
    {
        return $this->energy;
    }

    /**
     * Set gear
     *
     * @param \Fdbc\Carchooser\FrontBundle\Entity\Gear $gear
     * @return Version
     */
    public function setGear(\Fdbc\Carchooser\FrontBundle\Entity\Gear $gear)
    {
        $this->gear = $gear;

        return $this;
    }

    /**
     * Get gear
     *
     * @return \Fdbc\Carchooser\FrontBundle\Entity\Gear
     */
    public function getGear()
    {
        return $this->gear;
    }

    /**
     * Set type
     *
     * @param \Fdbc\Carchooser\FrontBundle\Entity\Type $type
     * @return Version
     */
    public function setType(\Fdbc\Carchooser\FrontBundle\Entity\Type $type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \Fdbc\Carchooser\FrontBundle\Entity\Type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Add images
     *
     * @param \Fdbc\Carchooser\FrontBundle\Entity\Image $images
     * @return Version
     */
    public function addImage(\Fdbc\Carchooser\FrontBundle\Entity\Image $images)
    {
        $this->images[] = $images;

        return $this;
    }

    /**
     * Remove images
     *
     * @param \Fdbc\Carchooser\FrontBundle\Entity\Image $images
     */
    public function removeImage(\Fdbc\Carchooser\FrontBundle\Entity\Image $images)
    {
        $this->images->removeElement($images);
    }

    /**
     * Get images
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Set co
     *
     * @param float $co
     * @return Version
     */
    public function setCo($co)
    {
        $this->co = $co;

        return $this;
    }

    /**
     * Get co
     *
     * @return float
     */
    public function getCo()
    {
        return $this->co;
    }

    /**
     * Set particule
     *
     * @param float $particule
     * @return Version
     */
    public function setParticule($particule)
    {
        $this->particule = $particule;

        return $this;
    }

    /**
     * Get particule
     *
     * @return float
     */
    public function getParticule()
    {
        return $this->particule;
    }

    /**
     * Set boot
     *
     * @param integer $boot
     * @return Version
     */
    public function setBoot($boot)
    {
        $this->boot = $boot;

        return $this;
    }

    /**
     * Get boot
     *
     * @return integer
     */
    public function getBoot()
    {
        return $this->boot;
    }
}
