
<div class="container">
    <header>
      <div class="row">
        <div class="span5 offset3">
          <?php echo img('assets/images/logo.png'); ?>
        </div>
      </div>
    </header>
</div> <!-- /container -->

<div class="container">
    <div class="row">
      <div class="span5 offset3">
        <div class="well">
          <?php echo validation_errors(); ?>
          <form action="/auth/login" method="post">
            <fieldset>
            <legend>Login</legend>
            <label>La tua mail:</label>
            <input type="email" placeholder="email" name="identity" class="span3" value="<?php set_value('identity'); ?>">

            <label>Password:</label>
            <input type="password" placeholder="password" name="password" class="span3" value="<?php set_value('password'); ?>">
            <!--  <label class="checkbox">
            <input type="checkbox"> iscriviti alla newsletter
            </label> -->
            <!-- <span class="help-block"></span> -->
            <br>
            <button type="submit" class="btn">Accedi</button>
            </fieldset>
          </form>
        </div>
        
      </div>
    </div>
</div> <!-- /container -->

<footer>
  <div class="container">
  </div>
</footer>