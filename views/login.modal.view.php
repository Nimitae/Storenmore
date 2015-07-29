<!-- Modal content-->
<div class="modal-content" style="width: 500px; margin: auto">
    <div class="modal-header bluebg">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="text-align: center"><span class="glyphicon glyphicon-lock"></span> LOGIN
        </h4>
    </div>
    <div class="modal-body">
        <form method="post" action="/login.php" class="form-horizontal" style="text-align: center">
            <div class="form-group">
                <div style="width: 300px; margin: auto">
                    <input class="form-control" name="inputUsername" type="text" id="inputUsername"
                           placeholder="Username">
                </div>
            </div>
            <div class="form-group">
                <div style="width: 300px; margin: auto">
                    <input class="form-control" name="inputPassword" type="password" id="inputPassword"
                           placeholder="Password">
                </div>
            </div>
            <div class="form-group">
                <div>
                    <div class="checkbox" style="text-align: left; padding: 0 100px">
                        <label>
                            <input type="checkbox">Remember me</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div style="text-align: left; margin: 0 100px">
                    <button type="submit" class="btn btn-default">Log In</button>

                    <a class="btn btn-danger pull-right" href="signup.php">Sign up</a>
                </div>
            </div>
        </form>
    </div>
</div>