<?php
namespace Tournament;

/**
 * Class Highlander
 * @package Tournament
 */
class Highlander extends Fighter
{
    /**
     * Highlander constructor.
     * @param string $objectType
     */
    public function __construct($objectType = '')
    {
        parent::__construct($objectType);
        $this->damage = 12;
        $this->totalHitPoints = 150;
    }
}
