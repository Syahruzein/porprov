<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Atlet + Kontingen + Cabang Olahraga + Nomor') }}
        </h2>
    </x-slot>
        <div class="py-12">
            <div class="card sm:rounded-lg">
                <div class="card-header">
                  Atlet
                </div>
                <div class="card-body">
                  <form id="createAtletKonCaNo">                    
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
                        <div id="kontingenErrorKonCaNo" class="form-text error-messages"></div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Cabang Olahraga</label>
                        <select class="form-select" name="selectCabang" id="selectCabang" aria-label="Default select example">
                            {{-- <option selected>Open this select menu</option> --}}
                            <option value="" selected disabled>.: Pilih :.</option>
                            @isset($cabors)
                                @foreach ($cabors as $cabor)
                                    <option value="{{$cabor->id}}">{{$cabor->name}}</option>
                                @endforeach
                            @endisset
                        </select>
                        <div id="cabangErrorKonCaNo" class="form-text error-messages"></div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nomor</label>
                        <select class="form-select" name="selectNomor" id="selectNomor" aria-label="Default select example">
                            {{-- <option selected>Open this select menu</option> --}}
                            <option value="" selected disabled>.: Pilih :.</option>                            
                        </select>
                        <div id="nomorErrorKonCaNo" class="form-text error-messages"></div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputAtletKonCaNo" class="form-label">Nama Atlet</label>
                        <input type="text" class="form-control" name="nameAtletKonCaNo" aria-describedby="AtletKonCaNo">
                        <div id="nameErrorAtletKonCaNo" class="form-text error-messages"></div>
                    </div>
                    <button id="btnAtletKonCaNo" type="button" class="btn btn-primary"></button>
                  </form>
                </div>
            </div>
        </div>
        
</x-app-layout>