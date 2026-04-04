<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Multimedia Entity
 *
 * @property int $id
 * @property string $titulo
 * @property string $tipo
 * @property string $ruta_archivo
 * @property string $autor
 * @property \Cake\I18n\Date|\Cake\I18n\FrozenDate|null $año
 * @property string $album
 */
class Multimedia extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'titulo' => true,
        'tipo' => true,
        'ruta_archivo' => true,
        'autor' => true,
        'año' => true,
        'album' => true,
    ];
}
