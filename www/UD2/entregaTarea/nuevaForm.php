

<form action="nueva.php" method="post" class="mb-5">
    <div class="mb-3">
        <label class="form-label">Nombre de la tarea</label>
        <input class="form-control">
    </div>
    
        <label class="form-label">Estado</label>
        <select class="form-select">
            <option>Pendiente</option>
            <option>En proceso</option>
            <option>Completada</option>
            
        </select>
        <br>
        <br>
        <br>
        <br>

        <label class="form-label">Contenido</label>

        <br>
        <textarea name="contenido" rows="25" cols="100"></textarea>
        <br>
        <br>
    
    <button type="submit" class="btn btn-primary">Enviar</button>

