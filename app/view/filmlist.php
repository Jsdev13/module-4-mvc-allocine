<h1>Film List</h1>

<h1>Ajouter un film</h1>

<form method="POST" action="router.php?action=addFilm">
    <label>Titre : <input type="text" name="titre" required></label><br>
    <label>Genre : <input type="text" name="genre" required></label><br>
    <label>Auteur : <input type="text" name="auteur" required></label><br>
    <label>Date de sortie : <input type="date" name="date_sortie" required></label><br>
    <button type="submit">Ajouter</button>
</form>

<h1>Liste des films</h1>

<ul>
<?php if (!empty($films)): ?>
    <?php foreach ($films as $film): ?>
        <li>
            <strong><?= htmlspecialchars($film['titre']) ?></strong>
            (<?= htmlspecialchars($film['genre']) ?>) —
            par <?= htmlspecialchars($film['auteur']) ?>,
            sort le <?= date('d/m/Y', strtotime($film['date_sortie'])) ?>
        </li>
    <?php endforeach; ?>
<?php else: ?>
    <li>Aucun film trouvé.</li>
<?php endif; ?>
</ul>



