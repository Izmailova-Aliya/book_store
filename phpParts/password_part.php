
<div class="col-sm-4">
   <form action="<?php $_PHP_SELF?>" method="post">
        <div class="form-group">
            <div class="panel panel-default">
                <div class="panel-heading"> Edit password </div>
                <div class="panel-body">
                    <div id="password" onclick="showFieldsPass()">
                    Password: (click to edit)
                        <div id="oldPass">
                            <input class="form-control" type="password" name="oldPass" placeholder="Old password"></br>
                        </div>
                        <div id="newPass">
                            <input class="form-control" type="password" name="newPass" placeholder="New password"></br>
                        </div>
                        <div id="confirm">
                            <input class="form-control" type="password" name="confirm" placeholder="Confirm password"></br>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <input class="btn btn-primary mb-2" type="submit" name="editPassword" value="Edit Password">
                </div>
            </div>
      </div>
   </form>
</div>