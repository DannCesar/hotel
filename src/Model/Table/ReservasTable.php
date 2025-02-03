<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Reservas Model
 *
 * @method \App\Model\Entity\Reserva newEmptyEntity()
 * @method \App\Model\Entity\Reserva newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Reserva> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Reserva get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Reserva findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Reserva patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Reserva> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Reserva|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Reserva saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Reserva>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Reserva>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Reserva>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Reserva> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Reserva>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Reserva>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Reserva>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Reserva> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ReservasTable extends Table
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

        $this->setTable('reservas');
        $this->setDisplayField('id');
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
            ->date('datainicial')
            ->requirePresence('datainicial', 'create')
            ->notEmptyDate('datainicial');

        $validator
            ->date('datafinal')
            ->requirePresence('datafinal', 'create')
            ->notEmptyDate('datafinal');

        return $validator;
    }
}
