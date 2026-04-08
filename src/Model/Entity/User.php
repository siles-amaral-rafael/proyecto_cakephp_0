<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Authentication\PasswordHasher\DefaultPasswordHasher;
use Cake\ORM\Entity;

class User extends Entity
{
    protected array $_accessible = [
        'nombre' => true,
        'apellido' => true,
        'correo' => true,
        'password' => true,
        'language' => true,
        'role' => true,
        'created' => true,  // Cámbialo a true
        'modified' => true, // Cámbialo a true
    ];
    
    protected array $_hidden = [
        'password',
    ];
    
    protected function _setPassword(string $password): ?string
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher())->hash($password);
        }
        // Si llega vacío (por ejemplo en un edit), no hacemos nada para no sobreescribir con null
        return null;
    }
}