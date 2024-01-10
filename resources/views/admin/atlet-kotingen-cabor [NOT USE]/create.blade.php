<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Atlet + Kontingen + Cabang Olahraga') }}
        </h2>
    </x-slot>
        <div class="py-12">
            <div class="card sm:rounded-lg">
                <div class="card-header">
                  Atlet
                </div>
                <div class="card-body">
                  <form id="createAtletKonCa">
                    <div class="mb-3">
                      <label for="exampleInputAtletKonCa" class="form-label">Nama Atlet</label>
                      <input type="text" class="form-control" name="nameAtletKonCa" aria-describedby="AtletKonCa">
                      <div id="nameErrorAtletKonCa" class="form-text error-messages"></div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Kontingen</label>
                        <select class="form-select" name="selectKontingen" aria-label="Default select example">
                            {{-- <option selected>Open this select menu</option> --}}
                            <option value="" selected disabled>.: Pilih :.</option>
                            @isset($kontingens)
                                @foreach ($kontingens as $kontingen)
                                    <option value="{{$kontingen->id}}">{{$kontingen->name}}</option>
                                @endforeach
                            @endisset
                        </select>
                        <div id="kontingenErrorKonCa" class="form-text error-messages"></div>
                    </div>
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
                        <div id="cabangErrorKonCa" class="form-text error-messages"></div>
                    </div>
                    <button id="btnAtletKonCa" type="button" class="btn btn-primary"></button>
                  </form>
                </div>
            </div>
        </div>
        
</x-app-layout>