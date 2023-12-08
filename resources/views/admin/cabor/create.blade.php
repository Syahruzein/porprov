<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Cabang Olahraga') }}
        </h2>
    </x-slot>
        <div class="py-12">
            <div class="card sm:rounded-lg">
                <div class="card-header">
                  Olahraga
                </div>
                <div class="card-body">
                  <form id="createCabor">
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Cabang Olahraga</label>
                      <input type="text" class="form-control" name="nameCabor" aria-describedby="cabangOlahraga">
                      <div id="nameError" class="form-text error-messages"></div>
                    </div>
                    <button id="btnCabor" type="button" class="btn btn-primary"></button>
                  </form>
                </div>
            </div>
        </div>
        
</x-app-layout>