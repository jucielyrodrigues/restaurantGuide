<?php
namespace App\Controller;

use App\Controller\AppController;
use Firebase\JWT\JWT;
use Cake\Utility\Security;

class UsersController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow([
            'login',
            'add'
        ]);
    }

    public function login()
    {
        $this->request->allowMethod(['post']);

        $user = $this->Auth->identify();
        if ($user) {
            $this->Auth->setUser($user);
            $data = [
                'token' => JWT::encode([
                    'sub' => $user['id'],
                    'exp' => time() + 3600 * 24 * 365,
                ], Security::salt())
            ];

            $this->set([
                'data' => $data,
                '_serialize' => ['data']
            ]);
        } else {
            $this->response = $this->response->withStatus(400);
            $this->set([
                'message' => 'Usuário ou senha inválidos',
                '_serialize' => ['message']
            ]);
        }
    }

    public function me()
    {
        $user = $this->Auth->user();
        $this->set([
            'user' => $user,
            '_serialize' => ['user']
        ]);
    }

    public function add()
    {
        $this->request->allowMethod(['post']);

        $user = $this->Users->newEntity();

        $user = $this->Users->patchEntity($user, $this->request->getData());

        if (count($user->errors()) > 0) {
            $this->response = $this->response->withStatus(422);
            $this->set([
                'errors' => $user->errors(),
                '_serialize' => ['errors'],
            ]);
            return;
        }
        $this->Users->save($user);

        $this->set([
            'user' => $user,
            '_serialize' => ['user'],
        ]);
    }
}
