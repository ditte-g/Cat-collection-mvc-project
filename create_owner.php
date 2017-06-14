<div class="modal fade" id="add2" tabindex="-1" role="dialog" aria-labelledby="add2" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="modal-title custom_align" id="Heading">Add an owner</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">

                    <input class="form-control " type="text" placeholder="Name" name="ownerName" id="text" required>
                </div>
                <div class="form-group">
                    <label>Choose a cat:</label>
                        <select name="cats_id" class="form-control" id="">
                            <?php foreach ($this->getAllCats() as $cat) { ?>
                                <option value="<?= $cat->getId() ?>"><?= $cat->getName() ?></option>
                            <?php } ?>
                        </select>
                </div>
            </div>
            <div class="modal-footer ">
                <button type="submit" class="btn btn-success btn-lg" style="width: 100%;" name="insert" id="insertOwner">
                    <span class="glyphicon glyphicon-plus"></span> Add owner
                </button>
            </div>
        </div>
    </div>
</div>