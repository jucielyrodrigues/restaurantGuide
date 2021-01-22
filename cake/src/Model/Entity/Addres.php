<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Addres Entity
 *
 * @property int $id
 * @property string $eircode
 * @property string $address
 * @property string $number
 * @property string|null $complement
 * @property string $neighborhood
 * @property string $city
 * @property string $state
 * @property string|null $user
 * @property int|null $restaurant_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $updated
 *
 * @property \App\Model\Entity\Restaurant $restaurant
 */
class Addres extends Entity
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
        'cep' => true,
        'address' => true,
        'number' => true,
        'complement' => true,
        'neighborhood' => true,
        'city' => true,
        'state' => true,
        'user' => true,
        'restaurant_id' => true,
        'created' => true,
        'modified' => true,
        'restaurant' => true,
    ];
}
