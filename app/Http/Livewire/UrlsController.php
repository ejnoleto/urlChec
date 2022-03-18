<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Url;

class UrlsController extends Component
{
    use WithPagination;

    public $pageTitle, $componentName, $customFileName, $emit, $selected_id;
    public $address, $status, $access_date_time, $html_body;

    protected $listeners = [
        'deleteRow' => 'destroy'
    ];

    private $pagination = 7;

    public function render()
    {
        $data = Url::orderBy('id', 'desc')->paginate($this->pagination);
        return view('livewire.url.index', ['dados' => $data])
            ->extends('layouts.app')
            ->section('content');
    }


    public function paginationView()
    {
        return 'vendor.livewire.bootstrap';
    }

    public function mount()
    {
        $this->pageTitle = 'Listagem de todos os registros.';
        $this->componentName = 'URLs';
    }

    public function store()
    {
        $rules = [
            'address' => 'required|url'
        ];
        $messages = [
            'address.required' => 'Informação obrigatória.',
            'address.url' => 'Formato de URL inválido.',
        ];

        $this->validate($rules, $messages);

        $dados = Url::create([
            'address' => $this->address
        ]);

        $dados->save();

        $this->resetUI();
        session()->flash('message', 'URL Registrada');
    }

    public function resetUI()
    {
        $this->address = '';
        $this->search = '';
        $this->selected_id = 0;
    }

    public function update()
    {
        $rules = [
            'address' => 'required|url'
        ];
        $messages = [
            'address.required' => 'Informação obrigatória.',
            'address.url' => 'Formato de URL inválido.',
        ];

        $this->validate($rules, $messages);

        $address = Url::find($this->selected_id);
        $address->update([
            'address' => $this->address,
            'status' => $this->status,
            'access_date_time' => $this->access_date_time,
            'html_body' => $this->html_body
        ]);

        $address->save();

        $this->emit('address-updated', 'URL atualizada');
        $this->resetUI();
    }

    public function destroy(Url $address)
    {
        $address->delete();

        $this->resetUI();
        $this->emit('address-deleted', 'URL deletada com sucesso.');
    }

    public function Detail($id)
    {
        $record = Url::find($id, [
            'id', 'address', 'html_body'
        ]);
        $this->emit('show-detail', $record->html_body);
    }

    public function ShowDetail($id)
    {
    }
}
