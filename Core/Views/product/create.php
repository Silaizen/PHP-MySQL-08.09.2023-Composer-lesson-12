<!-- Core/Views/product/create.php -->
<h1>Create Product</h1>

<form action="/products/save" method="post">
    <div class="mb-3">
        <label for="name" class="form-label">Name:</label>
        <input type="text" class="form-control" id="name" name="name">
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Price:</label>
        <input type="text" class="form-control" id="price" name="price">
    </div>

    <div class="mb-3">
        <label for="category_id" class="form-label">Category ID:</label>
        <input type="text" class="form-control" id="category_id" name="category_id">
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
</form>