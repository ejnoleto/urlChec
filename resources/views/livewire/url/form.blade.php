@include('common.modalHead')
<form action="" method="post">
    <div class="col-12">
        <label for="address" class="form-label">Url</label>
        <input type="url" class="form-control" wire:model.lazy="address" id="address" placeholder="Digite sua URL.">
        @error('address')
            <span class="text-danger er">{{ $message }}</span>
        @enderror        
    </div> 
</form>
@include('common.modalFooter')