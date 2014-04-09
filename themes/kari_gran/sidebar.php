<?php
/**
 * The Sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>
<section id="sidebar" class="right">
	<div class="side-social">
					<h3>Follow Kari Gran</h3>
					<ul>
						<li class="fb"><a href="http://www.facebook.com"><div data-icon="f" class="icon"></div></a></li>
						<li class="pin"><a href="http://www.pinterest.com"><div data-icon="p" class="icon"></div></a></li>
						<li class="tw"><a href="http://www.twitter.com"><div data-icon="t" class="icon"></div></a></li>
						<li class="yt"><a href="http://www.youtube.com"><div data-icon="y" class="icon"></div></a></li>
					</ul>
				</div>
				<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
				    <div><label class="screen-reader-text" for="s">Search for:</label>
				        <input type="text" value="" name="s" id="s" placeholder="Search blog" />
				        <label><div data-icon="s" class="icon"></div><input type="submit" id="searchsubmit" value="" /></label>
				    </div>
				</form>
				<div class="side-cats">
					<h3>Categories</h3>
					<ul>
						<?php
						$categories = get_categories();
						foreach ($categories as $cat) { ?>
							<li class="cat cat-<?php echo $cat->cat_ID; ?>"><a href="<?php echo get_category_link( $cat->term_id ); ?>"><span>></span> <?php echo $cat->name; ?></a></li>
						<?php } ?>
					</ul>
				</div>
				<div class="side-trends">
					<ul>
						<li id="trending" class="active"><a class="tab">Trending <span class="arrow"></span></a>
							<ul>
								<?php
									$trending_posts = wp_get_recent_posts('orderby=comment_count&numberposts=3');
									foreach( $trending_posts as $trend ) { ?>
									<li><?php echo get_the_post_thumbnail($trend["ID"], 'thumbnail'); ?> <a href="<?php echo get_permalink($trend["ID"]); ?>"> <?php echo $trend["post_title"]; ?></a> <span class="date"><?php echo get_the_time('m/d/Y', $trend["ID"]); ?></span></li>
									<?php } ?>
							</ul>
						</li>
						<li id="recent"><a class="tab">Recent <span class="arrow"></span></a>
							<ul>
								<?php
									$recent_posts = wp_get_recent_posts('orderby=post_date&numberposts=3');
									foreach( $recent_posts as $recent ) { ?>
									<li><?php echo get_the_post_thumbnail($recent["ID"], 'thumbnail'); ?> <a href="<?php echo get_permalink($recent["ID"]); ?>"> <?php echo $recent["post_title"]; ?></a> <span class="date"><?php echo get_the_time('m/d/Y', $recent["ID"]); ?></span></li>
									<?php } ?>
							</ul>
						</li>
				</div>
				<div class="side-newsletter">
				</div>
				<div class="side-contributors">
					<h3>Authors <span class="arrow"></span></h3>
					<ul>
						<?php contributors(); ?>
					</ul>
				</div>
				<div class="side-contact">
					<h3>Contact</h3>
					<p>We would love to hear from you, please feel free to email or call us at any time.</p>
					<span class="phone"><div data-icon="a" class="icon"></div>206.257.1226</span>
					<span class="email"><div data-icon="b" class="icon"></div><a href="emailto:info@karigran.com">info@karigran.com</a></span>
					<p><strong>Wheels Up LLC/Kari Gran</strong> <br />1735 Westlake Ave North #500 <br />Seattle, Washington 98109 <br />Monday - Friday <br />9:00AM - 5:00 PM PST</p>
				</div>
</section><!-- #secondary -->
