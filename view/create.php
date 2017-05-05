<!--

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


-->

<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span
                            class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="modal-title custom_align" id="Heading">Add a cat</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input class="form-control " type="text" placeholder="Name" name="name" id="text" required>
                </div>
                <div class="form-group">

                    <input class="form-control " type="date" placeholder="Birthday" name="birthday" id="text" required>
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" placeholder="Breed" name="breed" id="breed" required>
                </div>
            </div>
            <div class="modal-footer ">
                <button type="submit" class="btn btn-success btn-lg" style="width: 100%;" name="insert" id="insert"><span
                            class="glyphicon glyphicon-plus"></span> Add
                </button>
            </div>
        </div>
    </div>
</div>
