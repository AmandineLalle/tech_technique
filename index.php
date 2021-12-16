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
  <div class="cloud"></div>
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
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#a2d9ff" fill-opacity="1" d="M0,128L40,149.3C80,171,160,213,240,234.7C320,256,400,256,480,224C560,192,640,128,720,138.7C800,149,880,235,960,250.7C1040,267,1120,213,1200,197.3C1280,181,1360,203,1400,213.3L1440,224L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z"></path>
</svg>
</footer>