<!-- Create Modal --->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="box box-shadow">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="#">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4 col-md-4">
                                    <label for="text-summary">Summary: </label>
                                </div>
                                <div class="col-lg-8 col-md-8">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="text-summary">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4">
                                    <label for="date">Duo Date: </label>
                                </div>
                                <div class="col-lg-8 col-md-8">
                                    <div class="form-group">
                                        <input type="date" id="date" name="date" min="1000-01-01"
                                               max="3000-12-31" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4">
                                    <label for="descriptions">Description: </label>
                                </div>
                                <div class="col-lg-8 col-md-8">
                                    <div class="form-group">
                                        <textarea class="form-control" id="descriptions" name="descriptions" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <button type="button" id="submit" name="submit" class="btn btn-outline-dark btn-block">Save</button>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <button type="button" class="btn btn-outline-dark btn-block"  data-dismiss="modal" aria-label="Close">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>