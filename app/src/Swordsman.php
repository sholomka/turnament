<?php
namespace Tournament;

/**
 * Class Swordsman
 * @package Tournament
 */
class Swordsman extends Fighter
{
    /**
     * Swordsman constructor.
     * @param string $objectType
     */
    public function __construct($objectType = '')
    {
        parent::__construct($objectType);
        $this->damage = 5;
        $this->totalHitPoints = 100;
    }
}
