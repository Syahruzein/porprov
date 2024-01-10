<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Membuat Jadwal') }}
        </h2>
    </x-slot>
        <div class="py-12">
            <div class="card sm:rounded-lg">
                <div class="card-header">
                  Jadwal
                </div>
                <div class="card-body">
                  <form id="createJadwal">

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" id="tanggal">
                        <div id="tanggalErrorJadwal" class="form-text error-messages"></div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Waktu</label>
                        <input type="time" class="form-control" name="waktu" id="waktu">
                        <div id="waktuErrorJadwal" class="form-text error-messages"></div>
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
                        <div id="cabangErrorJadwal" class="form-text error-messages"></div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nomor</label>
                        <select class="form-select" name="selectNomor" id="selectNomor" aria-label="Default select example">
                            {{-- <option selected>Open this select menu</option> --}}
                            <option value="" selected disabled>.: Pilih :.</option>                            
                        </select>
                        <div id="nomorErrorJadwal" class="form-text error-messages"></div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Atlet</label>
                        <select class="form-select" name="selectAtlet[]" id="selectAtlet" multiple data-placeholder="Pilih apa saja">
                            {{-- <option selected>Open this select menu</option> --}}    
                            <option value="" selected disabled>.: Pilih :.</option>                      
                        </select>
                        <div id="atletErrorJadwal" class="form-text error-messages"></div>
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
                        <div id="babakErrorJadwal" class="form-text error-messages"></div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputTempatJadwal" class="form-label">Tempat</label>
                        <input type="text" class="form-control" name="tempat" id="tempat" aria-describedby="TempatJadwal">
                        <div id="tempatErrorJadwal" class="form-text error-messages"></div>
                    </div>
                    <button id="btnJadwal" type="button" class="btn btn-primary">Simpan</button>
                  </form>
                </div>
            </div>
        </div>
        
</x-app-layout>