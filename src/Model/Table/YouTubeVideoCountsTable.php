<?php
declare(strict_types=1);

namespace App\Model\Table;

use App\Model\Entity\YouTubeVideoCount;
use Cake\Datasource\EntityInterface;
use Cake\Datasource\ResultSetInterface;
use Cake\ORM\Association\BelongsTo;
use Cake\ORM\Behavior\TimestampBehavior;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * YouTubeVideoCounts Model
 *
 * @property YouTubeVideosTable&BelongsTo $YouTubeVideos
 *
 * @method YouTubeVideoCount newEmptyEntity()
 * @method YouTubeVideoCount newEntity(array $data, array $options = [])
 * @method YouTubeVideoCount[] newEntities(array $data, array $options = [])
 * @method YouTubeVideoCount get($primaryKey, $options = [])
 * @method YouTubeVideoCount findOrCreate($search, ?callable $callback = null, $options = [])
 * @method YouTubeVideoCount patchEntity(EntityInterface $entity, array $data, array $options = [])
 * @method YouTubeVideoCount[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method YouTubeVideoCount|false save(EntityInterface $entity, $options = [])
 * @method YouTubeVideoCount saveOrFail(EntityInterface $entity, $options = [])
 * @method YouTubeVideoCount[]|ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method YouTubeVideoCount[]|ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method YouTubeVideoCount[]|ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method YouTubeVideoCount[]|ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin TimestampBehavior
 */
class YouTubeVideoCountsTable extends Table
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

        $this->setTable('you_tube_video_counts');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('YouTubeVideos', [
            'foreignKey' => 'you_tube_video_id',
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
            ->nonNegativeInteger('you_tube_video_id')
            ->requirePresence('you_tube_video_id', 'create')
            ->notEmptyString('you_tube_video_id');

        $validator
            ->integer('comment_count')
            ->allowEmptyString('comment_count');

        $validator
            ->integer('dislike_count')
            ->allowEmptyString('dislike_count');

        $validator
            ->integer('favorite_count')
            ->allowEmptyString('favorite_count');

        $validator
            ->integer('like_count')
            ->allowEmptyString('like_count');

        $validator
            ->integer('view_count')
            ->allowEmptyString('view_count');

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
        $rules->add($rules->existsIn('you_tube_video_id', 'YouTubeVideos'), ['errorField' => 'you_tube_video_id']);

        return $rules;
    }
}
