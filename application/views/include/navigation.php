<div class="container">
  <nav class="navbar navbar-default" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo site_url(); ?>">CBHL</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
       <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="<?php echo site_url('schedules'); ?>" class="dropdown-toggle" data-toggle="dropdown">Schedules<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo site_url("schedules/season"); ?>">Season</a></li>
            <li><a href="<?php echo site_url("schedules/referees"); ?>">Referee</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav">
      <li class="dropdown">
          <a href="<?php echo site_url('standings'); ?>" class="dropdown-toggle" data-toggle="dropdown">Standings<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo site_url('standings/player'); ?>">Players</a></li>   
            <li><a href="<?php echo site_url('standings/teams'); ?>">Teams</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </nav>
</div>
