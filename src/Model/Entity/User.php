<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

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
        'password_token' => true,
        'password_token_expire' => true,
        'instructors' => true,
        'studios' => true,
    ];

	protected function _setPassword($password) {
		return (new DefaultPasswordHasher)->hash($password);
    }
}
