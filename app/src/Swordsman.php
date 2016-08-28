<?php
namespace Tournament;

/**
 * Class Swordsman
 * @package Tournament
 */
class Swordsman
{
    /**
     * Damage
     * @var int
     */
    private $damage = 5;

    /**
     *Total hit points
     * @var int
     */
    private $totalHitPoints = 100;

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
     * Percent when Veteran Highlander goes Berserk
     * @var
     */
    private $berserkPercent;

    /**
     * Swordsman constructor.
     * @param string $objectType
     */
    public function __construct($objectType = '')
    {
        $this->objectType = $objectType;
    }

    /**
     * Engage
     * @param $object
     */
    public function engage($object)
    {
        $part = explode('\\', get_class($object));
        $method = end($part);

        if (in_array('buckler', $this->equipType) && in_array('buckler', $object->equipType)) {
            $object->objectType = 'Buckler';
        }

        if (in_array('armor', $this->equipType)) {
            $object->damage -= 3;
        }

        if ($object->objectType == 'Veteran') {
            $this->berserkPercent = $object->totalHitPoints * 30 / 100;
        }

        $this->{'engage' . $method . $object->objectType}($object);
    }

    /**
     * Swordsman Vs Viking
     * @param $object
     */
    public function engageViking($object) {
        for ($vikingHitPoints = $object->totalHitPoints, $swordsmanHitPoints = $this->totalHitPoints ; ; ) {
            $vikingHitPoints -= $this->damage;
            $swordsmanHitPoints -= $object->damage;
            $this->currentHitPoints = $swordsmanHitPoints < 0 ? 0 : $swordsmanHitPoints;
            $object->currentHitPoints = $vikingHitPoints < 0 ? 0 : $vikingHitPoints;

            if ($vikingHitPoints < 0 || $swordsmanHitPoints < 0) {
                break;
            }
        }
    }

    /**
     * Swordsman with buckler Vs Viking with buckler
     * @param $object
     */
    public function engageVikingBuckler($object)
    {
        for ($vikingHitPoints = $object->totalHitPoints, $swordsmanHitPoints = $this->totalHitPoints, $iteration = 0 ; ; $iteration++) {
            $vikingHitPoints -= ($iteration % 2 == 0) ? $this->damage : 0;
            $swordsmanHitPoints -= ($iteration % 2 == 0 || $iteration > 3 * 2) ? $object->damage : 0;
            $this->currentHitPoints = $swordsmanHitPoints < 0 ? 0 : $swordsmanHitPoints;
            $object->currentHitPoints = $vikingHitPoints < 0 ? 0 : $vikingHitPoints;

            if ($vikingHitPoints < 0 || $swordsmanHitPoints < 0) {
                break;
            }
        }
    }

    /**
     * Armored Swordsman Vs Viking
     * @param $object
     */
    public function engageHighlander($object) {
        for ($highlanderHitPoints = $object->totalHitPoints, $swordsmanHitPoints = $this->totalHitPoints, $iteration = 0 ; ; $iteration++) {
            $highlanderHitPoints -= $this->damage - 1;
            $swordsmanHitPoints -= ((($iteration % 3) % 2) != 0) ? $object->damage : 0;
            $this->currentHitPoints = $swordsmanHitPoints < 0 ? 0 : $swordsmanHitPoints;
            $object->currentHitPoints = $highlanderHitPoints < 0 ? 0 : $highlanderHitPoints;

            if ($highlanderHitPoints < 0 || $swordsmanHitPoints < 0) {
                break;
            }
        }
    }

    /**
     * Vicious Swordsman Vs Veteran Highlander
     * @param $object
     */
    public function engageHighlanderVeteran($object) {
        for ($highlanderVeteranHitPoints = $object->totalHitPoints, $swordsmanHitPoints = $this->totalHitPoints, $iteration = 0 ; ; $iteration++) {
            $highlanderVeteranHitPoints -= ($iteration < 2 ? $this->damage + 20 : $this->damage);
            $swordsmanHitPoints -= ($iteration % 3 == 0) ? ($highlanderVeteranHitPoints < $this->berserkPercent ? $object->damage * 2 : $object->damage) : 0;
            $this->currentHitPoints = $swordsmanHitPoints < 0 ? 0 : $swordsmanHitPoints;
            $object->currentHitPoints = $highlanderVeteranHitPoints < 0 ? 0 : $highlanderVeteranHitPoints;

            if ($highlanderVeteranHitPoints < 0 || $swordsmanHitPoints < 0) {
                break;
            }
        }
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
