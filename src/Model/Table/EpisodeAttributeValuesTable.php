<?php
declare(strict_types=1);

namespace App\Model\Table;

use App\Model\Entity\EpisodeAttributeValue;
use Cake\Datasource\EntityInterface;
use Cake\Datasource\ResultSetInterface;
use Cake\ORM\Association\BelongsTo;
use Cake\ORM\Behavior\TimestampBehavior;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EpisodeAttributeValues Model
 *
 * @property EpisodesTable&BelongsTo $Episodes
 * @property EpisodeAttributesTable&BelongsTo $EpisodeAttributes
 * @property UsersTable&BelongsTo $Users
 *
 * @method EpisodeAttributeValue newEmptyEntity()
 * @method EpisodeAttributeValue newEntity(array $data, array $options = [])
 * @method EpisodeAttributeValue[] newEntities(array $data, array $options = [])
 * @method EpisodeAttributeValue get($primaryKey, $options = [])
 * @method EpisodeAttributeValue findOrCreate($search, ?callable $callback = null, $options = [])
 * @method EpisodeAttributeValue patchEntity(EntityInterface $entity, array $data, array $options = [])
 * @method EpisodeAttributeValue[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method EpisodeAttributeValue|false save(EntityInterface $entity, $options = [])
 * @method EpisodeAttributeValue saveOrFail(EntityInterface $entity, $options = [])
 * @method EpisodeAttributeValue[]|ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method EpisodeAttributeValue[]|ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method EpisodeAttributeValue[]|ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method EpisodeAttributeValue[]|ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin TimestampBehavior
 */
class EpisodeAttributeValuesTable extends Table
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

        $this->setTable('episode_attribute_values');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Episodes', [
            'foreignKey' => 'episode_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('EpisodeAttributes', [
            'foreignKey' => 'episode_attribute_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
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
            ->nonNegativeInteger('episode_id')
            ->notEmptyString('episode_id');

        $validator
            ->nonNegativeInteger('episode_attribute_id')
            ->notEmptyString('episode_attribute_id');

        $validator
            ->nonNegativeInteger('user_id')
            ->notEmptyString('user_id');

        $validator
            ->scalar('value')
            ->requirePresence('value', 'create')
            ->notEmptyString('value');

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
        $rules->add($rules->existsIn('episode_id', 'Episodes'), ['errorField' => 'episode_id']);
        $rules->add($rules->existsIn('episode_attribute_id', 'EpisodeAttributes'), ['errorField' => 'episode_attribute_id']);
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
