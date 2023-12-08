<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Cabang Olahraga') }}
        </h2>
    </x-slot>
        <div class="py-12">
            <div class="card sm:rounded-lg">
                <div class="card-header">
                  Update Olahraga
                </div>
                <div class="card-body">
                  <form id="createCabor" method="POST" action="{{route('caborStore')}}">
                    <div class="mb-3">
                      <input type="hidden" name="id_cabor" value="{{$cabor->id}}">
                      <label for="exampleInputCabor" class="form-label">Cabang Olahraga</label>
                      <input type="text" class="form-control" name="nameCabor" aria-describedby="cabangOlahraga" value="{{$cabor->name}}">
                      <div id="nameError" class="form-text error-messages"></div>
                    </div>
                    <button id="btnCabor" type="button" class="btn btn-primary"></button>
                  </form>
                </div>
            </div>
        </div>
        
</x-app-layout>