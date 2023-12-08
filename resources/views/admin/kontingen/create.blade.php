<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Kontingen') }}
        </h2>
    </x-slot>
        <div class="py-12">
            <div class="card sm:rounded-lg">
                <div class="card-header">
                  Kontingen
                </div>
                <div class="card-body">
                  <form id="createKontingen">
                    <div class="mb-3">
                      <label for="exampleInputKontingen" class="form-label">Kontingen</label>
                      <input type="text" class="form-control" name="nameKontingen" aria-describedby="nameKontingen">
                      <div id="kontingenError" class="form-text error-messages"></div>
                    </div>
                    <button id="btnKontingen" type="button" class="btn btn-primary"></button>
                  </form>
                </div>
            </div>
        </div>
        
</x-app-layout>