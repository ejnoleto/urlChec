<div>
  <div class="widget-heading">
    <h4 class="card-title">
      <b> {{ $componentName }} | {{ $pageTitle }}</b>
    </h4>
  </div>

  <button type="button" href="javascript:void(0)" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#theModal">
    Novo
  </button>
  <button type="button" class="btn btn-success" wire:click="$refresh">Atualizar</button>
  <table class="table striped mt-1">
    <thead>
      <tr>
        <td>URL</td>
        <td>Acesso</td>
        <td>Status</td>
        <td>Corpo HTML</td>
        <td>Ações</td>
      </tr>
    </thead>
    <tbody>
      @foreach ($dados as $urlItem )
      <tr>
        <td>{{ $urlItem->address }}</td>
        <td>{{ $urlItem->access_date_time }}</td>
        <td>{{ $urlItem->status }}</td>
        <td>
          <a href="javascript:void(0)" wire:click="Detail({{ $urlItem->id }})" class="btn btn-warning mtmobilie" title="Detail">
            Detalhes
          </a>
        </td>
        <td class="text-center">
          <a href="javascript:void(0)" onclick="Confirm('{{ $urlItem->id }}')" class="btn btn-danger mtmobilie" title="Delete">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
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
    window.livewire.on('show-detail', msg => {
      swal({
        title: 'DETALHES',
        text: msg,
        className: 'w-75'
      })
    })
  });


  function Confirm(id) {
    swal({
      title: 'CONFIRMAÇÃO',
      text: 'DESEJA DELETAR REGISTRO?',
      icon: "warning",
      buttons: ['Cancelar', 'Deletar'],
      dangerMode: true,
    }).then(function(result) {
      if (result) {
        window.livewire.emit('deleteRow', id)
        swal.close()
      }
    })
  }
</script>