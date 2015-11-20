    <div id="wrap"  class="white_background">
        <div id="main" class="container clear-top">
            <p>I'm companies.php</p>
            
            <ul class="all-blogs">
                <?php 
                foreach ($companies as $company){ ?>
                 <li class="media">
                    <a class="pull-left" href="#">
                        <img src="http://placehold.it/200x100" alt="...">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">  <?php echo $company["name"]; ?> </h4>
                        <p class="description"> <?php echo $company['description']; ?> <br /> 
                            <span class='contacts'><?php echo $company['contacts'];?>  </span>  <br /> 
                            <span class='email'> <?php echo $company['email'];?>  </span>                          
                        </p>
                      
                        <span class="team_members">06</span> <span class='location'>001</span>
                    </div>
                </li>
                <?php } ?>
            </ul>
            
            
            
            
        </div>
    </div>