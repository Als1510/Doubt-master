<!-- Modal -->
<div class="modal fade" id="SignupModal" tabindex="-1" role="dialog" aria-labelledby="SignupModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="SignupModalLabel">Signup for an iDiscuss Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/Doubt/partials/_handelSignup.php" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="SignupName">Username</label>
                            <input type="text" class="form-control" id="SignupName" name="SignupName"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="SignupEmail">Email</label>
                            <input type="email" class="form-control" id="SignupEmail" name="SignupEmail"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="SignupPassword">Password</label>
                            <input type="password" class="form-control" id="SignupPassword" name="SignupPassword">
                        </div>
                        <div class="form-group">
                            <label for="SignupCPassword">Confirm Password</label>
                            <input type="password" class="form-control" id="SignupCPassword" name="SignupCPassword">
                        </div>
                        <button type="submit" class="btn btn-primary">Sign up</button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
