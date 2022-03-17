<div>
    <div class="widget-heading">
        <h4 class="card-title">
            <b> {{ $componentName }} | {{ $pageTitle }}</b>
        </h4>
    </div>

    <button type="button" href="javascript:void(0)" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#theModal">
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
            @foreach ($dados as $dado )
                <tr >
                    <td >{{ $dado->address }}</td>
                    <td >{{ $dado->acesso }}</td>
                    <td >{{ $dado->status }}</td>
                    <td >{{ $dado->imagem }}</td>
                    <td class="text-center">
                        <a href="javascript:void(0)"
                        onclick="Confirm('{{ $dado->id }}')"
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
    {{ $dados->links() }}

    @include('livewire.url.form')   
  
</div>
    <script>
        document.addEventListener('livewire:load', function() {

            window.livewire.on('show-modal', msg => {
                $('#theModal').modal('hide');
            })

            window.livewire.on('url-added', msg => {
                $('#theModal').modal('hide');
            })

            window.livewire.on('url-updated', msg => {
                $('#theModal').modal('hide');
            })

        });

        function Confirm(id) {
            swal({
                title: 'CONFIRMAR',
                text: 'CONFIRMA DELETAR REGISTRO?',
                type: 'warning',
                icon: "error",
                showCancelButton: true,
                cancelButtonText: 'Cancelar',
                cancelButtonColor: '#ffffff',
                confirmButtonText: 'OK',
                confirmButtonColor: '#3b3f5c'
            }).then(function(result) {
                if (result) {
                    window.livewire.emit('deleteRow', id)
                    swal.close()
                }
            })
        }

    </script>  
