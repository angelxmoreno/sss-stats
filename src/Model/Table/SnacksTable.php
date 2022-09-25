<?php
declare(strict_types=1);

namespace App\Model\Table;

use App\Model\Entity\Snack;
use Cake\Datasource\EntityInterface;
use Cake\Datasource\ResultSetInterface;
use Cake\ORM\Association\HasMany;
use Cake\ORM\Behavior\TimestampBehavior;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Snacks Model
 *
 * @property EpisodeSnacksTable&HasMany $EpisodeSnacks
 *
 * @method Snack newEmptyEntity()
 * @method Snack newEntity(array $data, array $options = [])
 * @method Snack[] newEntities(array $data, array $options = [])
 * @method Snack get($primaryKey, $options = [])
 * @method Snack findOrCreate($search, ?callable $callback = null, $options = [])
 * @method Snack patchEntity(EntityInterface $entity, array $data, array $options = [])
 * @method Snack[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method Snack|false save(EntityInterface $entity, $options = [])
 * @method Snack saveOrFail(EntityInterface $entity, $options = [])
 * @method Snack[]|ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method Snack[]|ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method Snack[]|ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method Snack[]|ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin TimestampBehavior
 */
class SnacksTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('snacks');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('EpisodeSnacks', [
            'foreignKey' => 'snack_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param Validator $validator Validator instance.
     * @return Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('name')
            ->maxLength('name', 50)
            ->notEmptyString('name')
            ->add('name', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('brand')
            ->maxLength('brand', 50)
            ->allowEmptyString('brand');

        $validator
            ->scalar('type')
            ->notEmptyString('type');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param RulesChecker $rules The rules object to be modified.
     * @return RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['name']), ['errorField' => 'name']);

        return $rules;
    }
}
