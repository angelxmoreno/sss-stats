<?php
declare(strict_types=1);

namespace DirectMessages\Model\Table;

use App\Model\Table\UsersTable;
use Cake\Datasource\EntityInterface;
use Cake\Datasource\ResultSetInterface;
use Cake\ORM\Association\BelongsTo;
use Cake\ORM\Association\HasMany;
use Cake\ORM\Behavior\TimestampBehavior;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use DirectMessages\Model\Entity\MessageThread;

/**
 * MessageThreads Model
 *
 * @property UsersTable&BelongsTo $User1s
 * @property UsersTable&BelongsTo $User2s
 * @property MessagesTable&HasMany $Messages
 *
 * @method MessageThread newEmptyEntity()
 * @method MessageThread newEntity(array $data, array $options = [])
 * @method MessageThread[] newEntities(array $data, array $options = [])
 * @method MessageThread get($primaryKey, $options = [])
 * @method MessageThread findOrCreate($search, ?callable $callback = null, $options = [])
 * @method MessageThread patchEntity(EntityInterface $entity, array $data, array $options = [])
 * @method MessageThread[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method MessageThread|false save(EntityInterface $entity, $options = [])
 * @method MessageThread saveOrFail(EntityInterface $entity, $options = [])
 * @method MessageThread[]|ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method MessageThread[]|ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method MessageThread[]|ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method MessageThread[]|ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin TimestampBehavior
 */
class MessageThreadsTable extends Table
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

        $this->setTable('message_threads');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('User1s', [
            'foreignKey' => 'user_1_id',
            'joinType' => 'INNER',
            'className' => UsersTable::class,
        ]);
        $this->belongsTo('User2s', [
            'foreignKey' => 'user_2_id',
            'className' => UsersTable::class,
        ]);
        $this->hasMany('Messages', [
            'foreignKey' => 'message_thread_id',
            'className' => 'DirectMessages.Messages',
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
            ->nonNegativeInteger('user_1_id')
            ->requirePresence('user_1_id', 'create')
            ->notEmptyString('user_1_id');

        $validator
            ->nonNegativeInteger('user_2_id')
            ->requirePresence('user_2_id', 'create')
            ->notEmptyString('user_2_id');

        $validator
            ->nonNegativeInteger('message_count')
            ->allowEmptyString('message_count');

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
        $rules->add($rules->existsIn('user_1_id', 'User1s'), ['errorField' => 'user_1_id']);
        $rules->add($rules->existsIn('user_2_id', 'User2s'), ['errorField' => 'user_2_id']);

        return $rules;
    }
}
