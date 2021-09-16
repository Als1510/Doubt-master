<!-- Modal -->
<div class="modal fade" id="LoginModal" tabindex="-1" role="dialog" aria-labelledby="LoginModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="LoginModalLabel">Login to iDiscuss</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action=/Doubt/partials/_handelLogin.php method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="LoginEmail">Email</label>
                        <input type="email" class="form-control" id="LoginEmail"
                        name = "LoginEmail" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="LoginPassword">Password</label>
                        <input type="password" class="form-control" id="LoginPassword"
                        name="LoginPassword">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
