<?php
declare(strict_types=1);

namespace App\Model\Table;

use App\Model\Entity\YouTubeCommentAuthor;
use Cake\Datasource\EntityInterface;
use Cake\Datasource\ResultSetInterface;
use Cake\ORM\Association\HasMany;
use Cake\ORM\Behavior\TimestampBehavior;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * YouTubeCommentAuthors Model
 *
 * @property YouTubeCommentsTable&HasMany $YouTubeComments
 *
 * @method YouTubeCommentAuthor newEmptyEntity()
 * @method YouTubeCommentAuthor newEntity(array $data, array $options = [])
 * @method YouTubeCommentAuthor[] newEntities(array $data, array $options = [])
 * @method YouTubeCommentAuthor get($primaryKey, $options = [])
 * @method YouTubeCommentAuthor findOrCreate($search, ?callable $callback = null, $options = [])
 * @method YouTubeCommentAuthor patchEntity(EntityInterface $entity, array $data, array $options = [])
 * @method YouTubeCommentAuthor[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method YouTubeCommentAuthor|false save(EntityInterface $entity, $options = [])
 * @method YouTubeCommentAuthor saveOrFail(EntityInterface $entity, $options = [])
 * @method YouTubeCommentAuthor[]|ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method YouTubeCommentAuthor[]|ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method YouTubeCommentAuthor[]|ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method YouTubeCommentAuthor[]|ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin TimestampBehavior
 */
class YouTubeCommentAuthorsTable extends Table
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

        $this->setTable('you_tube_comment_authors');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('YouTubeComments', [
            'foreignKey' => 'you_tube_comment_author_id',
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
            ->maxLength('name', 150)
            ->notEmptyString('name')
            ->add('name', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('image_url')
            ->allowEmptyFile('image_url');

        $validator
            ->scalar('channel_uid')
            ->maxLength('channel_uid', 150)
            ->allowEmptyString('channel_uid');

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
