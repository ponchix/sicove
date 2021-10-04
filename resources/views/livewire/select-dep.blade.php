<div class="row">

 <div class="col-md-6 col-xs-6 col-xs-6">
        <label>Marca</label>
        <select wire:model="selectedMarca" class="form-control" name="Marca">
            <option value="">-</option>
            @foreach($marcas as $marca)
            <option value="{{$marca->id}}">{{$marca->marca}}</option>
            @endforeach
        </select>
        </div>
 <div class="col-md-6 col-xs-6 col-xs-6">
        @if(!is_null($modelos))
        <label>Modelo</label>
        <select wire:model="selectedModelo" class="form-control" name="Modelo">
            <option value="">-</option>
            @foreach($modelos as $modelo)
            <option value="{{$modelo->modelo}}">{{$modelo->modelo}}</option>
            @endforeach
        </select>
        

    @endif
</div>
</div>
