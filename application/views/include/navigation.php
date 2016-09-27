<div class="container">
  <nav class="navbar navbar-inverse navbar-fixed-top container-fluid" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo site_url(); ?>">
        <img src=<?php print($navbar_logo); ?> width='30' alt="League Logo" id='simple_white_logo' />
      </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <!--   <ul class="nav navbar-nav">
        <li><a href="<?php echo site_url('information'); ?>"><span class="glyphicon glyphicon-info-sign"></span> League Info</a></li>
      </ul> -->
      <ul class="nav navbar-nav">
        <li><a href="<?php echo site_url('feed'); ?>"><span class="glyphicon glyphicon-th-list"></span> Games</a></li>
      </ul>
      <ul class="nav navbar-nav">
      <li class="dropdown">
          <a href="<?php echo site_url('standings'); ?>" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-book"></span> Teams<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo site_url('team_standings/team/0/Blue'); ?>">Blue</a></li>   
            <li><a href="<?php echo site_url('team_standings/team/0/Black'); ?>">Black</a></li>   
            <li><a href="<?php echo site_url('team_standings/team/0/Green'); ?>">Green</a></li>   
            <li><a href="<?php echo site_url('team_standings/team/0/Grey'); ?>">Grey</a></li>
            <li><a href="<?php echo site_url('team_standings/team/0/Red'); ?>">Red</a></li>   
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav">
      <li class="dropdown">
          <a href="<?php echo site_url('standings'); ?>" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-stats"></span> Season<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo site_url('player_standings/players'); ?>">Players Standings</a></li>   
            <li><a href="<?php echo site_url('team_standings/teams'); ?>">Teams Standings</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav">
      <li class="dropdown">
          <a href="<?php echo site_url('playoff'); ?>" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-tower"></span> Playoff<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo site_url('player_standings/players/0/true'); ?>">Players Standings</a></li>   
            <li><a href="<?php echo site_url('team_standings/teams/0/true'); ?>">Teams Standings</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="<?php echo site_url('schedules'); ?>" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-calendar"></span> Schedules<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo site_url("schedules/season"); ?>">Player</a></li>
            <li><a href="<?php echo site_url("schedules/referee"); ?>">Referee</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo site_url('rules'); ?>"><span class="glyphicon glyphicon-list-alt"></span> Rules</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div>
  </nav>
</div>
</br></br>