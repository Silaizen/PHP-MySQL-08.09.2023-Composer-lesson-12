<h1>Category edit</h1>

<form action="/categories/update/<?= $category->id ?>" method="post">
    <label for="">Name:</label>
    <input type="text" class="form-control" name="name" value="<?= $category->name ?>">
    
    <button class="btn btn-primary mt-3">Save</button>
</form>