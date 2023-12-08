<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Nomor Cabang Olahraga') }}
        </h2>
    </x-slot>
        <div class="py-12">
            <div class="card sm:rounded-lg">
                <div class="card-header">
                    Update Nomor
                </div>
                <div class="card-body">
                  <form id="createNomor" method="POST" action="{{route('nomorStore')}}">
                    <div class="mb-3">
                      {{-- ditambahi input gawe id sng di edit --}}
                      <input type="hidden" name="id_nomor" value="{{$nomor->id}}">
                      <label for="exampleInputEmail1" class="form-label">Cabang Olahraga</label>
                      <select class="form-select" name="selectCabang" id="editCabang" aria-label="Default select example">
                        {{-- <option selected>Open this select menu</option> --}}
                        <option value="" disabled>.: Pilih :.</option> 
                        @isset($cabors)
                            @foreach ($cabors as $cabor)
                                <option value="{{$cabor->id}}" @if ($cabor->id == $nomor->cabor_id) selected @endif>{{$cabor->name}}</option>
                            @endforeach
                        @endisset
                      </select>
                      <div id="cabangErrorNomor" class="form-text error-messages"></div>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputNomor" class="form-label">Nomor Cabang Olahraga</label>
                      <input type="text" class="form-control" name="nameNomor" id="editNomor" aria-describedby="nomorCabangOlahraga" value="{{$nomor->name}}">
                      <div id="nameErrorNomor" class="form-text error-messages"></div>
                    </div>
                    <button id="btnNomor" type="button" class="btn btn-primary"></button>
                  </form>
                </div>
            </div>
        </div>
        
</x-app-layout>