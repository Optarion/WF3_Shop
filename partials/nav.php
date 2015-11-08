<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Menu</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><?= $site_name ?></a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                   <?php foreach($pages as $page_label => $page_url){ 
                        $active = $page_url == $current_page ? ' active' : ''; 
                        if($page_label == 'contact' && !userIsLogged()){
                            continue;
                        }else{ ?>
                             <li class="<?= $active ?>">
                                <a href="<?= $page_url ?>"><?= ucfirst($page_label) ?></a>
                            </li>
                        <?php }
                    } ?>
                </ul>

                    <ul class="nav navbar-nav pull-right">
                    <?php if(!userIsLogged()){ ?>
                        <li><a href="form.php?action=connection">Connect</a></li>
                    <?php }else{ ?>
                        <li><a href="logout.php">Disconnect</a></li>
                    <?php } ?>
                    </ul>

                <form class="navbar-form navbar-right" role="search" action="search.php" method="GET">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit"><span class=" glyphicon glyphicon-search"></span></button>
                        </span>
                    </div>
                </form>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>