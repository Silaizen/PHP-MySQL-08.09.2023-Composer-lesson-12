<!-- Core/Views/product/index.php -->
<h1>Products</h1>

<a href="/products/create" class="btn btn-primary my-3">Create Product</a>

<table class="table">
  <thead>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Price</th>
      <th>Category ID</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($products as $product) : ?>
    <tr>
      <td><?= $product->id ?></td>
      <td><?= $product->name ?></td>
      <td><?= $product->price ?></td>
      <td><?= $product->category_id ?></td>
      <td>
        <a href="/products/edit/<?= $product->id ?>" class="btn btn-warning">Edit</a>
    
        <form action="/products/remove/<?= $product->id ?>" method="post">
          <button class="btn btn-danger">Remove</button>
        </form>
      </td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>