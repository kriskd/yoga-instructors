<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Style Entity.
 */
class Style extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'sessions' => true,
    ];
}
