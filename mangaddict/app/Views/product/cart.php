
<h2>Mon Panier  </h2>
<?php if(empty($cart)): ?>
    <p>votre panier est vide... allez vite acheter des mangas !</p>
<?php else: ?>
    <table class="kitty-table">
        <thead>
            <tr>
                <th>Produit</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($cart as $id => $item): ?>
                <tr>
                    <td><?= $item['name'] ?></td>
                    <td><?= $item['price'] ?> €</td>
                    <td><?= $item['qty'] ?></td>
                    <td><?= $item['price'] * $item['qty'] ?> €</td>
                    <td><a href="index.php?url=product/removeCart/<?= $id ?>" class="btn-delete">X</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="cart-total">
        <h3>Total à payer : <?= $total ?> €</h3>
        <a href="index.php?url=product/checkout" class="btn btn-big">Valider la commande </a>
    </div>
<?php endif; ?>
