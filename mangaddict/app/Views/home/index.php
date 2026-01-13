
<div class="hero">
    <h1>Bienvenue sur Mangaddict !</h1>
    <p>Les meilleurs mangas pour les vrais otaku (et c'est tout rose !)</p>
</div>

<div class="product-grid">
    <?php foreach($products as $p): ?>
        <div class="card">
            <img src="<?= $p->image_url ?>" alt="<?= $p->name ?>">
            <div class="card-body">
                <h3><?= $p->name ?></h3>
                <span class="category"><?= $p->category_name ?></span>
                <p class="price"><?= $p->price ?> €</p>
                <a href="index.php?url=product/detail/<?= $p->id ?>" class="btn">Voir Détails</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>
