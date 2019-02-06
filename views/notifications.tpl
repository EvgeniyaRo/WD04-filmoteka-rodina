<?php if ( @$result_info != '' ) {
?>
		<div class="notify notify--update mb-20"><?=$result_info?></div>
<?php
	} elseif ( @$result_error != '' ) {
?>
		<div class="notify notify--error mb-20"><?=$result_error?></div>
<?php
	}
?>
<?php if ( @$result_sucsess != '' ) {
?>
		<div class="notify notify--success mb-20"><?=$result_sucsess?></div>
<?php
	} elseif ( @$result_error != '' ) {
?>
		<div class="notify notify--error mb-20"><?=$result_error?></div>
<?php
	}
?>	