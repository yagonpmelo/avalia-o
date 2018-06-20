<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Monitors Model
 *
 * @property \App\Model\Table\SchedulesTable|\Cake\ORM\Association\HasMany $Schedules
 *
 * @method \App\Model\Entity\Monitor get($primaryKey, $options = [])
 * @method \App\Model\Entity\Monitor newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Monitor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Monitor|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Monitor|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Monitor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Monitor[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Monitor findOrCreate($search, callable $callback = null, $options = [])
 */
class MonitorsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('monitors');
        $this->setDisplayField('name');
        $this->setPrimaryKey('user_id');

        $this->hasMany('Schedules', [
            'foreignKey' => 'monitor_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('user_id')
            ->allowEmpty('user_id', 'create');

        $validator
            ->scalar('discipline')
            ->maxLength('discipline', 20)
            ->allowEmpty('discipline');

        return $validator;
    }
}
