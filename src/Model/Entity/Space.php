<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Space Entity.
 */
class Space extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'studio_id' => true,
        'hot_room' => true,
        'max_participants' => true,
        'cost' => true,
        'donation' => true,
        'description' => true,
        'start' => true,
        'end' => true,
        'studio' => true,
        'sessions' => true,
    ];
}
