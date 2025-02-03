<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Reservas Controller
 *
 * @property \App\Model\Table\ReservasTable $Reservas
 */
class ReservasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Reservas->find();
        $reservas = $this->paginate($query);

        $this->set(compact('reservas'));
    }

    /**
     * View method
     *
     * @param string|null $id Reserva id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $reserva = $this->Reservas->get($id, contain: []);
        $this->set(compact('reserva'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $reserva = $this->Reservas->newEmptyEntity();

        if ($this->request->is('post')) {
            $data = $this->request->getData();

            $datainicial = $data['datainicial'];
            $datafinal = $data['datafinal'];

            $conflitosData = $this->Reservas->find()
                ->where([
                    'OR' => [
                        [
                            'datainicial <' => $datafinal,
                            'datafinal >' => $datainicial
                        ]
                    ]
                ])
                ->toArray();

            if (!empty($conflitosData)) {
                $datasIndisponiveis = [];
                foreach ($conflitosData as $conflito) {
                    $datasIndisponiveis[] = "De {$conflito->datainicial} até {$conflito->datafinal}";
                }

                $this->Flash->error(__('O quarto está indisponível nas seguintes datas: ' . implode(', ', $datasIndisponiveis)));
            } else {
                $reserva = $this->Reservas->patchEntity($reserva, $data);
                if ($this->Reservas->save($reserva)) {
                    $this->Flash->success(__('Reserva criada com sucesso.'));
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('Não foi possível criar a reserva. Tente novamente.'));
                }
            }
        }

        $this->set(compact('reserva'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Reserva id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $reserva = $this->Reservas->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $reserva = $this->Reservas->patchEntity($reserva, $this->request->getData());
            if ($this->Reservas->save($reserva)) {
                $this->Flash->success(__('The reserva has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The reserva could not be saved. Please, try again.'));
        }
        $this->set(compact('reserva'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Reserva id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $reserva = $this->Reservas->get($id);
        if ($this->Reservas->delete($reserva)) {
            $this->Flash->success(__('The reserva has been deleted.'));
        } else {
            $this->Flash->error(__('The reserva could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
