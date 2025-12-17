<h1>Ajouter une diffusion</h1>

<form method="POST" action="/mon_projet/public/diffusion/add">
    <label>ID du film : 
        <input type="number" name="film_id" required>
    </label><br>

    <label>Date de diffusion : 
        <input type="date" name="date_diffusion" required>
    </label><br>

    <button type="submit">Ajouter</button>
</form>
