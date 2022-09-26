<?php
declare(strict_types=1);

namespace App\Model\Table;

use App\Model\Entity\FilmPerson;
use Cake\Datasource\EntityInterface;
use Cake\Datasource\ResultSetInterface;
use Cake\ORM\Association\BelongsTo;
use Cake\ORM\Behavior\TimestampBehavior;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FilmPeople Model
 *
 * @property PeopleTable&BelongsTo $People
 * @property FilmsTable&BelongsTo $Films
 * @property UsersTable&BelongsTo $Users
 *
 * @method FilmPerson newEmptyEntity()
 * @method FilmPerson newEntity(array $data, array $options = [])
 * @method FilmPerson[] newEntities(array $data, array $options = [])
 * @method FilmPerson get($primaryKey, $options = [])
 * @method FilmPerson findOrCreate($search, ?callable $callback = null, $options = [])
 * @method FilmPerson patchEntity(EntityInterface $entity, array $data, array $options = [])
 * @method FilmPerson[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method FilmPerson|false save(EntityInterface $entity, $options = [])
 * @method FilmPerson saveOrFail(EntityInterface $entity, $options = [])
 * @method FilmPerson[]|ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method FilmPerson[]|ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method FilmPerson[]|ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method FilmPerson[]|ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin TimestampBehavior
 */
class FilmPeopleTable extends Table
{
    public const FILM_TYPE_DIRECTOR = 'director';
    public const FILM_TYPE_NARRATOR = 'narrator';
    public const FILM_TYPE_CREATOR = 'creator';
    public const FILM_TYPE_ACTOR = 'actor';
    public const FILM_PEOPLE_TYPES = [
        self::FILM_TYPE_DIRECTOR,
        self::FILM_TYPE_NARRATOR,
        self::FILM_TYPE_CREATOR,
        self::FILM_TYPE_ACTOR,
    ];

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('film_people');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('People', [
            'foreignKey' => 'person_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Films', [
            'foreignKey' => 'film_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
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
            ->nonNegativeInteger('person_id')
            ->notEmptyString('person_id');

        $validator
            ->nonNegativeInteger('film_id')
            ->notEmptyString('film_id');

        $validator
            ->nonNegativeInteger('user_id')
            ->notEmptyString('user_id');

        $validator
            ->scalar('type')
            ->inList('type', self::FILM_PEOPLE_TYPES)
            ->maxLength('type', 100)
            ->notEmptyString('type');

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
        $rules->add($rules->existsIn('person_id', 'People'), ['errorField' => 'person_id']);
        $rules->add($rules->existsIn('film_id', 'Films'), ['errorField' => 'film_id']);
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
