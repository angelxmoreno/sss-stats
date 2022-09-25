<?php
declare(strict_types=1);

namespace App\Model\Table;

use App\Model\Entity\Person;
use Cake\Datasource\EntityInterface;
use Cake\Datasource\ResultSetInterface;
use Cake\ORM\Association\BelongsTo;
use Cake\ORM\Association\HasMany;
use Cake\ORM\Behavior\TimestampBehavior;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * People Model
 *
 * @property UsersTable&BelongsTo $Users
 * @property FilmPeopleTable&HasMany $FilmPeople
 *
 * @method Person newEmptyEntity()
 * @method Person newEntity(array $data, array $options = [])
 * @method Person[] newEntities(array $data, array $options = [])
 * @method Person get($primaryKey, $options = [])
 * @method Person findOrCreate($search, ?callable $callback = null, $options = [])
 * @method Person patchEntity(EntityInterface $entity, array $data, array $options = [])
 * @method Person[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method Person|false save(EntityInterface $entity, $options = [])
 * @method Person saveOrFail(EntityInterface $entity, $options = [])
 * @method Person[]|ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method Person[]|ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method Person[]|ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method Person[]|ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin TimestampBehavior
 */
class PeopleTable extends Table
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

        $this->setTable('people');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('FilmPeople', [
            'foreignKey' => 'person_id',
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
            ->nonNegativeInteger('user_id')
            ->notEmptyString('user_id');

        $validator
            ->scalar('name')
            ->maxLength('name', 100)
            ->notEmptyString('name')
            ->add('name', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

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
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
