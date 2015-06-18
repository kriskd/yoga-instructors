<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Session Entity.
 */
class Session extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'space_id' => true,
        'style_id' => true,
        'min_students' => true,
        'cost' => true,
        'donation' => true,
        'description' => true,
        'start' => true,
        'end' => true,
        'space' => true,
        'style' => true,
        'participants' => true,
    ];
}
