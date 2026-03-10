<?php
/**
 * Title: Course Curriculum
 * Slug: memberlite/course-curriculum
 * Description: An expandable course outline using details blocks to display modules and lesson descriptions.
 * Categories: memberlite-courses
 * Keywords: course, curriculum, lessons, modules, coaching, accordion
 * @package WordPress
 * @subpackage Memberlite
 * @since Memberlite 7.0
 */
?>
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20","padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:heading {"textAlign":"center"} -->
	<h2 class="wp-block-heading has-text-align-center">Course Curriculum</h2>
	<!-- /wp:heading -->
	<!-- wp:paragraph {"align":"center","fontSize":"18"} -->
	<p class="has-text-align-center has-18-font-size">4 modules, 16 lessons, and hands-on projects to build your skills from the ground up.</p>
	<!-- /wp:paragraph -->
	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group">
		<!-- wp:details {"style":{"border":{"width":"1px","radius":"8px"},"spacing":{"padding":{"top":"var:preset|spacing|20","right":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20"},"blockGap":"var:preset|spacing|10"}},"borderColor":"borders"} -->
		<details class="wp-block-details has-border-color has-borders-border-color" style="border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)">
			<summary><strong>Module 1: Getting Started</strong> — 4 Lessons</summary>
			<!-- wp:list -->
			<ul class="wp-block-list">
				<!-- wp:list-item -->
				<li>Welcome and Course Overview</li>
				<!-- /wp:list-item -->
				<!-- wp:list-item -->
				<li>Setting Up Your Environment</li>
				<!-- /wp:list-item -->
				<!-- wp:list-item -->
				<li>Core Concepts and Terminology</li>
				<!-- /wp:list-item -->
				<!-- wp:list-item -->
				<li>Your First Project</li>
				<!-- /wp:list-item -->
			</ul>
			<!-- /wp:list -->
		</details>
		<!-- /wp:details -->
		<!-- wp:details {"style":{"border":{"width":"1px","radius":"8px"},"spacing":{"padding":{"top":"var:preset|spacing|20","right":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20"},"blockGap":"var:preset|spacing|10"}},"borderColor":"borders"} -->
		<details class="wp-block-details has-border-color has-borders-border-color" style="border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)">
			<summary><strong>Module 2: Building Your Foundation</strong> — 4 Lessons</summary>
			<!-- wp:list -->
			<ul class="wp-block-list">
				<!-- wp:list-item -->
				<li>Deep Dive Into Fundamentals</li>
				<!-- /wp:list-item -->
				<!-- wp:list-item -->
				<li>Working With Real Data</li>
				<!-- /wp:list-item -->
				<!-- wp:list-item -->
				<li>Common Patterns and Best Practices</li>
				<!-- /wp:list-item -->
				<!-- wp:list-item -->
				<li>Hands-On Workshop</li>
				<!-- /wp:list-item -->
			</ul>
			<!-- /wp:list -->
		</details>
		<!-- /wp:details -->
		<!-- wp:details {"style":{"border":{"width":"1px","radius":"8px"},"spacing":{"padding":{"top":"var:preset|spacing|20","right":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20"},"blockGap":"var:preset|spacing|10"}},"borderColor":"borders"} -->
		<details class="wp-block-details has-border-color has-borders-border-color" style="border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)">
			<summary><strong>Module 3: Advanced Techniques</strong> — 4 Lessons</summary>
			<!-- wp:list -->
			<ul class="wp-block-list">
				<!-- wp:list-item -->
				<li>Advanced Strategies and Workflows</li>
				<!-- /wp:list-item -->
				<!-- wp:list-item -->
				<li>Troubleshooting and Problem Solving</li>
				<!-- /wp:list-item -->
				<!-- wp:list-item -->
				<li>Optimization and Performance</li>
				<!-- /wp:list-item -->
				<!-- wp:list-item -->
				<li>Case Study Review</li>
				<!-- /wp:list-item -->
			</ul>
			<!-- /wp:list -->
		</details>
		<!-- /wp:details -->
		<!-- wp:details {"style":{"border":{"width":"1px","radius":"8px"},"spacing":{"padding":{"top":"var:preset|spacing|20","right":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20"},"blockGap":"var:preset|spacing|10"}},"borderColor":"borders"} -->
		<details class="wp-block-details has-border-color has-borders-border-color" style="border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)">
			<summary><strong>Module 4: Capstone Project</strong> — 4 Lessons</summary>
			<!-- wp:list -->
			<ul class="wp-block-list">
				<!-- wp:list-item -->
				<li>Project Planning and Scope</li>
				<!-- /wp:list-item -->
				<!-- wp:list-item -->
				<li>Building Your Capstone</li>
				<!-- /wp:list-item -->
				<!-- wp:list-item -->
				<li>Peer Review and Feedback</li>
				<!-- /wp:list-item -->
				<!-- wp:list-item -->
				<li>Final Presentation and Next Steps</li>
				<!-- /wp:list-item -->
			</ul>
			<!-- /wp:list -->
		</details>
		<!-- /wp:details -->
	</div>
	<!-- /wp:group -->
	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-buttons">
		<!-- wp:button {"backgroundColor":"color-primary"} -->
		<div class="wp-block-button"><a class="wp-block-button__link has-color-primary-background-color has-background wp-element-button" href="#">Enroll Now</a></div>
		<!-- /wp:button -->
		<!-- wp:button {"textColor":"color-primary","className":"is-style-outline","style":{"elements":{"link":{"color":{"text":"var:preset|color|color-primary"}}}}} -->
		<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-color-primary-color has-text-color has-link-color wp-element-button" href="#">Preview Free Lesson</a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->