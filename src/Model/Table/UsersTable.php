<?php
declare(strict_types=1);

namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\Datasource\EntityInterface;
use Cake\Datasource\ResultSetInterface;
use Cake\ORM\Association\BelongsTo;
use Cake\ORM\Association\HasMany;
use Cake\ORM\Behavior\TimestampBehavior;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use LeagueAuth\Model\Table\AuthProvidersTable;

/**
 * Users Model
 *
 * @property AuthProvidersTable&BelongsTo $GoogleAuthProviders
 * @property EpisodeAttributeValuesTable&HasMany $EpisodeAttributeValues
 * @property EpisodeSnacksTable&HasMany $EpisodeSnacks
 * @property FilmPeopleTable&HasMany $FilmPeople
 * @property FilmsTable&HasMany $Films
 * @property PeopleTable&HasMany $People
 *
 * @method User newEmptyEntity()
 * @method User newEntity(array $data, array $options = [])
 * @method User[] newEntities(array $data, array $options = [])
 * @method User get($primaryKey, $options = [])
 * @method User findOrCreate($search, ?callable $callback = null, $options = [])
 * @method User patchEntity(EntityInterface $entity, array $data, array $options = [])
 * @method User[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method User|false save(EntityInterface $entity, $options = [])
 * @method User saveOrFail(EntityInterface $entity, $options = [])
 * @method User[]|ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method User[]|ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method User[]|ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method User[]|ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin TimestampBehavior
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('GoogleAuthProviders')
            ->setClassName(AuthProvidersTable::class)
            ->setForeignKey('google_auth_provider_id')
            ->setBindingKey('id');

        $this->hasMany('EpisodeAttributeValues', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('EpisodeSnacks', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('FilmPeople', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Films', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('People', [
            'foreignKey' => 'user_id',
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
            ->nonNegativeInteger('google_auth_provider_id')
            ->allowEmptyString('google_auth_provider_id')
            ->add('google_auth_provider_id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('name')
            ->maxLength('name', 100)
            ->notEmptyString('name');

        $validator
            ->email('email')
            ->notEmptyString('email')
            ->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('password')
            ->maxLength('password', 100)
            ->allowEmptyString('password');

        $validator
            ->scalar('picture_url')
            ->allowEmptyString('picture_url');

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
        $rules->add($rules->isUnique(['email']), ['errorField' => 'email']);
        $rules->add($rules->existsIn('google_auth_provider_id', 'GoogleAuthProviders'), ['errorField' => 'google_auth_provider_id']);

        return $rules;
    }
}
