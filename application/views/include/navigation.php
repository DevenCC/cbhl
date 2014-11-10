<div class="container">
  <nav class="navbar navbar-inverse" role="navigation">
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
        <li><a href="<?php echo site_url("information"); ?>"><span class="glyphicon glyphicon-info-sign"></span> League Info</a></li>
      </ul>
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="<?php echo site_url('schedules'); ?>" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-calendar"></span> Schedules<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo site_url("schedules/season"); ?>">Season</a></li>
            <li><a href="<?php echo site_url("schedules/referee"); ?>">Referee</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav">
      <li class="dropdown">
          <a href="<?php echo site_url('standings'); ?>" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-stats"></span> Standings<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo site_url('standings/players'); ?>">Players</a></li>   
            <li><a href="<?php echo site_url('standings/teams'); ?>">Teams</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </nav>
</div>