<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Participant Entity.
 */
class Participant extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'session_id' => true,
        'instructor_id' => true,
        'role_id' => true,
        'session' => true,
        'instructor' => true,
        'role' => true,
    ];
}
