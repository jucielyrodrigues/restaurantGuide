<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Uploader\Uploader;
/**
 * Restaurants Controller
 *
 * @property \App\Model\Table\RestaurantsTable $Restaurants
 *
 * @method \App\Model\Entity\Restaurant[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RestaurantsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Address'],
            'conditions' => [
                'Restaurants.user_id' => $this->Auth->user('id'), 
            ]
        ];
        $restaurants = $this->paginate($this->Restaurants);

        $this->set([
            'restaurants' => $restaurants,
            '_serialize' => [
                'restaurants',
            ]
        ]);
    }

    /**
     * View method
     *
     * @param string|null $id Restaurant id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $restaurant = $this->Restaurants->get($id, [
            'contain' => ['Address'],
        ]);

        $this->set([
            'restaurant' => $restaurant,
            '_serialize' => [
                'restaurant',
            ]
        ]);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $restaurant = $this->Restaurants->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $data['user_id'] = $this->Auth->user('id');
            $data['photo'] = Uploader::handler($data['photo'], 'restaurant');
            $restaurant = $this->Restaurants->patchEntity($restaurant, $this->request->getData());

            unset($data['user_id']);
            $address= $this->Restaurants->Address->newEntity();
            $address= $this->Restaurants->Address->patchEntity($address, $data);

            $restaurant->address = $address;

            $this->Restaurants->save($restaurant);
        }

        $this->set([
            'restaurant' => $restaurant,
            '_serialize' => [
                'restaurant',
            ]
        ]);
    }

    /**
     * Edit method
     *
     * @param string|null $id Restaurant id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
   // public function edit($id = null)
        // {
        //     $restaurant = $this->Restaurants->get($id, [
        //         'contain' => [],
        //     ]);
        //     if ($this->request->is(['patch', 'post', 'put'])) {
        //         $restaurant = $this->Restaurants->patchEntity($restaurant, $this->request->getData());
        //         if ($this->Restaurants->save($restaurant)) {
        //             $this->Flash->success(__('The restaurant has been saved.'));

        //             return $this->redirect(['action' => 'index']);
        //         }
        //         $this->Flash->error(__('The restaurant could not be saved. Please, try again.'));
        //     }
        //     $users = $this->Restaurants->Users->find('list', ['limit' => 200]);
        //     $this->set(compact('restaurant', 'users'));
        // }

};
