<h1>Liste des diffusions</h1>

<ul>
<?php foreach ($diffusions as $d): ?>
    <li>
        Film #<?= htmlspecialchars($d->getFilmId()) ?> — 
        Date : <?= htmlspecialchars($d->getDateDiffusion()->format('d/m/Y')) ?>
    </li>
<?php endforeach; ?>
</ul>

<p><a href="/mon_projet/public/diffusion/add">➕ Ajouter une diffusion</a></p>
