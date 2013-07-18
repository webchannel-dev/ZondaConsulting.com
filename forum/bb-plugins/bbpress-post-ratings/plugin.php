<?php
	/*
	Plugin Name: bbPress Post Ratings
	Description: Offers buttons to up-/downrate posts and calculates user ratings based on their posts.
	Version: 1.0
	Author: destroflyer
	*/

	add_action("init", "bbpress_post_ratings_Initialize");
	
	function bbpress_post_ratings_Initialize(){
		wp_enqueue_script("bbpress_post_ratings_Ratings", plugins_url("rating.js", __FILE__), array("jquery"));
		wp_enqueue_style("bbpress_post_ratings_Style", plugins_url("style.css", __FILE__));
		add_action("bbp_theme_after_reply_admin_links", "bbpress_post_ratings_RateHTMLArea");
		add_action("wp_ajax_bbpress_post_ratings_Rate", "bbpress_post_ratings_SaveReceivedRating");
		add_filter("bbp_get_reply_author_link", "bbpress_post_ratings_UserRatingFilter");
	}
	
	function bbpress_post_ratings_UserRatingFilter($content){
		$postID = bbpress_post_ratings_GetCurrentLoopedTopicPostID();
		if($postID){
    		$userID = bbpress_post_ratings_GetPostAuthorID($postID);
    		$userRating = bbpress_post_ratings_GetUserRating($userID);
			$content .= '
				<div class="bbpress_post_ratings_user_rating_' . $userID . ' bbpress_post_ratings_user_rating">' . $userRating . 'p</div>
			';
		}
		return $content;
	}
	
	function bbpress_post_ratings_RateHTMLArea(){
		$postID = bbpress_post_ratings_GetCurrentLoopedTopicPostID();
		$postRating = bbpress_post_ratings_GetPostRating($postID);
		$isRatingAllowed = bbpress_post_ratings_IsCurrentUserAllowedToRate($postID);
		echo '
			<div class="bbpress_post_ratings_rate_area">
		';
		if($isRatingAllowed){
			echo '
				<span class="bbpress_post_ratings_rate_post_text">Rate this post</span>
			';
		}
		echo '
				<span id="bbpress_post_ratings_rating_' . $postID . '" class="bbpress_post_ratings_post_rating">' . bbpress_post_ratings_PrepareRatingForOutput($postRating) . '</span>
		';
		if($isRatingAllowed){
			$userID = bbpress()->current_user->id;
			$userPostRating = bbpress_post_ratings_GetUserPostRating($userID, $postID);
			echo '
				' . bbpress_post_ratings_GetRateIcon($postID, true, $userPostRating) . '
				' . bbpress_post_ratings_GetRateIcon($postID, false, $userPostRating) . '
			';
		}
		echo '
			</div>
		';
	}
	
	function bbpress_post_ratings_GetCurrentLoopedTopicPostID(){
		$post = bbpress()->reply_query->post;
		if($post != NULL){
			return $post->ID;
		}
		return false;
	}
	
	function bbpress_post_ratings_PrepareRatingForOutput($rating){
		if($rating > 0){
			$rating = "+" . $rating;
		}
		else if($rating == 0){
			$rating = "";
		}
		return $rating;
	}
	
	function bbpress_post_ratings_GetRateIcon($postID, $isPositiveRating, $userPostRating=0){
		$iconRating = ($isPositiveRating?1:-1);
		return '
			<a id="bbpress_post_ratings_rate_trigger_' . $postID . '_' . $iconRating . '" class="' . (($userPostRating == $iconRating)?"bbpress_post_ratings_rate_trigger_active ":"") . 'bbpress_post_ratings_rate_trigger_' . ($isPositiveRating?"up":"down") . ' bbpress_post_ratings_rate_trigger" href="#" onclick="bbpress_post_ratings_ratePost(\'' . $postID . '\', ' . ($isPositiveRating?"true":"false") . '); return false;">
			</a>
		';
	}
	
	function bbpress_post_ratings_SaveReceivedRating(){
		if(is_user_logged_in()){
			$ratingInfo = bbpress_post_ratings_UpdateRating($_POST["postID"], ($_POST["isPositiveRating"] == "true"));
			echo bbpress_post_ratings_PrepareRatingForOutput($ratingInfo["postRating"]) . "," . $ratingInfo["authorID"] . "," . $ratingInfo["authorRating"];
		}
		exit();
	}
	
	function bbpress_post_ratings_UpdateRating($postID, $isPositiveRating){
		$userID = bbpress()->current_user->id;
		$postRating = bbpress_post_ratings_GetPostRating($postID);
		$isRatingUpdateNeeded = true;
    	if(bbpress_post_ratings_IsCurrentUserAllowedToRate($postID)){
    		$isRatingUpdateNeeded = true;
			$userRatings = get_user_meta($userID, "bbpress_post_ratings_ratings", true);
			$ratingValue = ($isPositiveRating?1:-1);
			$ratingInfluence = $ratingValue;
			if(isset($userRatings[$postID])){
				if($userRatings[$postID] == $ratingValue){
					$isRatingUpdateNeeded = false;
				}
				else{
					//To "neutralize" the users' previous rating
					$ratingInfluence *= 2;
				}
			}
			if($isRatingUpdateNeeded){
				//UserPostRatings
				$userRatings[$postID] = $ratingValue;
				update_user_meta($userID, "bbpress_post_ratings_ratings", $userRatings);
				//PostRating
				$postRating += $ratingInfluence;
				update_post_meta($postID, "bbpress_post_ratings_rating", $postRating);
				//UserRating
				$authorID = bbpress_post_ratings_GetPostAuthorID($postID);
				$authorRating = bbpress_post_ratings_GetUserRating($authorID);
				$authorRating += $ratingInfluence;
				update_user_meta($authorID, "bbpress_post_ratings_rating", $authorRating);
			}
    	}
		return array("postRating"=>$postRating,"authorID"=>$authorID,"authorRating"=>$authorRating);
	}
	
	function bbpress_post_ratings_IsCurrentUserAllowedToRate($postID){
		if(is_user_logged_in()){
			$userID = bbpress()->current_user->id;
    		$authorID = bbpress_post_ratings_GetPostAuthorID($postID);
			return ($userID != $authorID);
		}
		return false;
	}
	
	function bbpress_post_ratings_GetUserPostRating($userID, $postID){
		$userRatings = get_user_meta($userID, "bbpress_post_ratings_ratings", true);
		if(isset($userRatings[$postID])){
			return $userRatings[$postID];
		}
		return 0;
	}
	
	function bbpress_post_ratings_GetPostAuthorID($postID){
		global $wpdb;
		$authorIDs = $wpdb->get_col($wpdb->prepare("SELECT post_author FROM " . $wpdb->posts . " WHERE ID = " . intval($postID) . " LIMIT 1"));
		return $authorIDs[0];
	}
	
	function bbpress_post_ratings_GetPostRating($postID){
		return intval(get_post_meta($postID, "bbpress_post_ratings_rating", true));
	}
	
	function bbpress_post_ratings_GetUserRating($userID){
		return intval(get_user_meta($userID, "bbpress_post_ratings_rating", true));
	}
?>