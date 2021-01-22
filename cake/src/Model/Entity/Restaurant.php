<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Restaurant Entity
 *
 * @property int $id
 * @property string $title
 * @property string $photo
 * @property string $delivery_time
 * @property string $delivery_price
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $updated
 *
 * @property \App\Model\Entity\User $user
 */
class Restaurant extends Entity
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
        'title' => true,
        'photo' => true,
        'delivery_time' => true,
        'delivery_price' => true,
        'user_id' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
    ];
}
