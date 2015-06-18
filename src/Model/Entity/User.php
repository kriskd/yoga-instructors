<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity.
 */
class User extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'admin' => true,
        'email' => true,
        'password' => true,
        'phone' => true,
        'active' => true,
        'activation_code' => true,
        'instructors' => true,
        'studios' => true,
    ];
}
