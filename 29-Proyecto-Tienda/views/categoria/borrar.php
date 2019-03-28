<h1>Borrar Categoria/s</h1>
<p>Seleccione la categoria</p>
<form action="<?=base_url?>/categoria/delete" method="POST">
    <select name="cat-del">
            <?php while($cat=$categorias->fetch_object()):?>
                    <option value="<?=$cat->id?>"><?=$cat->nombre?></option>          
            <?php endwhile; ?>
    </select>
    <input type="submit" value="Eliminar">
</form>    