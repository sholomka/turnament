<?php
namespace Tournament;

/**
 * Class Viking
 * @package Tournament
 */
class Viking extends Fighter
{
    /**
     * Viking constructor.
     * @param string $objectType
     */
    public function __construct($objectType = '')
    {
        parent::__construct($objectType);
        $this->damage = 6;
        $this->totalHitPoints = 120;
    }

}
