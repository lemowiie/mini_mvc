
<div class="detail-container">
    <div class="detail-img">
        <img src="<?= $product->image_url ?>" alt="<?= $product->name ?>">
    </div>
    <div class="detail-info">
        <h2><?= $product->name ?></h2>
        <p class="stock">En stock: <?= $product->stock ?></p>
        <p class="desc"><?= $product->description ?></p>
        <h1 class="price"><?= $product->price ?> €</h1>
        <a href="index.php?url=product/addToCart/<?= $product->id ?>" class="btn btn-big">Ajouter au Panier 🎀</a>
        <br><br>
        <a href="index.php">← Retour</a>
    </div>
</div>
