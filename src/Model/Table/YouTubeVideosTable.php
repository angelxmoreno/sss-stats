<?php
declare(strict_types=1);

namespace App\Model\Table;

use App\Database\Type\ThumbnailCollectionType;
use App\Model\Entity\YouTubeVideo;
use Cake\Database\Type\JsonType;
use Cake\Database\TypeFactory;
use Cake\Datasource\EntityInterface;
use Cake\Datasource\ResultSetInterface;
use Cake\ORM\Association\HasMany;
use Cake\ORM\Association\HasOne;
use Cake\ORM\Behavior\TimestampBehavior;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

TypeFactory::map('json', JsonType::class);
TypeFactory::map('thumbnails', ThumbnailCollectionType::class);

/**
 * YouTubeVideos Model
 *
 * @property EpisodesTable&HasOne $Episodes
 * @property YouTubeCommentsTable&HasMany $YouTubeComments
 * @property YouTubeVideoCountsTable&HasMany $YouTubeVideoCounts
 *
 * @method YouTubeVideo newEmptyEntity()
 * @method YouTubeVideo newEntity(array $data, array $options = [])
 * @method YouTubeVideo[] newEntities(array $data, array $options = [])
 * @method YouTubeVideo get($primaryKey, $options = [])
 * @method YouTubeVideo findOrCreate($search, ?callable $callback = null, $options = [])
 * @method YouTubeVideo patchEntity(EntityInterface $entity, array $data, array $options = [])
 * @method YouTubeVideo[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method YouTubeVideo|false save(EntityInterface $entity, $options = [])
 * @method YouTubeVideo saveOrFail(EntityInterface $entity, $options = [])
 * @method YouTubeVideo[]|ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method YouTubeVideo[]|ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method YouTubeVideo[]|ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method YouTubeVideo[]|ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @method Query findByUid(string $uid)
 *
 * @mixin TimestampBehavior
 */
class YouTubeVideosTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        $this->getSchema()->setColumnType('tags', 'json');
        $this->getSchema()->setColumnType('thumbnails', 'thumbnails');

        parent::initialize($config);

        $this->setTable('you_tube_videos');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasOne('Episodes', [
            'foreignKey' => 'you_tube_video_id',
        ]);
        $this->hasMany('YouTubeComments', [
            'foreignKey' => 'you_tube_video_id',
        ]);
        $this->hasMany('YouTubeVideoCounts', [
            'foreignKey' => 'you_tube_video_id',
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
            ->maxLength('uid', 100)
            ->notEmptyString('uid')
            ->add('uid', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('title')
            ->maxLength('title', 200)
            ->allowEmptyString('title');

        $validator
            ->scalar('channel_title')
            ->maxLength('channel_title', 150)
            ->allowEmptyString('channel_title');

        $validator
            ->scalar('description')
            ->allowEmptyString('description');

        $validator
            ->isArray('tags')
            ->allowEmptyString('tags');

        $validator
            ->isArray('thumbnails')
            ->allowEmptyString('thumbnails');

        $validator
            ->scalar('duration')
            ->maxLength('duration', 50)
            ->allowEmptyString('duration');

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

        $validator
            ->dateTime('published')
            ->allowEmptyDateTime('published');

        $validator
            ->dateTime('deleted')
            ->allowEmptyDateTime('deleted');

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

        return $rules;
    }
}
