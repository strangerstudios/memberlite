<?php
/**
 * Memberlite Pattern: Course Curriculum
 *
 * @since TBD
 */

return [
	'title'       => __( 'Course Curriculum', 'memberlite' ),
	'description' => __( 'An expandable course outline using details blocks to display modules and lesson descriptions.', 'memberlite' ),
	'categories'  => [ __( 'memberlite-courses', 'memberlite' ) ],
	'keywords'    => [
		__( 'course', 'memberlite' ),
		__( 'curriculum', 'memberlite' ),
		__( 'lessons', 'memberlite' ),
		__( 'modules', 'memberlite' ),
		__( 'coaching', 'memberlite' ),
		__( 'accordion', 'memberlite' ),
	],
	'content'     => '<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20","padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)">
	<!-- wp:heading {"textAlign":"center"} -->
	<h2 class="wp-block-heading has-text-align-center">' . __( 'Course Curriculum', 'memberlite' ) . '</h2>
	<!-- /wp:heading -->
	<!-- wp:paragraph {"align":"center","fontSize":"18"} -->
	<p class="has-text-align-center has-18-font-size">' . __( '4 modules, 16 lessons, and hands-on projects to build your skills from the ground up.', 'memberlite' ) . '</p>
	<!-- /wp:paragraph -->
	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group">
		<!-- wp:details {"style":{"border":{"width":"1px","radius":"8px"},"spacing":{"padding":{"top":"var:preset|spacing|20","right":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20"},"blockGap":"var:preset|spacing|10"}},"borderColor":"borders"} -->
		<details class="wp-block-details has-border-color has-borders-border-color" style="border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)">
			<summary><strong>' . __( 'Module 1: Getting Started', 'memberlite' ) . '</strong> — ' . __( '4 Lessons', 'memberlite' ) . '</summary>
			<!-- wp:list -->
			<ul class="wp-block-list">
				<!-- wp:list-item -->
				<li>' . __( 'Welcome and Course Overview', 'memberlite' ) . '</li>
				<!-- /wp:list-item -->
				<!-- wp:list-item -->
				<li>' . __( 'Setting Up Your Environment', 'memberlite' ) . '</li>
				<!-- /wp:list-item -->
				<!-- wp:list-item -->
				<li>' . __( 'Core Concepts and Terminology', 'memberlite' ) . '</li>
				<!-- /wp:list-item -->
				<!-- wp:list-item -->
				<li>' . __( 'Your First Project', 'memberlite' ) . '</li>
				<!-- /wp:list-item -->
			</ul>
			<!-- /wp:list -->
		</details>
		<!-- /wp:details -->
		<!-- wp:details {"style":{"border":{"width":"1px","radius":"8px"},"spacing":{"padding":{"top":"var:preset|spacing|20","right":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20"},"blockGap":"var:preset|spacing|10"}},"borderColor":"borders"} -->
		<details class="wp-block-details has-border-color has-borders-border-color" style="border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)">
			<summary><strong>' . __( 'Module 2: Building Your Foundation', 'memberlite' ) . '</strong> — ' . __( '4 Lessons', 'memberlite' ) . '</summary>
			<!-- wp:list -->
			<ul class="wp-block-list">
				<!-- wp:list-item -->
				<li>' . __( 'Deep Dive Into Fundamentals', 'memberlite' ) . '</li>
				<!-- /wp:list-item -->
				<!-- wp:list-item -->
				<li>' . __( 'Working With Real Data', 'memberlite' ) . '</li>
				<!-- /wp:list-item -->
				<!-- wp:list-item -->
				<li>' . __( 'Common Patterns and Best Practices', 'memberlite' ) . '</li>
				<!-- /wp:list-item -->
				<!-- wp:list-item -->
				<li>' . __( 'Hands-On Workshop', 'memberlite' ) . '</li>
				<!-- /wp:list-item -->
			</ul>
			<!-- /wp:list -->
		</details>
		<!-- /wp:details -->
		<!-- wp:details {"style":{"border":{"width":"1px","radius":"8px"},"spacing":{"padding":{"top":"var:preset|spacing|20","right":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20"},"blockGap":"var:preset|spacing|10"}},"borderColor":"borders"} -->
		<details class="wp-block-details has-border-color has-borders-border-color" style="border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)">
			<summary><strong>' . __( 'Module 3: Advanced Techniques', 'memberlite' ) . '</strong> — ' . __( '4 Lessons', 'memberlite' ) . '</summary>
			<!-- wp:list -->
			<ul class="wp-block-list">
				<!-- wp:list-item -->
				<li>' . __( 'Advanced Strategies and Workflows', 'memberlite' ) . '</li>
				<!-- /wp:list-item -->
				<!-- wp:list-item -->
				<li>' . __( 'Troubleshooting and Problem Solving', 'memberlite' ) . '</li>
				<!-- /wp:list-item -->
				<!-- wp:list-item -->
				<li>' . __( 'Optimization and Performance', 'memberlite' ) . '</li>
				<!-- /wp:list-item -->
				<!-- wp:list-item -->
				<li>' . __( 'Case Study Review', 'memberlite' ) . '</li>
				<!-- /wp:list-item -->
			</ul>
			<!-- /wp:list -->
		</details>
		<!-- /wp:details -->
		<!-- wp:details {"style":{"border":{"width":"1px","radius":"8px"},"spacing":{"padding":{"top":"var:preset|spacing|20","right":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20"},"blockGap":"var:preset|spacing|10"}},"borderColor":"borders"} -->
		<details class="wp-block-details has-border-color has-borders-border-color" style="border-width:1px;border-radius:8px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)">
			<summary><strong>' . __( 'Module 4: Capstone Project', 'memberlite' ) . '</strong> — ' . __( '4 Lessons', 'memberlite' ) . '</summary>
			<!-- wp:list -->
			<ul class="wp-block-list">
				<!-- wp:list-item -->
				<li>' . __( 'Project Planning and Scope', 'memberlite' ) . '</li>
				<!-- /wp:list-item -->
				<!-- wp:list-item -->
				<li>' . __( 'Building Your Capstone', 'memberlite' ) . '</li>
				<!-- /wp:list-item -->
				<!-- wp:list-item -->
				<li>' . __( 'Peer Review and Feedback', 'memberlite' ) . '</li>
				<!-- /wp:list-item -->
				<!-- wp:list-item -->
				<li>' . __( 'Final Presentation and Next Steps', 'memberlite' ) . '</li>
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
		<div class="wp-block-button"><a class="wp-block-button__link has-color-primary-background-color has-background wp-element-button" href="#">' . __( 'Enroll Now', 'memberlite' ) . '</a></div>
		<!-- /wp:button -->
		<!-- wp:button {"textColor":"color-primary","className":"is-style-outline","style":{"elements":{"link":{"color":{"text":"var:preset|color|color-primary"}}}}} -->
		<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-color-primary-color has-text-color has-link-color wp-element-button" href="#">' . __( 'Preview Free Lesson', 'memberlite' ) . '</a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->',
];
