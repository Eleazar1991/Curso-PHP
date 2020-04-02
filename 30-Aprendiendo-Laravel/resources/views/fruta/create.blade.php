@if(isset($fruta) && is_object($fruta))
    <h1>Editar fruta</h1>
    <form action="{{action('frutaController@update',['id'=>$fruta->id])}}" method="post">
        {{csrf_field()}}
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" value="{{ $fruta->nombre }}">
        <br>
        <label for="descripcion">Descripcion</label>
        <input type="text" name="descripcion" id="descripcion" value="{{ $fruta->descripcion }}">
        <br>
        <label for="precio">Precio</label>
        <input type="number" name="precio" id="precio" value="{{ $fruta->precio }}">
        <br>
        <input type="submit" value="Modificar">
    </form>
@else
    <h1>Crear una fruta</h1>
    <form action="{{action('frutaController@save')}}" method="post">
        {{csrf_field()}}
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre">
        <br>
        <label for="descripcion">Descripcion</label>
        <input type="text" name="descripcion" id="descripcion">
        <br>
        <label for="precio">Precio</label>
        <input type="number" name="precio" id="precio">
        <br>
        <input type="submit" value="Guardar">
    </form>
@endif
    

