<!-- SEARCH BOX SLIDE OUT -->
<div id="sidr-search-nav">
	<img src="<?php bloginfo('template_directory'); ?>/campusnav/RHLogo-white.svg" alt="ROCKHARBOR Logo" class="rhlogo" />
	<div id="closesearch" class="icon-close"></div>
	<h2>Search</h2><br />
	<?php include (TEMPLATEPATH . '/searchform.php' ); //This includes the Search Form ?>
</div>

<!-- CAMPUS MENU SLIDE OUT -->
<?php if(have_rows('global_campus', 'option')): ?>
	<div id="sidr-campus-nav">
	
		<img src="<?php bloginfo('template_directory'); ?>/campusnav/RHLogo-white.svg" alt="ROCKHARBOR Logo" class="rhlogo" />
		<div id="closecampus" class="icon-close"></div>
	      
	    <h2>Select Campus</h2>
	    <ul>
	    	<?php while(has_sub_field('global_campus', 'option')): ?>
        		<li class=""><a href="<?php the_sub_field('url', 'option'); ?>"><?php the_sub_field('campus_name', 'option'); ?></a></li>
			<?php endwhile; ?>
	    </ul>
	    <?php if ( get_field('global_subsite', 'option') == true ) { ?>
	        <div class="sidebar-footer">
	            <a href="http://www.rockharbor.org">
	                <p>&larr; <em>Back To</em> </p>
	                <h3>ROCKHARBOR.ORG</h3>
	            </a>
	        </div>
	    <?php } ?>
	</div>
<?php endif; ?>