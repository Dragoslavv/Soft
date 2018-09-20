<div class="box box-shadow mb-4">
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-6">
                    <div class="box box-shadow">

                        <div class="section-header">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <a href="#" class="btn btn-outline-dark create-fields" data-toggle="modal" data-target="#createModal"><i class="fa fa-plus"></i> New task</a>
                                </div>
                                <div class="col-lg-6 col-md-6 text-right">
                                    <div class="change">
                                        <input type="checkbox" class="" id="box1">
                                        <label for="box1">Hide completed tasks</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <table class="table-hover display" id="example">
                            <thead>
                                <tr>
                                    <th>Summary</th>
                                    <th>Status</th>
                                    <th>Due Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php if($r > 0): while ($t = $r->fetch_assoc()): ?>
                                <input type="text" name="del-id" id="del-id" value="<?php echo $t['id']; ?>">

                                <tr class="chackbox1" id="<?php  echo $t['id']; ?>">
                                    <td data-column="Summary"><a href="#" id="link" class="viewClass" data-toggle="modal" data-target="#viewModal" data-vid="<?php echo $t['id'] ?>"><?php echo $t['summary']; ?></a></td>
                                    <td data-column="Status">
                                        <select class="form-control list">
                                            <option value='1'>Pending</option>
                                            <option value='2'>In progress</option>
                                            <option value='3' class="comp">Completed</option>
                                        </select>
                                    </td>
                                    <td data-column="Due Date"><?php echo $t['date']; ?></td>
                                    <td data-column="Actions" class="text-center">
                                        <a href="#" class="btn btn-outline-dark edit" name="edit" data-toggle="modal" data-target="#editModal" data-uid="<?php echo $t['id'] ?>"><i class="fa fa-edit"></i></a>
                                        <a class="btn btn-outline-dark btn-check"><i class="fa fa-check"></i></a>
                                        <a class="btn btn-outline-dark btn-del"><i class="fa fa-remove"></i></a>
                                    </td>
                                </tr>
                            <?php endwhile; endif; ?>

                            </tbody>
                        </table>

                        <!-- Include files for modal -->
                        <?php require "modal/editModal.php";?>

                        <?php require "modal/createModal.php";?>

                        <?php require "modal/viewModal.php";?>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>