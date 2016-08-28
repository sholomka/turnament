<?php
namespace Tournament;

/**
 * Class Viking
 * @package Tournament
 */
class Viking
{
    /**
     * Damage
     * @var int
     */
    private $damage = 6;

    /**
     *Total hit points
     * @var int
     */
    private $totalHitPoints = 120;

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

    /**
     * Equipment
     * @param $equipType
     * @return $this
     */
    public function equip($equipType)
    {
        $this->equipType[] = $equipType;

        return $this;
    }
}
