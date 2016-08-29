<?php
namespace Tournament;

/**
 * Class Fighter
 * @package Tournament
 */
abstract class Fighter
{
    /**
     * Fighting strategy
     * @var
     */
    private $fightingStrategy;

    /**
     * Equipment type
     * @var array
     */
    public $equipType = [];

    /**
     * Object type
     * @var string
     */

    public $objectType;

    /**
     * Damage
     * @var int
     */
    public $damage;

    /**
     *Total hit points
     * @var int
     */
    public $totalHitPoints;

    /**
     * Current hit points
     * @var
     */
    public $currentHitPoints;

    /**
     * Percent when Veteran Highlander goes Berserk
     * @var
     */
    public $berserkPercent;

    /**
     * Fighter constructor.
     * @param string $objectType
     */
    public function __construct($objectType) {
        $this->objectType = $objectType;
    }

    /**
     * Engage
     * @param $opponent
     */
    public function engage($opponent)
    {
        if (in_array('armor', $this->equipType)) {
            $opponent->damage -= 3;
        }

        if ($opponent->objectType == 'Veteran') {
            $this->berserkPercent = $opponent->totalHitPoints * 30 / 100;
        }

        $this->fightingStrategy = FightingStrategyFactory::factory($this, $opponent);
        $this->fightingStrategy->engage($this, $opponent);
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