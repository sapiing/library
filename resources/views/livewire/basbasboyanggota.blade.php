<div>
  <input type="text" wire:model="searchTerm" placeholder="Cari Anggota..." class="form-control">

  <select class="form-control" wire:model="selectedAnggota">
      <option value="">Pilih Anggota</option>
      @foreach ($anggota as $item)
          <option value="{{ $item->id }}">{{ $item->nama }}</option>
      @endforeach
  </select>
</div>
