			</div>
			<div class="clear"></div>
			<!-- If you like showing off the fact that your server rocks -->
			<!-- <p id="bbShowOff">
<?php
global $bbdb;
printf(
__( 'This page generated in %s seconds, using %d queries.' ),
bb_number_format_i18n( bb_timer_stop(), 2 ),
bb_number_format_i18n( $bbdb->num_queries )
);
?>
			</p> -->
			<div class="clear"></div>
		</div>
	</div>
	<div id="bbFoot">
		<p id="bbThanks">
<?php
printf(
 'Powered by <a href="http://www.MavajSunCo.com" >MAVAJ SUN CO.</a>'
);
?>
		</p>
		<p id="bbVersion"><?php printf( __( 'Version %s' ), bb_get_option( 'version' ) ); ?></p>
	</div>

	<?php do_action( 'bb_admin_footer' ); ?>
</body>
</html>
