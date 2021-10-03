<div class="row">

 <div class="col-md-5 col-xs-5 col-xs-5">
        <label>Marca</label>
        <select wire:model="selectedMarca" class="form-control" name="Marcas">
            <option value="">-</option>
            @foreach($marcas as $marca)
            <option value="{{$marca->id}}">{{$marca->marca}}</option>
            @endforeach
        </select>
        </div>
 <div class="col-md-5 col-xs-5 col-xs-5">
        @if(!is_null($modelos))
        <label>Modelo</label>
        <select wire:model="selectedModelo" class="form-control" name="Modelo">
            <option value="">-</option>
            @foreach($modelos as $modelo)
            <option value="{{$modelo->id_marca}}">{{$modelo->modelo}}</option>
            @endforeach
        </select>
        

    @endif
</div>
</div>
