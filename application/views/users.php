    <form role="form" action="/search/by_person">
            <div class="form-group">
                <input class="form-control searchbar_hfarm" id="inputdefault" type="text" placeholder="search by company name" border="none" name="terms" />
            </div>
        </form>
    <div id="wrap"  class="white_background">
        <div id="main" class="container clear-top">
            <ul class="all-blogs">
                <?php
                foreach ($users as $user){ ?>
                 <li class="media">
                    <a class="pull-left" href="/users/<?php echo $user['user_id']; ?>">
                        <img src="http://placehold.it/200x100" alt="...">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><a href="/users/<?php echo $user['user_id']; ?>"><?php echo $user['first_name']." ".$user['last_name']; ?></a></h4>
                        <p class="description"> <?php echo $user['company']; ?> <br />
                        </p>
                        <p> <?php echo $user['description']; ?> </p>
                        <span class="team_members">06</span> <span class='location'>001</span>
                         <span class='contacts'><?php echo $user['contacts']; ?>  </span>  <br />
                         <span class='email'> <?php echo $user['email']; ?>  </span>
                         <a href="#" class="coffee_link"><img src="resources/img/icons/coffee.png" class="pull-right" width="10%"></a>
                    </div>
                    
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>