<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Studio Entity.
 */
class Studio extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'user_id' => true,
        'name' => true,
        'address' => true,
        'city' => true,
        'state_id' => true,
        'postal_code' => true,
        'contact' => true,
        'user' => true,
        'state' => true,
        'spaces' => true,
    ];
}
