<?php
declare(strict_types=1);

namespace App\Model\Table;

use App\Model\Entity\Episode;
use Cake\Datasource\EntityInterface;
use Cake\Datasource\ResultSetInterface;
use Cake\ORM\Association\BelongsTo;
use Cake\ORM\Association\BelongsToMany;
use Cake\ORM\Association\HasMany;
use Cake\ORM\Behavior\TimestampBehavior;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Episodes Model
 *
 * @property YouTubeVideosTable&BelongsTo $YouTubeVideos
 * @property EpisodeAttributeValuesTable&HasMany $EpisodeAttributeValues
 * @property EpisodeSnacksTable&HasMany $EpisodeSnacks
 * @property FilmsTable&HasMany $Films
 * @property SnacksTable&BelongsToMany $Snacks
 *
 * @method Episode newEmptyEntity()
 * @method Episode newEntity(array $data, array $options = [])
 * @method Episode[] newEntities(array $data, array $options = [])
 * @method Episode get($primaryKey, $options = [])
 * @method Episode findOrCreate($search, ?callable $callback = null, $options = [])
 * @method Episode patchEntity(EntityInterface $entity, array $data, array $options = [])
 * @method Episode[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method Episode|false save(EntityInterface $entity, $options = [])
 * @method Episode saveOrFail(EntityInterface $entity, $options = [])
 * @method Episode[]|ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method Episode[]|ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method Episode[]|ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method Episode[]|ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin TimestampBehavior
 */
class EpisodesTable extends Table
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

        $this->setTable('episodes');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('YouTubeVideos', [
            'foreignKey' => 'you_tube_video_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('EpisodeAttributeValues', [
            'foreignKey' => 'episode_id',
        ]);
        $this->hasMany('EpisodeSnacks', [
            'foreignKey' => 'episode_id',
        ]);
        $this->belongsToMany('Snacks', [
            'foreignKey' => 'episode_id',
            'targetForeignKey' => 'snack_id',
            'through' => 'EpisodeSnacks',
        ]);
        $this->hasMany('Films', [
            'foreignKey' => 'episode_id',
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
            ->nonNegativeInteger('you_tube_video_id')
            ->requirePresence('you_tube_video_id', 'create')
            ->notEmptyString('you_tube_video_id')
            ->add('you_tube_video_id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('title')
            ->maxLength('title', 200)
            ->notEmptyString('title');

        $validator
            ->scalar('episode_number')
            ->maxLength('episode_number', 3)
            ->notEmptyString('episode_number')
            ->add('episode_number', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

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
        $rules->add($rules->isUnique(['episode_number']), ['errorField' => 'episode_number']);
        $rules->add($rules->existsIn('you_tube_video_id', 'YouTubeVideos'), ['errorField' => 'you_tube_video_id']);

        return $rules;
    }
}
