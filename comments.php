<?php

/**
 * Template for displaying user comments of the Property Puzzler 2025 website theme
 * Outputs a list of existing comments for the current post, as well as the 'add new comment' form
 * Finishes at the end of 'the loop' - the query that gets the list of comments
 */
?>
<h1>Comments</h1>
<?php
// If this post allows comments, display the list of comments and the comment form
if (comments_open()) {
	// Output the list of comments
	$noOfComments = get_comments_number(get_the_ID());
	if ($noOfComments == 0) {
?>
		<h2>No comments yet - be the first!</h2>
	<?php
	} else {
	?>
		<h2><?php echo $noOfComments; ?> Comment<?php echo ($noOfComments > 1) ? 's' : '' ?></h2>
	<?php
		$thisPostID = get_the_ID();
		$args       = array(
			'post_id'   => $thisPostID,
			'post_type' => 'post',
			'status'    => 'approve',
			'type'      => 'comment'
		);
		$comments   = get_comments($args);
		$count      = 1;

		foreach ($comments as $comment) {
			// Comment loop here..
			$count++;
		}
	}
	// Output the comments form here..
} // Otherwise, display a nice user-friendly error message
else {
	?>
	<h1>Comments are disabled for this post.</h1>
<?php
}
