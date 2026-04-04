<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Authentication\PasswordHasher\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $nombre
 * @property string $apellido
 * @property string $correo
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 * @property string|null $password
 * @property string $language
 * @property string $role
 */
class User extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'nombre' => true,
        'apellido' => true,
        'correo' => true,
        'password' => true,
        'language' => true,
        'role' => true,
        'created' => false,
        'modified' => false,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var list<string>
     */
    protected array $_hidden = [
        'password',
    ];

    /**
     * @param string $password Plain password
     * @return string|null
     */
    protected function _setPassword(string $password): ?string
    {
        if ($password === '') {
            return null;
        }

        return (new DefaultPasswordHasher())->hash($password);
    }
}
