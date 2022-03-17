@extends('layouts.app')

@section('content')

<div>
    <h4 class="card-title">
        <b> {{ $componentName }} | {{ $pageTitle }}</b>
    </h4>
    <table class="table-warning">
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
                    <td> - </td>
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