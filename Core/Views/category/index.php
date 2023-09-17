<h1>Categories</h1>

<a href="/categories/create" class= "btn btn-primary my-3">Create category</a>

<table class="table">
  <thead>
    <tr>
      <th>id</th>
      <th>Name</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($categories as $category) : ?>
    <tr>
      <td><?= $category->id ?></td>
      <td><?= $category->name ?></td>
      <td>
        <a href="categories/edit/<?= $category->id ?>" class="btn btn-warning">Edit</a>
    
        <form action="/categories/remove/<?= $category->id ?>" method="post">
    <input type="hidden" name="category_id" value="<?= $category->id ?>">
    <button class="btn btn-danger" type="submit">Remove</button>
</form>

      </td>
    </tr>
    <?php endforeach ?>
  </tbody>
</table>