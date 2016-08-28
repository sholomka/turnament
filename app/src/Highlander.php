<?php
namespace Tournament;

/**
 * Class Highlander
 * @package Tournament
 */
class Highlander
{
    /**
     * Damage
     * @var int
     */
    private $damage = 12;

    /**
     *Total hit points
     * @var int
     */
    private $totalHitPoints = 150;

    /**
     * Current hit points
     * @var
     */
    private $currentHitPoints;

    /**
     * Equipment type
     * @var array
     */
    private $equipType = [];

    /**
     * Object type
     * @var string
     */
    private $objectType = '';

    /**
     * Highlander constructor.
     * @param string $objectType
     */
    public function __construct($objectType = '')
    {
        $this->objectType = $objectType;
    }

    /**
     * Getter
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        return $this->$name;
    }

    /**
     * Setter
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    /**
     * Return current hit points
     * @return mixed
     */
    public function hitPoints()
    {
        return $this->currentHitPoints;
    }
}
