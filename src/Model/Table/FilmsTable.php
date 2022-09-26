<?php
declare(strict_types=1);

namespace App\Model\Table;

use App\Model\Entity\Film;
use App\Model\Entity\Person;
use Cake\Database\Query;
use Cake\Datasource\EntityInterface;
use Cake\Datasource\ResultSetInterface;
use Cake\ORM\Association\BelongsTo;
use Cake\ORM\Association\HasMany;
use Cake\ORM\Behavior\TimestampBehavior;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Utility\Inflector;
use Cake\Validation\Validator;

/**
 * Films Model
 *
 * @property EpisodesTable&BelongsTo $Episodes
 * @property UsersTable&BelongsTo $Users
 * @property FilmPeopleTable&HasMany $FilmPeople
 * @property Person&BelongsTo $Submitter
 *
 * @method Film newEmptyEntity()
 * @method Film newEntity(array $data, array $options = [])
 * @method Film[] newEntities(array $data, array $options = [])
 * @method Film get($primaryKey, $options = [])
 * @method Film findOrCreate($search, ?callable $callback = null, $options = [])
 * @method Film patchEntity(EntityInterface $entity, array $data, array $options = [])
 * @method Film[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method Film|false save(EntityInterface $entity, $options = [])
 * @method Film saveOrFail(EntityInterface $entity, $options = [])
 * @method Film[]|ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method Film[]|ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method Film[]|ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method Film[]|ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin TimestampBehavior
 */
class FilmsTable extends Table
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

        $this->setTable('films');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Episodes', [
            'foreignKey' => 'episode_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('FilmPeople', [
            'foreignKey' => 'film_id',
        ]);

        $this->belongsTo('Submitter')
            ->setForeignKey('submitted_by')
            ->setJoinType(Query::JOIN_TYPE_LEFT)
            ->setClassName(PeopleTable::class)
            ->setProperty('submitter');


        foreach (FilmPeopleTable::FILM_PEOPLE_TYPES as $type) {
            $alias = Inflector::pluralize(Inflector::camelize($type));
            $property = Inflector::tableize($alias);
            $this->belongsToMany($alias)
                ->setForeignKey('film_id')
                ->setTargetForeignKey('person_id')
                ->setThrough(FilmPeopleTable::class)
                ->setClassName(PeopleTable::class)
                ->setProperty($property)
                ->setConditions([
                    'FilmPeople.type' => $type,
                ]);
        }
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
            ->nonNegativeInteger('episode_id')
            ->notEmptyString('episode_id');

        $validator
            ->nonNegativeInteger('user_id')
            ->notEmptyString('user_id');

        $validator
            ->nonNegativeInteger('submitted_by')
            ->requirePresence('submitted_by', 'create')
            ->notEmptyString('submitted_by');

        $validator
            ->scalar('title')
            ->maxLength('title', 100)
            ->notEmptyString('title');

        $validator
            ->scalar('link')
            ->maxLength('link', 200)
            ->notEmptyString('link');

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
        $rules->add($rules->existsIn('episode_id', 'Episodes'), ['errorField' => 'episode_id']);
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
