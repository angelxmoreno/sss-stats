<?php
declare(strict_types=1);

namespace DirectMessages\Model\Table;

use App\Model\Table\UsersTable;
use Cake\Datasource\EntityInterface;
use Cake\Datasource\ResultSetInterface;
use Cake\ORM\Association\BelongsTo;
use Cake\ORM\Behavior\CounterCacheBehavior;
use Cake\ORM\Behavior\TimestampBehavior;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use DirectMessages\Model\Entity\Message;

/**
 * Messages Model
 *
 * @property MessageThreadsTable&BelongsTo $MessageThreads
 * @property UsersTable&BelongsTo $Users
 *
 * @method Message newEmptyEntity()
 * @method Message newEntity(array $data, array $options = [])
 * @method Message[] newEntities(array $data, array $options = [])
 * @method Message get($primaryKey, $options = [])
 * @method Message findOrCreate($search, ?callable $callback = null, $options = [])
 * @method Message patchEntity(EntityInterface $entity, array $data, array $options = [])
 * @method Message[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method Message|false save(EntityInterface $entity, $options = [])
 * @method Message saveOrFail(EntityInterface $entity, $options = [])
 * @method Message[]|ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method Message[]|ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method Message[]|ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method Message[]|ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin TimestampBehavior
 * @mixin CounterCacheBehavior
 */
class MessagesTable extends Table
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

        $this->setTable('messages');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('CounterCache', [
            'MessageThreads' => ['message_count'],
        ]);

        $this->belongsTo('MessageThreads', [
            'foreignKey' => 'message_thread_id',
            'joinType' => 'INNER',
            'className' => 'DirectMessages.MessageThreads',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
            'className' => UsersTable::class,
        ]);

        $this->addBehavior('Muffin/Trash.Trash', [
            'field' => 'deleted',
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
            ->nonNegativeInteger('message_thread_id')
            ->requirePresence('message_thread_id', 'create')
            ->notEmptyString('message_thread_id');

        $validator
            ->nonNegativeInteger('user_id')
            ->requirePresence('user_id', 'create')
            ->notEmptyString('user_id');

        $validator
            ->scalar('message')
            ->requirePresence('message', 'create')
            ->notEmptyString('message');

        $validator
            ->dateTime('read')
            ->allowEmptyDateTime('read');

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
        $rules->add($rules->existsIn('message_thread_id', 'MessageThreads'), ['errorField' => 'message_thread_id']);
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
