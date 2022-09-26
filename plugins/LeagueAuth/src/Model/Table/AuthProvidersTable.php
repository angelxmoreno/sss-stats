<?php
declare(strict_types=1);

namespace LeagueAuth\Model\Table;

use Cake\Datasource\EntityInterface;
use Cake\Datasource\ResultSetInterface;
use Cake\ORM\Behavior\TimestampBehavior;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use LeagueAuth\Model\Entity\AuthProvider;
use LeagueAuth\Model\Helper\LeagueAuthUserBuilderTrait;

/**
 * AuthProviders Model
 *
 * @method AuthProvider newEmptyEntity()
 * @method AuthProvider newEntity(array $data, array $options = [])
 * @method AuthProvider[] newEntities(array $data, array $options = [])
 * @method AuthProvider get($primaryKey, $options = [])
 * @method AuthProvider findOrCreate($search, ?callable $callback = null, $options = [])
 * @method AuthProvider patchEntity(EntityInterface $entity, array $data, array $options = [])
 * @method AuthProvider[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method AuthProvider|false save(EntityInterface $entity, $options = [])
 * @method AuthProvider saveOrFail(EntityInterface $entity, $options = [])
 * @method AuthProvider[]|ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method AuthProvider[]|ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method AuthProvider[]|ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method AuthProvider[]|ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin TimestampBehavior
 */
class AuthProvidersTable extends Table
{

    use LeagueAuthUserBuilderTrait;

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('auth_providers');
        $this->setDisplayField('display_name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->scalar('provider')
            ->maxLength('provider', 100)
            ->notEmptyString('provider');

        $validator
            ->scalar('identifier')
            ->maxLength('identifier', 150)
            ->notEmptyString('identifier');

        $validator
            ->scalar('name')
            ->maxLength('name', 200)
            ->allowEmptyString('name');

        $validator
            ->email('email')
            ->allowEmptyString('email');

        $validator
            ->boolean('email_verified')
            ->notEmptyString('email_verified');

        $validator
            ->scalar('picture_url')
            ->allowEmptyString('picture_url');

        $validator
            ->scalar('access_token')
            ->maxLength('access_token', 255)
            ->allowEmptyString('access_token');

        $validator
            ->scalar('refresh_token')
            ->maxLength('refresh_token', 255)
            ->allowEmptyString('refresh_token');

        $validator
            ->dateTime('token_expires')
            ->allowEmptyDateTime('token_expires');

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
        $rules->add($rules->isUnique(['provider', 'identifier']), ['errorField' => 'provider']);

        return $rules;
    }
}
