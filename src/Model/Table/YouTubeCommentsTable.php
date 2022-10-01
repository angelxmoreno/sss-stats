<?php
declare(strict_types=1);

namespace App\Model\Table;

use App\Model\Entity\YouTubeComment;
use Cake\Datasource\EntityInterface;
use Cake\Datasource\ResultSetInterface;
use Cake\ORM\Association\BelongsTo;
use Cake\ORM\Behavior\TimestampBehavior;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * YouTubeComments Model
 *
 * @property YouTubeCommentAuthorsTable&BelongsTo $YouTubeCommentAuthors
 * @property YouTubeVideosTable&BelongsTo $YouTubeVideos
 *
 * @method YouTubeComment newEmptyEntity()
 * @method YouTubeComment newEntity(array $data, array $options = [])
 * @method YouTubeComment[] newEntities(array $data, array $options = [])
 * @method YouTubeComment get($primaryKey, $options = [])
 * @method YouTubeComment findOrCreate($search, ?callable $callback = null, $options = [])
 * @method YouTubeComment patchEntity(EntityInterface $entity, array $data, array $options = [])
 * @method YouTubeComment[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method YouTubeComment|false save(EntityInterface $entity, $options = [])
 * @method YouTubeComment saveOrFail(EntityInterface $entity, $options = [])
 * @method YouTubeComment[]|ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method YouTubeComment[]|ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method YouTubeComment[]|ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method YouTubeComment[]|ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @method Query findByUid(string $uid)
 *
 * @mixin TimestampBehavior
 */
class YouTubeCommentsTable extends Table
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

        $this->setTable('you_tube_comments');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('YouTubeCommentAuthors', [
            'foreignKey' => 'you_tube_comment_author_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('ParentYouTubeComments', [
            'className' => 'YouTubeComments',
            'foreignKey' => 'parent_id',
        ]);
        $this->belongsTo('YouTubeVideos', [
            'foreignKey' => 'you_tube_video_id',
        ]);
        $this->hasMany('ChildYouTubeComments', [
            'className' => 'YouTubeComments',
            'foreignKey' => 'parent_id',
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
            ->scalar('uid')
            ->maxLength('uid', 150)
            ->requirePresence('uid', 'create')
            ->notEmptyString('uid')
            ->add('uid', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->nonNegativeInteger('you_tube_comment_author_id')
            ->requirePresence('you_tube_comment_author_id', 'create')
            ->notEmptyString('you_tube_comment_author_id');

        $validator
            ->nonNegativeInteger('parent_id')
            ->allowEmptyString('parent_id');

        $validator
            ->nonNegativeInteger('you_tube_video_id')
            ->allowEmptyString('you_tube_video_id');

        $validator
            ->boolean('can_reply')
            ->allowEmptyString('can_reply');

        $validator
            ->boolean('is_public')
            ->allowEmptyString('is_public');

        $validator
            ->nonNegativeInteger('total_reply_count')
            ->allowEmptyString('total_reply_count');

        $validator
            ->boolean('can_rate')
            ->allowEmptyString('can_rate');

        $validator
            ->nonNegativeInteger('like_count')
            ->allowEmptyString('like_count');

        $validator
            ->dateTime('published_at')
            ->allowEmptyDateTime('published_at');

        $validator
            ->scalar('text_display')
            ->allowEmptyString('text_display');

        $validator
            ->scalar('text_original')
            ->allowEmptyString('text_original');

        $validator
            ->dateTime('updated_at')
            ->allowEmptyDateTime('updated_at');

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
        $rules->add($rules->isUnique(['uid']), ['errorField' => 'uid']);
        $rules->add($rules->existsIn('you_tube_comment_author_id', 'YouTubeCommentAuthors'), ['errorField' => 'you_tube_comment_author_id']);
        $rules->add($rules->existsIn('parent_id', 'ParentYouTubeComments'), ['errorField' => 'parent_id']);
        $rules->add($rules->existsIn('you_tube_video_id', 'YouTubeVideos'), ['errorField' => 'you_tube_video_id']);

        return $rules;
    }
}
