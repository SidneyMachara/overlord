


            <div class="title">
              <center>  <h3 > Never Remember Again</h3>
              <!-- for the form modal -->
              <button type="button"  class="btn btn-primary" data-toggle="modal" data-target="#registermodal">
                Register
              </button>
              </center>
            </div>



    <!-- form modal -->
          <div class="modal fade" id="registermodal" role="dialog">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header mymodal-header">
                  <h3>Register</h3>
                </div>
                <div class="modal-body">

                  <form class="link-form" action="index.php" method="POST">

                      <label>Email:<br>
                        <input type="email" name="email" value="" placeholder="Email"required class="add-link-form-content">
                      </label>


                      <label>Username:<br>
                        <input type="text" name="username" value="" placeholder="username" required class="add-link-form-content">
                      </label>


                      <label>Password:<br>
                      <input type="passwrod" name="password" value="" placeholder="password " required class="add-link-form-content"><br>
                      </label>

                      <label>Confirm Password:<br>
                      <input type="Password" name="ConfirmPassword" value="" placeholder="Confirm Password " required class="add-link-form-content"><br>
                      </label>

                      <input type="submit" class="btn btn-primary" name="submit" value="submit">

                  </form>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default btn-close" data-dismiss="modal">close</button>
                </div>

              </div>

            </div>

          </div>


    <!-- end of form modal -->
