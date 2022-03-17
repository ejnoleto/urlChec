@extends('layouts.app')

@section('content')

<div>
    <h4 class="card-title">
        <b> {{ $componentName }} | {{ $pageTitle }}</b>
    </h4>
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
                        wire:click="Edit({{ $u->id }})"
                        class="btn btn-dark mtmobilie" title="Edit" data-toggle="modal" data-target="#theModal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-edit-3">
                                    <path d="M12 20h9"></path>
                                    <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                            </svg>
                        </a>

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

   <script>
        document.addEventListener('livewire:load', function() {

            window.livewire.on('show-modal', msg => {
                $('#theModal').modal('show');
            })

            window.livewire.on('address-added', msg => {
                $('#theModal').modal('hide');
            })

            window.livewire.on('address-updated', msg => {
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
</div>

@endsection