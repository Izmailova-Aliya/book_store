<?php session_start(); ?>
<div class="col-sm-4">
                    <form action="<?php $_PHP_SELF?>" method="post">
                        <div class="form-group">
                            <div class="panel panel-default">
                                <div class="panel-heading"> Edit profile <?php echo $_SESSION['user']['email'] ?> </div>
                                <div class="panel-body">
                                    <div id="name">Name:
                                        <input class="form-control" type="text" name="name" value="<?php echo $_SESSION['user']['fname'] ?>">
                                        </br>
                                    </div>
                                    <div id="surname" >Surname:
                                        <input class="form-control" type="text" name="surname" value="<?php echo $_SESSION['user']['lname'] ?>">
                                    </div>
                                    <div id="phoneNum" >Phone:
                                        <input class="form-control" type="text" name="phoneNum" value="<?php echo $_SESSION['user']['phone'] ?>">
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <input class="btn btn-primary mb-2" type="submit" name="editProfile" value="Edit">
                                </div>
                            </div>
                        </div>
                    </form>
               </div>