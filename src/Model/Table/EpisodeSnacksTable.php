<?php
declare(strict_types=1);

namespace App\Model\Table;

use App\Model\Entity\EpisodeSnack;
use Cake\Datasource\EntityInterface;
use Cake\Datasource\ResultSetInterface;
use Cake\ORM\Association\BelongsTo;
use Cake\ORM\Behavior\TimestampBehavior;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EpisodeSnacks Model
 *
 * @property EpisodesTable&BelongsTo $Episodes
 * @property SnacksTable&BelongsTo $Snacks
 * @property UsersTable&BelongsTo $Users
 *
 * @method EpisodeSnack newEmptyEntity()
 * @method EpisodeSnack newEntity(array $data, array $options = [])
 * @method EpisodeSnack[] newEntities(array $data, array $options = [])
 * @method EpisodeSnack get($primaryKey, $options = [])
 * @method EpisodeSnack findOrCreate($search, ?callable $callback = null, $options = [])
 * @method EpisodeSnack patchEntity(EntityInterface $entity, array $data, array $options = [])
 * @method EpisodeSnack[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method EpisodeSnack|false save(EntityInterface $entity, $options = [])
 * @method EpisodeSnack saveOrFail(EntityInterface $entity, $options = [])
 * @method EpisodeSnack[]|ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method EpisodeSnack[]|ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method EpisodeSnack[]|ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method EpisodeSnack[]|ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin TimestampBehavior
 */
class EpisodeSnacksTable extends Table
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

        $this->setTable('episode_snacks');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Episodes', [
            'foreignKey' => 'episode_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Snacks', [
            'foreignKey' => 'snack_id',
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
            ->nonNegativeInteger('snack_id')
            ->notEmptyString('snack_id');

        $validator
            ->nonNegativeInteger('user_id')
            ->notEmptyString('user_id');

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
        $rules->add($rules->existsIn('snack_id', 'Snacks'), ['errorField' => 'snack_id']);
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
