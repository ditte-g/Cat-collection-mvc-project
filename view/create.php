<div class="col-md-8">

<form action="/index.php?page=add" method="post">
    <div class="form-group">
        <label for="title">Name: </label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Name" required>
    </div>
    <div class="form-group">
        <label for="altTitle">Birthday: </label>
        <input type="date" name="birthday" class="form-control" id="birthday" placeholder="Birthday" required>
    </div>
    <div class="form-group">
        <label for="director">Breed: </label>
        <input type="text" name="breed" class="form-control" id="breed" placeholder="Breed" required>
    </div>
    <button type="submit" class="btn btn-default" name="insert" id="insert">Insert new cat</button>
</form>

</div>