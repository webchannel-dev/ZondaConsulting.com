function bbpress_post_ratings_ratePost(postID, isPositiveRating){
	sendedRating = (isPositiveRating?1:-1);
	notSendedRating = (isPositiveRating?-1:1);
	jQuery.post(ajaxurl, {
		action: "bbpress_post_ratings_Rate",
		postID: postID, 
		isPositiveRating: isPositiveRating
	}, function(data){
		dataParts = data.split(",");
		jQuery("#bbpress_post_ratings_rating_" + postID).text(dataParts[0]);
		jQuery("#bbpress_post_ratings_rate_trigger_" + postID + "_" + sendedRating).addClass("bbpress_post_ratings_rate_trigger_active");
		jQuery("#bbpress_post_ratings_rate_trigger_" + postID + "_" + notSendedRating).removeClass("bbpress_post_ratings_rate_trigger_active");
		jQuery(".bbpress_post_ratings_user_rating_" + dataParts[1]).text(dataParts[2] + "p");
	});
}