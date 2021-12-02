<div class="container">
	<h2> <?php echo $page_title; ?></h2>
	<?php $season_start_date = DateTime::createFromFormat('Y-m-d H:i:s', $season->season_start_date); ?>
	</br>
	<ol>	
		<h4><u>Players</u></h4>
		</br>
			<li>Players in this league must be at least eighteen (18) years of age.</li>
			</br>
			<li>Veteran players retain the right to play without playing in the rookie game.</li> 
			</br>
			<li>All veterans having quit after being drafted for at least two (2) seasons in a row lose the privilege to automatically be drafted.  They do not have to play in the rookie game, but captains are not forced to draft them.</li>
			</br>
			<li>All veteran players will be assigned a ranking ('A', 'B' or 'C') by the majority of the captains at the beginning of the season.  A player will retain his ranking throughout the season.</li>
			</br>
			<li>All rookie players will be assigned a ranking based on draft order.</li>
				<ul>
					<li>A rookie drafted between two (2) 'A' players will be assigned an 'A'.</li>
					<li>A rookie drafted between two (2) 'B' players will be assigned an 'B'.</li>
					<li>A rookie drafted between two (2) 'C' players will be assigned an 'C'.</li>
					<li>A rookie drafted between two (2) levels will be assigned a ranking by the majority of the captains after the draft.</li>
				</ul>
				</br>


		</br>
		<h4><u>Teams</u></h4>
		</br>
			<li>The league will be made up of at least five (5) teams.</li>
			</br>
			<li>Each team will have the same number of players at the beginning of the season.</li>
			</br>
			<li>Each team will consist of a designated goalie and a pre-determined number of “players”.</li>
			</br>


		</br>
		<h4><u>Trades</u></h4>
		</br>
			<li>Trades between teams are permitted provided that they are supported by the majority of the captains.</li>
			</br>
			<li>The Trade deadline is <?php echo date_format($season_start_date->add(new DateInterval("P90D")), 'l jS \of F Y'); ?> 09:00:00 PM.</li>
			</br>


		</br>
		<h4><u>Spares</u></h4>
		</br>
			<li>Captains are responsible for finding their own spares.</li>
			</br>
			<li>A Captain must advise the opposing captain and notify the president no later than 09:00:00 PM on the Friday evening when calling a spare.</li>
			</br>
			<li>Any new spares must be added to the spares list (name and number) to be available to all captains.</li>
			</br>
			<li>All new subs will be considered “B” players until evaluated by the majority of the captains.</li>
			</br>
			<li>A team may call a spare if they are missing two (2) non-'A' players OR one (1) 'A' player.</li>
				<ol>
					<li>'A' players can replaced by any players spare.</li>
					<li>'B' or 'C' players can be replaced by 'B' or 'C' spares non-respectively.</li>
					<li>If a goalie is missing he can only be replaced by a designated goalie spare.</li>
				</ol>
				</br>
			<li>Spares can be obtained on a first-come-first-serve basis no more than a week in advance and only once both current games have ended. If two (2) captains ask for a spare player in person after both games have ended, a coin is flip in order to determine which team obtains the spare player.</li>
			</br>
			<li>Designated goalies can be replaced by spare goalies only if they are absent from the game.</li>
			</br>
			<li>Certain spares are designated goalies.  These cannot be used as a forward/defenseman unless no other team requires a goalie.</li>
			</br>



		</br>
		<h4><u>Replacements</u></h4>
		</br>
			<li>In case a full time player cannot continue with the season due to injury or personal reasons, a replacement can be picked up providing that the majority of the captains vote that it is a fair replacement.</li>
			</br>
			<li>A player must miss 2 consecutive games before he can be replaced.  The NEW player will be on the official roster as of the 3rd missed game.</li>
			</br>
			<li>If the replaced player had already paid their season's fee, the replacement player need only pay half the season's fee in order to play.  If the replaced player had not yet paid their season's fee, the replacement player must pay a full season's fee. The number of games left in the season's is irrelevant.</li>
			</br>
			<li>New players cannot be added to any team after the said team has played its 16th regular season game.</li>
			</br>
			<li>To be eligible for post-Season play, a player must have played 5 regular season games on any team (as a spare or full-time player) and be on a team's roster.</li>
			</br>
			<li>Should a Captain be missing, the captain's assistant will be his replacement. If the Assistant is not present as well, the highest drafted player becomes the Captain for the game.</li>
			</br>


		</br>
		<h4><u>Fees & Fines</u></h4>
		</br>
			<li>The amount to be paid to play in the league is 130$.</li>
			</br>
			<li>All fees must be paid before the start of the first game of the second split, the number of games played by the player are irrelevant.  No exceptions will be made.</li>
			</br>
			<li>A player will be fined of 5$ for every penalty after the fourth one in the same season (5th penalty = 5$, 6th penalty = 5$).</li>
			</br>
			<li>A player not returning his jersey at the end of the season will be fined a 45$ (for a total of 45$) – (Blank Jersey’s $20; Printer CBHL crest $15 & Jersey lettering $3).</li>
			</br>
			<li>A player owing any money for late league fees, penalty fines, jersey fines will not be allowed to play, no exceptions – this includes any money owing from previous seasons.</li>
			</br>

		</br>
		<h4><u>Playing Surface</u></h4>
		</br>
			<li>The  team  having  refereed  the  week  before  chooses  which  surface  to  play  on.    The  designated  home  teams (based  on schedule) select which end to start at.</li>
			</br>
			<li>The size of the hockey court 20 steps wide by thirty two (32) steps in between nets when game is played four (4) on four (4), by forty (40) steps in between nets when game is played five (5) on five (5).</li>
			</br>
			<li>The goal crease consists of an imaginary box extending one (1) foot from each post out and six (6) feet in front of the net.</li>
			</br>


		</br>
		<h4><u>Equipment</u></h4>
		</br>
			<li>All players must wear the jersey provided by the league.</li>
			</br>
			<li>Nothing must be worn on top of the Jersey.</li>
			</br>
			<li>Studded shoes/boots are dangerous and illegal.  If a player is caught with studded shoes/boots his team is immediately disqualified and forfeit 1 – 0.</li>
			</br>
			<li>Goalies may only wear ice hockey player shin pads with tape; nothing wider will be permitted.</li>
			</br>
			<li>Goalies may only use baseball gloves as a mitt. Ice hockey and street hockey mitts are not permitted.</li>
			</br>


		</br>
		<h4><u>Referees</u></h4>
		</br>
			<li>The team on bye for a given week is responsible for supplying 4 referees (2 for each game).</li>
			</br>
			<li>The team responsible for refereeing on a given week must have both courts ready in accordance to Rule #31 by 10:00 or looses 1 point in the year's team standings.</li>
			</br>
			<li>If referees are missing at 10:00, the refereeing team will face the sum of the following consequences:</li>
				<ul>
					<li>1st Referee missing – 5 minute penalty at the beginning of the 1st period of their designated next game.</li>
					<li>2nd Referee missing – 5 minute penalty at the beginning of the 2nd period of their designated next game.</li>
					<li>3rd Referee missing – 5 minute penalty at the beginning of the 3rd period of their designated next game.</li>
					<li>4th Referee missing – loss of a point in the standings.</li>
				</ul>
				</br>
			<li>For a referee to be counted as present, he must be wearing a jersey (or of a different color from the two (2) playing teams) and carrying a whistle.</li>
			</br>
			<li>The stop watch must be present at each game or both referees are considered missing.</li>
			</br>
			<li>Play stops when the whistle is blown.  All calls are at the referees' discretion and are final. Do not argue with the referees.</li>
			</br>
			<li>Any physical aggression towards the referee will result in automatic dismissal from the league, regardless of post-season play.  The reverse holds true for the referee.</li>
			</br>



		</br>
		<h4><u>Game Time</u></h4>
		</br>
			<li>Games will run on a fixed schedule.</li>
				<ul>
					<li>10:00 – 10:30 – 1st Period</li>
					<li>10:30 – 10:40 – 1st Intermission</li>
					<li>10:40 – 11:10 – 2nd Period</li>
					<li>11:10 – 11:20 – 2nd Intermission</li>
					<li>11:20 – 11:50 – 3rd Period</li>
					<li>11:50 – 12:00 – 3rd Intermission</li>
					<li>12:00 – 12:20 – Overtime</li>
					<li>Shoot-out</li>
					</ul>
					</br>
			<li>Each game will consist of three 30-minute periods (running time).  The third period will be divided into two 15-minute halves and the teams will be required to switch sides at the end of the first 15 minutes with no intermission.</li>
			</br>
			<li>If a team is not ready to start the game at 10:00, they may delay, but with the following consequences:</li>
				<ul>
					<li>10:00 – 1 x 5 Minute Penalty.</li>
					<li>10:10 – 2 x 5 Minute Penalties (2 men short).</li>
					<li>10:20 – 1-0 Forfeit.</li>
				</ul>
				</br>
			<li>Playoffs games are sequential instead of parallel with 10:00:00 AM and 12:00:00 AM starting times.  During the playoff, the team that finishes first in the season's standings decides their preferred time slot.</li>
			</br>

		</br>
		<h4><u>Tie Breakers</u></h4>
		</br>
			<li>A game cannot end in a tie.</li>
			</br>
			<li>If two teams are tied after regulation time, an overtime period will be played. Overtime periods are sudden-death and consist of two 10-minute halves played with one (1) less player on each side. The teams will be required to switch sides at the end of the first ten minutes.</li>
			</br>
			<li>If a game remains tied after overtime, a shoot-out will ensue.</li>
				<ol>
					<li>Teams must choose 5 players to do a shootout.</li>
					<li>If after all 10 players have shot, the game is still tied, players will shoot according to their draft position (starting with the Captain, 1st Round; 2nd round and so on...) go head to head on shootouts until one team wins.</li>
					<li>Only the winning goal counts on the official stats.</li>
				</ol>
				</br>


		</br>
		<h4><u>Game Sheets</u></h4>
		</br>
			<li>The acting captain of each teams must provide the referee with a list of his team's players for the game as well as approve of his opponent's list.</li>
			</br>
			<li>A player from each team that played in the game as well as at least one (1) referee must “witness” the game sheet at the end of the game on location.</li>
			</br>
			<li>If stats are not “witnessed”, they will not be considered valid.</li>
			</br>


		</br>
		<h4><u>Game Play</u></h4>
		</br>
			<li>A team needs a minimum of three (3) players if playing four (4) on four (4); or four (4) players if playing five (5) on five (5) to start a game.</li>
			</br>
			<li>If a team is missing players, they can wait for a player to show up, but face the consequences outlined in Rule #47.</li>
			</br>
			<li>Any player arriving after the mid-point of the second period will not be permitted to play.</li>
			</br>
			<li>When players “change on the fly”, the must touch sticks or hands.  Failure to do so will results in a “Too Many Men” penalty if and when the offending team gets control of the ball.  Until the offending team gets control of the ball, the two players may still rectify the situation by executing a proper change.</li>
			</br>
			<li>Once a ball leaves the court’s delimitation, the ball is given to the team opposing the team who last touched the ball before it went out.  Cones are considered out of the courts delimitation.</li>
			</br>
			<li>When a call is made to change the ball's possession, the ball will be played from outside the court (from the closest side) at same court height from where the ball was when the call was made.</li>
			</br>
			<li>A ball must be brought in by a player from outside the court’s delimitation within 5 seconds of any players of the concerned team making it to the ball where it needs to be brought in. Failure to so will in a change of ball possession at the same area.</li>
			</br>
			<li>When the ball is to be played from the sidelines, the opposing player must allow a stick’s length from the sideline where the ball is being played from.</li>
			</br>
			<li>You cannot close your hand on the ball and give it motion or change its direction of play. This will result in a change of ball possession.</li>
			</br>
			<li>A player receiving a ball from a hand of a teammate  is a “Hand Pass” and will result in a change of ball possession.</li>
			</br>
			<li>A player tapping the ball with a hand more than three (3) times before it touches his stick will result in a “Double Dribble” and will result in a change of ball possession.</li>
			</br>
			<li>The goalie cannot freezes the ball outside his crease. This will result in a change of ball possession.</li>
			</br>
			<li>If the goalie freezes the ball, the play is dead until it is released again.  This means that even if the goalie puts his glove in the net after the whistle has been blown, no goal will be awarded.</li>
			</br>
			<li>If the designated goalie agrees, he may be replaced in nets by any one of his teammates at any time.  Once the goalie has been replaced he may not return back in nets until the next game.</li>
			</br>
			<li>A  ball  is considered  “In  play”  once  it  enters  the  court’s delimitation  from  any  height  (not  when  it  touches  the  ground). Therefore a ball may come in play and go out of play without touching the ground.</li>
			</br>
			<li>A ball failing to enter the court by hitting an obstacle will result in a change of ball possession.</li>
			</br>


		</br>
		<h4><u>Time-Outs</u></h4>
		</br>
			<li>Each team has three (3) time-outs to be used in regulation time.</li>
			</br>
			<li>Only one time-out will be permitted per period.</li>
			</br>
			<li>Should overtime be necessary during regular season, one (1) extra time out will be permitted.</li>
			</br>
			<li>During playoffs, teams will be allowed one (1) extra time out per 30-minute period.</li>
			</br>
			<li>A time out can only be called by the team captain if:</li>
				<ul>
				<li>His team has possession of the ball.  For a team to have possession, they must be controlling of the ball, not simply touching the ball. When the play resumes, the team calling the time-out continues the game with the ball behind their net.</li>
				<li>There is a face-off.  Play will resume with a face-off.</li>
				</ul>
				</br>


		</br>
		<h4><u>Penalties & Suspensions</u></h4>
		</br>
			<li>Alcohol is not permitted on/around the playing surface.</li>
			</br>
			<li>NO loitering.</li>
			</br>
			<li>Teams will be penalized for leaving garbage after the game (broken sticks, bottles, tape, etc).</li>
			</br>


		</br>
		<h4><u>Penalties & Suspensions</u></h4>
		</br>
			<li>All penalties are for duration of five (5) minutes.  The penalized player will be permitted to return to the game upon the expiration of his penalty or if the opposing teams scores before his penalty expires.</li>
			</br>
			<li>A player drawing blood from another player will result in a game suspension as well as the a five (5) minute penalty for the offending team.</li>
				<ol>
						<li>Blood as a result of the asphalt does not qualify as drawing blood.</li>
						<li>Blood as a result of a shot windup or follow through bellow the crossbar does not qualify as drawing blood.</li>
				</ol>
			</br>
			<li>Sliding is permitted but should the sliding player make contact with an opposing player before the ball, a penalty is given for "Intent to injure".   Referee may eject the player if he feels that the slide was too “aggressive”.</li>
			</br>
			<li>Three (3) penalties in the same game will result in automatic ejection from the game for the penalized player.</li>
			</br>
			<li>Fighting will result to an automatic game ejection for all players involved.</li>
			</br>
			<li>Fighting during the last fifteen (15) minutes of the game will result in a one game suspension, regardless of if it is post-season.</li>
			</br>
			<li>This is a non-contact game and no hitting or checking will be tolerated.  Obvious intent to injure will result in immediate ejection of the game and further review by the league for suspension / dismissal.</li>
			</br>
			<li>Defending players are allowed to move you from the front of their net providing they use their bodies.  Cross-checking and pushing with hands and feet will not be tolerated and offensive players may not retaliate.</li>
			</br>
			<li>There will be an automatic one (1) game suspension for causing injuries.</li>
			</br>
			<li>Any ejection from a game will result in three (3) penalties appearing on the player’s personal stats.</li>
			</br>
			<li>Suspension time doubles for each subsequent infraction.</li>
				<ul>
						<li>1st suspension – 1 game (unless otherwise determine by the league)</li>
						<li>2nd suspension – 2 games</li>
						<li>3rd suspension – 4 games</li>
				</ul>
			</br>	
			<li>Repeat offenders of dangerous plays and fighting will be reviewed for possible league expulsion.</li>
			</br>
			<li>If a player voluntarily causes damage to private or public property they will be dismissed from league play for the entirety of the season.</li>
			</br>
			<li>All gross indecencies are subject to league review for possible suspension.</li>
			</br>
			<li>Suspensions will be handed out for non-game related incidents that shed negative light on the league:</li>
				<ul>
					<li>Shooting at passing cars.</li>
					<li>Harassing the public.</li>
					<li>Breaking bottles.</li>
					<li>“Burning rubber".</li>
					<li>etc</li>
				</ul>
				</br>
			<li>High sticking is defined as lifting your stick above the crossbar it includes but is not restricted to:</li>
				<ul>
					<li>Passing your stick over someone’s head to get around them.</li>
					<li>Jumping for a ball with the blade of the stick above the crossbar.</li>
					<li>Bending over to get a ball with the blade of your stick above the crossbar.</li>
					<li>Calling for a pass.</li>
				</ul>
				</br>
				<ol>
					<li>A player is “alone” if not within a stick’s length of any other player.</li>
					<li>A player high sticking will result in a penalty.</li>
					<li>A player high sticking alone will result in change of the ball’s possession.</li>
					<li>A player playing the ball while having a high stick is an automatic penalty.</li>
					<li>A player should not be penalized if his stick goes over the crossbar when taking a shot.</li>
					<li>Clipping someone in the face is an automatic high-sticking penalty regardless of circumstance.</li>
					<li>You are responsible for your stick at all times.  Someone else lifting your stick is not an excuse and you will be penalized.</li>
				</ol>
				</br>

			<li>Lifting someone's stick in order to draw a penalty is considered unsportsmanlike conduct.  Both the player whose stick was lifted and the player lifting the stick will be penalized. (If the ball is in play, this is NOT a penalty).</li>
			</br>
			<li>Penalty shots will be awarded in the following cases:</li>
				<ul>
					<li>An attacking player is taken down on a clear break.</li>
					<li>A defending player throws his stick at the player / ball.</li>
					<li>A defending player covers the ball in his goalie’s crease.</li>
					<li>A defending player throws the ball while in his goalie’s crease.</li>
				</ul>
				</br>
			<li>Interference with the goalies will not be tolerated and will results in a penalty.</li>
			</br>
			<li>If an opposing player interferes with a goalie when a goal is scored, the goal will not count and the player will be penalized.</li>
				<ul>
					<li>If a player is in the crease but not interfering with the goalie, the goal will count.</li>
				</ul>
				</br>


		</br>
		<h4><u>Unsportsmanlike Conduct</u></h4>
		</br>
			<li>Unsportsmanlike conduct includes any behavior which goes against the definition of fair play and competition.  This includes:</li>
				<ul>
					<li>Swearing at the referee.</li>
					<li>Slamming your stick in disgust.</li>
					<li>Slapping the ball away from the play in disgust.</li>
				</ul>
				</br>
			<li>Unsportsmanlike conduct will result in a ten (10) minute penalty. There will be NO power play awarded to the opposing team.</li>
			</br>
			<li>The ten (10) minute penalty will count as one penalty during the game, but will count as 2 in the official stats for fine collection purposes.</li>
				<ul>
					<li>I.e. you get a five (5) minute penalty and you argue with the referee.  He decides to assess an unsportsmanlike conduct penalty.  You are not kicked out of the game because you only have two (2) penalties in the game, but you will have three (3) penalties in your overall stats.</li>
				</ul>
				</br>


		</br>
		<h4><u>Standings</u></h4>		
		</br>
			<li>The top four (4) teams in the standings make the play-offs.</li>
			</br>
			<li>Position in the standings is determined with following priorities.</li>
				<ul>
					<li>The highest number of points earned by the team (not goals – standings points).</li>
					<li>The greatest number of games won by the team.</li>
					<li>The greatest number of games won by the team in regulation time.</li>
					<li>The higher number of points earned in games against each other. NOTE: For the purpose of determining standing under previous priority for two or more teams that have not played an even number of games with one or more of the other tied teams, the first home team that has an extra game (the “odd game”) shall not be included.  When more than two teams are tied, the percentage of available points earned in games amongst each other (and not including any “odd games”) shall be used to determine standings.</li>
					<li>The greater positive difference between goals scored for and against by teams having equal standing.</li>
				</ul>
				</br>
			<li>For any rule not specifically mentioned in this list, we will follow the NHL rules (with the exception of off-side, icing and contact).</li>
			</br>

	</ol>
</div>