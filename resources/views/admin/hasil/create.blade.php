<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Membuat Hasil') }}
        </h2>
    </x-slot>
        <div class="py-12">
            <div class="card sm:rounded-lg">
                <div class="card-header">
                  Hasil
                </div>
                <div class="card-body">
                  <form id="createHasil">

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">kontingen</label>
                        <select class="form-select" name="selectKontingen" id="selectKontingen" aria-label="Default select example">
                            {{-- <option selected>Open this select menu</option> --}}
                            <option value="" selected disabled>.: Pilih :.</option>
                            @isset($kontingens)
                                @foreach ($kontingens as $kontingen)
                                    <option value="{{$kontingen->id}}">{{$kontingen->name}}</option>
                                @endforeach
                            @endisset
                        </select>
                        <div id="kotingenErrorHasil" class="form-text error-messages"></div>
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
                        <div id="cabangErrorHasil" class="form-text error-messages"></div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nomor</label>
                        <select class="form-select" name="selectNomor" id="selectNomor" aria-label="Default select example">
                            {{-- <option selected>Open this select menu</option> --}}
                            <option value="" selected disabled>.: Pilih :.</option>                            
                        </select>
                        <div id="nomorErrorHasil" class="form-text error-messages"></div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Atlet</label>
                        <select class="form-select" name="selectAtlet2" id="selectAtlet2" data-placeholder="Pilih apa saja">
                            {{-- <option selected>Open this select menu</option> --}}    
                            <option value="" selected disabled>.: Pilih :.</option>                      
                        </select>
                        <div id="atletErrorHasil" class="form-text error-messages"></div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Babak</label>
                        <select class="form-select" name="selectBabak" id="selectBabak" aria-label="Default select example">
                            {{-- <option selected>Open this select menu</option> --}}
                            <option value="" selected disabled>.: Pilih :.</option>
                            @isset($babaks)
                                @foreach ($babaks as $babak)
                                    <option value="{{$babak->id}}">{{$babak->name}}</option>
                                @endforeach
                            @endisset
                        </select>
                        <div id="babakErrorHasil" class="form-text error-messages"></div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Medali</label>
                        <select class="form-select" name="selectMedali" id="selectMedali" aria-label="Default select example">
                            {{-- <option selected>Open this select menu</option> --}}
                            <option value="" selected disabled>.: Pilih :.</option>
                            @isset($medalis)
                                @foreach ($medalis as $medali)
                                    <option value="{{$medali->id}}">{{$medali->name}}</option>
                                @endforeach
                            @endisset
                        </select>
                        <div id="medaliErrorHasil" class="form-text error-messages"></div>
                    </div>
                    <button id="btnHasil" type="button" class="btn btn-primary">Simpan</button>
                  </form>
                </div>
            </div>
        </div>
        
</x-app-layout>