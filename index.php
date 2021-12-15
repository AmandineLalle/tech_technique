<?php
require_once '_connect.php';

$pdo = new \PDO(DSN, USER, PASS);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$name = trim($_POST['name']);
$query = "INSERT INTO argonaute(name) VALUES(:name);";
$statement = $pdo->prepare($query);
$statement->bindValue('name', $name, \PDO::PARAM_STR);
$statement->execute();
header("Location: index.php");
}

$query = "SELECT * FROM argonaute";
$statement = $pdo->query($query);
$names = $statement->fetchAll();

?>
<!-- Header section -->
<header>
<link rel="stylesheet" href="style.css">
  <h1>
    Les Argonautes
  </h1>
</header>

<!-- Main section -->
<body>
  
  <!-- New member form -->
  <h2>Ajouter un(e) Argonaute</h2>
  <form class="new-member-form" method="post">
    <input id="name" name="name" type="text" placeholder="Charalampos" />
    <button class="submit" type="submit">Envoyer</button>
  </form>
  
  <!-- Member list -->
  <h2>Membres de l'équipage</h2>
  <section class="member-list">
    <?php foreach ($names as $name) : ?>
        <div class="member-item"><?= $name["name"] ?></div>
    <?php endforeach; ?>
  </section>
</body>

<footer>
  <p>Réalisé par Jason en Anthestérion de l'an 515 avant JC</p>
</footer>