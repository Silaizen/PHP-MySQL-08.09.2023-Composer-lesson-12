<h1><?= $title ?></h1>

     <a href="/products-to-pdf" class="btn btn-success">Download pdf</a>
     <a href="/download-products-to-excel" class="btn btn-success">Download Excel</a>
  
     <?php if (isset($products)): ?>
        <ul>
    <?php  foreach($products as $product): ?>
        <li>
    <?= $product->name ?>,
    <?= $product->getCategory()->name ?>
        </li>
     
    <br>

    <?php endforeach ?>
    </ul>
    <?php else: ?>
    <p>No products available.</p>
<?php endif ?>

    