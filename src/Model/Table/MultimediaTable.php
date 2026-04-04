<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Multimedia Model
 *
 * @method \App\Model\Entity\Multimedia newEmptyEntity()
 * @method \App\Model\Entity\Multimedia newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Multimedia get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Multimedia findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Multimedia patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Multimedia|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 */
class MultimediaTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('multimedia');
        $this->setDisplayField('titulo');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('titulo')
            ->maxLength('titulo', 250)
            ->requirePresence('titulo', 'create')
            ->notEmptyString('titulo');

        $validator
            ->scalar('tipo')
            ->maxLength('tipo', 20)
            ->requirePresence('tipo', 'create')
            ->notEmptyString('tipo');

        $validator
            ->scalar('ruta_archivo')
            ->maxLength('ruta_archivo', 250)
            ->requirePresence('ruta_archivo', 'create')
            ->notEmptyString('ruta_archivo');

        $validator
            ->scalar('autor')
            ->maxLength('autor', 50)
            ->requirePresence('autor', 'create')
            ->notEmptyString('autor');

        $validator
            ->date('año')
            ->requirePresence('año', 'create')
            ->notEmptyDate('año');

        $validator
            ->scalar('album')
            ->maxLength('album', 50)
            ->requirePresence('album', 'create')
            ->notEmptyString('album');

        return $validator;
    }
}
