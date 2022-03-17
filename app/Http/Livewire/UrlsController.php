<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Url;



class UrlsController extends Component
{
    use WithPagination;

    public $pageTitle, $componentName, $customFileName, $search, $selected_id;
    public $address, $status, $access_date_time, $image;

    private $pagination = 5;

    public function render()
    {
        return view('livewire.url.index');
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
        $this->emit('url-added', 'URL Registrada');
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
            'image' => $this->image
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
}
