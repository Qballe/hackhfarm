    <form role="form" action="/search/by_company">
            <div class="form-group">
                <input class="form-control searchbar_hfarm" id="inputdefault" type="text" placeholder="search by company name" border="none" name="terms" />
            </div>
        </form>
    <div id="wrap"  class="white_background">
        <div id="main" class="container clear-top">
            <ul class="all-blogs">
                <?php
                foreach ($companies as $company){ ?>
                 <li class="media">
                    <a class="pull-left" href="/companies/<?php echo $company->id; ?>">
                        <img src="http://placehold.it/200x100" alt="...">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><a href="/companies/<?php echo $company->id; ?>"><?php echo $company->name; ?></a></h4>
                        <p class="description"> <?php echo $company->description; ?> <br />
                            <span class='contacts'><?php echo $company->contacts;?>  </span>  <br />
                            <span class='email'> <?php echo $company->email;?>  </span>
                        </p>

                        <span class="team_members">06</span> <span class='location'>001</span>
                        <a href="users/<?php echo $company->id; ?>"></a>
                    </div>

                </li>
                <?php } ?>
            </ul>
        </div>
    </div>