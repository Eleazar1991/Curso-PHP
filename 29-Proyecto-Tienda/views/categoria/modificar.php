<h1>Modificar Categoria</h1>
<p>Seleccione la categoria</p>
<form action="<?=base_url?>/categoria/update" method="POST">
    <select name="cat-up">
            <?php while($cat=$categorias->fetch_object()):?>
                    <option value="<?=$cat->id?>"><?=$cat->nombre?></option>         
            <?php endwhile; ?>
    </select>
    <input type="text" name="cat-nom" placeholder="Nuevo nombre de la categoria">
    <input type="submit" value="Modificar">
</form>    