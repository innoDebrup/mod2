<?php
require 'processing.php';
$objArr = process();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Innoraft Service</title>
  <link rel="stylesheet" href="./CSS/style.css" type="text/css">
</head>

<body>
  <div class="container">
    <!-- Traverse the array of objects and display them in sequence. -->
    <?php for ($x = 0; $x < count($objArr); $x++): ?>
      <!-- If the array index is even then show this div. -->
      <?php if ($x % 2 === 0) : ?>
        <div class="flex-spa">
          <div class="img-con">
            <img src="<?php echo $objArr[$x]->getImage(); ?>" alt="Image">
          </div>
          <div class="flex-cen col">
            <div class="heading">
              <?php echo $objArr[$x]->getDisplayTitle(); ?>
            </div>
            <!-- Display the icons -->
            <div class="icons">
              <?php foreach ($objArr[$x]->icons as $i): ?>
                <img src="<?php echo $i ?>" alt="">
              <?php endforeach; ?>
            </div>
            <div class="links">
              <?php echo $objArr[$x]->getServices(); ?>
              <div>
                <a class="btn" href="<?php echo $objArr[$x]->getLink(); ?>">Explore More</a>
              </div>
            </div>
          </div>
        </div>
      <!-- If the array index is odd then show this div. -->
      <?php else : ?>
        <div class="flex-spa">
          <div class="flex-cen col">
            <div class="heading">
              <?php echo $objArr[$x]->getDisplayTitle(); ?>
            </div>
            <!-- Display the icons -->
            <div class="icons">
              <?php foreach ($objArr[$x]->icons as $i) : ?>
                <img src="<?php echo $i ?>" alt="">
              <?php endforeach; ?>
            </div>
            <div class="links">
              <?php echo $objArr[$x]->getServices(); ?>
              <div>
                <a class="btn" href="<?php echo $objArr[$x]->getLink(); ?>">Explore More</a>
              </div>
            </div>
          </div>
          <div class="img-con">
            <img src="<?php echo $objArr[$x]->getImage(); ?>" alt="Image">
          </div>
        </div>
      <?php endif; ?>
    <?php endfor; ?>
  </div>
</body>

</html>
