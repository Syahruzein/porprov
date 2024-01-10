<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Atlet + Kontingen + Cabang Olahraga + Nomor') }}
        </h2>
    </x-slot>
        <div class="py-12">
            <div class="card sm:rounded-lg">
                <div class="card-header">
                    Update Atlet + Kontingen + Cabang Olahraga + Nomor
                </div>
                <div class="card-body">
                  <form id="createAtletKonCaNo" method="POST" action="{{route('atletKontingenCaborNomorStore')}}">
                    
                    <div class="mb-3">
                        {{-- ditambahi input gawe id sng di edit --}}
                        <input type="hidden" name="id_atlet" value="{{$atlet->id}}">
                        <label for="exampleInputEmail1" class="form-label">Kontingen</label>
                        <select class="form-select" name="selectKontingen" id="selectKontingen" aria-label="Default select example">
                          {{-- <option selected>Open this select menu</option> --}}
                          <option value="" disabled>.: Pilih :.</option> 
                          @isset($kontingens)
                              @foreach ($kontingens as $kontingen)
                                  <option value="{{$kontingen->id}}" @if ($kontingen->id == $atlet->kontingen_id) selected @endif>{{$kontingen->name}}</option>
                              @endforeach
                          @endisset
                        </select>
                        <div id="kontingenErrorKonCa" class="form-text error-messages"></div>
                    </div>
                    
                    <div class="mb-3">
                      {{-- ditambahi input gawe id sng di edit --}}
                      <input type="hidden" name="id_atlet" value="{{$atlet->id}}">
                      <label for="exampleInputEmail1" class="form-label">Cabang Olahraga</label>
                      <select class="form-select" name="selectCabang" id="selectCabang" aria-label="Default select example">
                        {{-- <option selected>Open this select menu</option> --}}
                        <option value="" disabled>.: Pilih :.</option> 
                        @isset($cabors)
                            @foreach ($cabors as $cabor)
                                <option value="{{$cabor->id}}" @if ($cabor->id == $atlet->cabor_id) selected @endif>{{$cabor->name}}</option>
                            @endforeach
                        @endisset
                      </select>
                      <div id="cabangErrorKonCa" class="form-text error-messages"></div>
                    </div>

                    <div class="mb-3">
                        {{-- ditambahi input gawe id sng di edit --}}
                        <input type="hidden" name="id_atlet" value="{{$atlet->id}}">
                        <label for="exampleInputEmail1" class="form-label">Nomor</label>
                        <select class="form-select" name="selectNomor" id="selectNomor" aria-label="Default select example">
                          {{-- <option selected>Open this select menu</option> --}}
                          <option value="" disabled>.: Pilih :.</option> 
                          @isset($nomors)
                              @foreach ($nomors as $nomor)
                                  <option value="{{$nomor->id}}" @if ($nomor->id == $atlet->nomor_id) selected @endif>{{$nomor->name}}</option>
                              @endforeach
                          @endisset
                        </select>
                        <div id="nomorErrorKonCaNo" class="form-text error-messages"></div>
                      </div>
                    
                      <div class="mb-3">
                        <label for="exampleInputNamaAtlet" class="form-label">Nama Atlet</label>
                        <input type="text" class="form-control" name="nameAtletKonCaNo" id="editAtlet" aria-describedby="atlet" value="{{$atlet->name}}">
                        <div id="nameErrorAtletKonCa" class="form-text error-messages"></div>
                    </div>
                        
                    <button id="btnAtletKonCaNo" type="button" class="btn btn-primary"></button>
                  </form>
                </div>
            </div>
        </div>
        
</x-app-layout>