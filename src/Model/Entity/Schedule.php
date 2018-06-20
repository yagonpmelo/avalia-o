<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Schedule Entity
 *
 * @property int $id
 * @property int $monitor_id
 * @property \Cake\I18n\FrozenTime $date_hour_init
 * @property \Cake\I18n\FrozenTime $date_hour_end
 * @property string $status
 * @property int $user_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Monitor $monitor
 */
class Schedule extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'monitor_id' => true,
        'date_hour_init' => true,
        'date_hour_end' => true,
        'status' => true,
        'user_id' => true,
        'user' => true,
        'monitor' => true
    ];
}
