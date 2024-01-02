<?php
// Include your database connection file here
// include '../config/connection.php';
include("connection.php");

// Placeholder for database connection (replace with actual connection code)
$dsn = 'mysql:host=localhost;dbname=brief9';
$username = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch data from the database (replace with your actual query)
    $stmt = $pdo->query("SELECT * FROM horaire");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Handle form submissions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Add your logic to handle form submissions here
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link href="../public/css/style.css" rel="stylesheet">

    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">SmatrTravel</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./view/index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<form method="post" action="">
  <div class="row">
    <div class="col-md-4">
      <input class="form-control" type="text" name="Depart" placeholder="Depart" required>
    </div>

    <div class="col-md-4">
      <input class="form-control" type="text" name="Areeve" placeholder="Areeve" required>
    </div>

    <div class="col-md-2">
      <input class="form-control" type="date" name="datetime" placeholder="date" required>
    </div>

    <div class="col-md-2">
      <input class="form-control" type="number" name="voyageurs" placeholder="voyageurs" required>
    </div>

    <div class="col-md-12 mt-3">
      <button id="submit" type="submit" class="btn btn-primary">Recherch</button>
    </div>
  </div>
</form>

<div class="col-md-4">
  <label for="price">Price Range:</label>
  <input class="form-control" type="number" id="minPrice" name="minPrice" placeholder="Min Price">
  <input class="form-control" type="number" id="maxPrice" name="maxPrice" placeholder="Max Price">
</div>
<div class="col-md-12 mt-3">
  <button id="submit" type="button" class="btn btn-primary" onclick="filterResults()">Recherche</button>
</div>

<div class="card" style="width: 60rem;">
    <?php
    foreach ($results_horaire as $horaire):
    ?>
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="data:image/jpg;base64,<?php echo base64_encode($entreprise['image_data']); ?>" alt="Image" width="100">
            </div>
            <div class="col-md-4">
                <div class="card-body">
                    <p class="card-text">
                        <i class="fas fa-map-marker-alt"></i><?= $horaire['hr_dep']?>
                        <i class="fas fa-arrow-right"></i>
                        <i class="fas fa-map-marker-alt"></i><?= $horaire['hr_arv']?>
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <h3><?= $horaire['prix']?></h3>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    <?php endforeach; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-eA0lH8V8+1XjSzAEf9XqPhXtqfAqsx1E1aXW8frtFbIit6a6JtnHo8FvWnaY1Tk9" crossorigin="anonymous"></script>
<script>
  function filterResults() {
    // Get the min and max prices entered by the user
    var minPrice = document.getElementById("minPrice").value;
    var maxPrice = document.getElementById("maxPrice").value;

    // Get all the cards that need to be filtered
    var cards = document.querySelectorAll('.card');

    // Loop through each card and check if it falls within the price range
    cards.forEach(function (card) {
      var priceElement = card.querySelector('h3');
      var price = parseFloat(priceElement.innerText.replace(' Dh', ''));

      // Hide or show the card based on the price range
      if (price >= minPrice && price <= maxPrice) {
        card.style.display = 'block';
      } else {
        card.style.display = 'none';
      }
    });
  }
</script>

</body>
</html>
