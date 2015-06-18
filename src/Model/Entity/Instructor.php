<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Instructor Entity.
 */
class Instructor extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'user_id' => true,
        'first_name' => true,
        'last_name' => true,
        'bio' => true,
        'user' => true,
        'participants' => true,
    ];
}
