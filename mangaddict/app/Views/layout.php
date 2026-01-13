<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mangaddict </title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="logo">💮 Mangaddict 💮</div>
        <nav>
            <a href="index.php">Accueil</a>
            <a href="index.php?url=product/cart">Panier </a>
            <?php if(isset($_SESSION['user_id'])): ?>
                <a href="index.php?url=home/history">Mes Commandes</a>
                <a href="index.php?url=home/logout">Déconnexion</a>
                <span class="hello">hello, <?= $_SESSION['username'] ?></span>
            <?php else: ?>
                <a href="index.php?url=home/login">Connexion</a>
                <a href="index.php?url=home/register">Inscription</a>
            <?php endif; ?>
        </nav>
    </header>

    <main class="container">

        <?php if (file_exists($viewContent)) include $viewContent; else echo "Vue introuvable"; ?>
    </main>

    <footer>
        <p>© 2025 Mangaddict - efrei exercice mvc</p>
    </footer>
</body>
</html>
