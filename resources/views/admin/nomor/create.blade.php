<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Nomor Cabang Olahraga') }}
        </h2>
    </x-slot>
        <div class="py-12">
            <div class="card sm:rounded-lg">
                <div class="card-header">
                    Nomor
                </div>
                <div class="card-body">
                  <form id="createNomor">
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Cabang Olahraga</label>
                      <select class="form-select" name="selectCabang" aria-label="Default select example">
                        {{-- <option selected>Open this select menu</option> --}}
                        <option value="" selected disabled>.: Pilih :.</option>
                        @isset($cabors)
                            @foreach ($cabors as $cabor)
                                <option value="{{$cabor->id}}">{{$cabor->name}}</option>
                            @endforeach
                        @endisset
                      </select>
                      <div id="cabangErrorNomor" class="form-text error-messages"></div>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Nomor Cabang Olahraga</label>
                      <input type="text" class="form-control" name="nameNomor" aria-describedby="nomorCabangOlahraga">
                      <div id="nameErrorNomor" class="form-text error-messages"></div>
                    </div>
                    <button id="btnNomor" type="button" class="btn btn-primary"></button>
                  </form>
                </div>
            </div>
        </div>
        
</x-app-layout>