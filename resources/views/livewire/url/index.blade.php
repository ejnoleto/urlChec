<div>
    <div class="widget-heading">
        <h4 class="card-title">
            <b> {{ $componentName }} | {{ $pageTitle }}</b>
        </h4>
    </div>

    <button type="button" href="javascript:void(0)" class="btn btn-danger" data-toggle="modal" data-target="#theModal">
        Novo
    </button>

    <table class="table striped mt-1">
        <thead>
        <tr>
             <td>URL</td>
             <td>Acesso</td>
             <td>Status</td>
             <td>Imagem</td>
             <td>Ações</td>
        </tr>
        </thead>
        <tbody>
            @foreach ($urls as $u )
                <tr >
                    <td >{{ $u->address }}</td>
                    <td >{{ $u->acesso }}</td>
                    <td >{{ $u->status }}</td>
                    <td >{{ $u->imagem }}</td>
                    <td class="text-center">
                        <a href="javascript:void(0)"
                        onclick="Confirm('{{ $u->id }}')"
                        class="btn btn-dark mtmobilie" title="Delete">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-trash-2">
                                <polyline points="3 6 5 6 21 6"></polyline>
                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                <line x1="14" y1="11" x2="14" y2="17"></line>
                            </svg>
                        </a>

                    </td>
                </tr>                
            @endforeach
        </tbody>
    </table>
    {{-- $urls->links() --}}

    @include('livewire.url.form')   
</div>
