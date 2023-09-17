<?= \Lib\Message::get()?>
<form action="/send-mail" method="POST">

  <div class="mb-3">
    <label class="form-label">Name:</label>
    <input type="text" class="form-control" name="name">
  </div>

  <div class="mb-3">
    <label class="form-label">Phone:</label>
    <input type="text" class="form-control" name="phone">
  </div>

  <div class="mb-3">
    <label class="form-label">Message:</label>
    <textarea class="form-control" name="message"></textarea>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>