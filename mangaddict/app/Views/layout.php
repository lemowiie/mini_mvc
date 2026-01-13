<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mangaddict - Kawaii Shop</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="logo">🌸 Mangaddict 🌸</div>
        <nav>
            <a href="index.php">Accueil</a>
            <a href="index.php?url=product/cart">Panier 🛒</a>
            <?php if(isset($_SESSION['user_id'])): ?>
                <a href="index.php?url=home/history">Mes Commandes</a>
                <a href="index.php?url=home/logout">Déconnexion</a>
                <span class="hello">Konnichiwa, <?= $_SESSION['username'] ?>!</span>
            <?php else: ?>
                <a href="index.php?url=home/login">Connexion</a>
                <a href="index.php?url=home/register">Inscription</a>
            <?php endif; ?>
        </nav>
    </header>

    <main class="container">
        <!-- Injection de la vue spécifique ici -->
        <?php if (file_exists($viewContent)) include $viewContent; else echo "Vue introuvable"; ?>
    </main>

    <footer>
        <p>© 2025 Mangaddict - Fait avec 💖 et du PHP Vanilla</p>
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a2/Hello_Kitty_logo.svg/1200px-Hello_Kitty_logo.svg.png" alt="bow" style="width:30px;">
    </footer>
</body>
</html>
