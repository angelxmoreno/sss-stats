<?php
declare(strict_types=1);

namespace App\Model\Table;

use App\Model\Entity\EpisodeAttribute;
use Cake\Datasource\EntityInterface;
use Cake\Datasource\ResultSetInterface;
use Cake\ORM\Association\HasMany;
use Cake\ORM\Behavior\TimestampBehavior;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EpisodeAttributes Model
 *
 * @property EpisodeAttributeValuesTable&HasMany $EpisodeAttributeValues
 *
 * @method EpisodeAttribute newEmptyEntity()
 * @method EpisodeAttribute newEntity(array $data, array $options = [])
 * @method EpisodeAttribute[] newEntities(array $data, array $options = [])
 * @method EpisodeAttribute get($primaryKey, $options = [])
 * @method EpisodeAttribute findOrCreate($search, ?callable $callback = null, $options = [])
 * @method EpisodeAttribute patchEntity(EntityInterface $entity, array $data, array $options = [])
 * @method EpisodeAttribute[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method EpisodeAttribute|false save(EntityInterface $entity, $options = [])
 * @method EpisodeAttribute saveOrFail(EntityInterface $entity, $options = [])
 * @method EpisodeAttribute[]|ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method EpisodeAttribute[]|ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method EpisodeAttribute[]|ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method EpisodeAttribute[]|ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin TimestampBehavior
 */
class EpisodeAttributesTable extends Table
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

        $this->setTable('episode_attributes');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('EpisodeAttributeValues', [
            'foreignKey' => 'episode_attribute_id',
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
            ->maxLength('name', 100)
            ->notEmptyString('name')
            ->add('name', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('type')
            ->maxLength('type', 50)
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
