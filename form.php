	 
<?php if (!empty($_POST)): ?>
    Welcome, <?php echo htmlspecialchars($_POST["name"]); ?>!<br>
    Your email is <?php echo htmlspecialchars($_POST["email"]); ?>.<br>
<?php else: ?>
    <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post">
        Name: <input type="text" name="name"><br>
        Email: <input type="text" name="email"><br>
        <input type="submit">
    </form>
<?php endif; ?>
   <div class="row">
        <div class="col-md-12 order-md-1">
          <!-- <h4 class="mb-3">Billing address</h4> -->
<form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post" class="needs-validation" novalidate>
            <div class="row">
              <div class="col-md-4 mb-3">
                <label for="firstName">First name</label>
                <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="lastName">Last name</label>
                <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="lastName">Docket Number</label>
                <input type="text" class="form-control" id="docket" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Valid Docket Number is required.
                </div>
              </div>
            </div>
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">SEARCH</button>
          </form>
        </div>
      </div>
