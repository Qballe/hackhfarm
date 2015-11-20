    <form role="form">
            <div class="form-group">
                <input class="form-control searchbar_hfarm" id="inputdefault" type="text" placeholder="search by company name" border="none">
            </div>
        </form>
    <div id="wrap"  class="white_background">
        <div id="main" class="container clear-top">            
            <ul class="all-blogs">
                <?php 
                foreach ($users as $user){ ?>
                 <li class="media">
                    <a class="pull-left" href="#">
                        <img src="http://placehold.it/200x100" alt="...">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">  <?php echo $user["first_name"] . " " . $user["first_name"]; ?> </h4>
                        <p class="description"> <?php echo $user['company']; ?> <br />      
                        </p>
                        <p> <?php echo $company['description']; ?> </p>
                        <span class="team_members">06</span> <span class='location'>001</span>
                         <span class='contacts'><?php echo $company['contacts']; ?>  </span>  <br /> 
                         <span class='email'> <?php echo $company['email']; ?>  </span>                    
                    </div>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>