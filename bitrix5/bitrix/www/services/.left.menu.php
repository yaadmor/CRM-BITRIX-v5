<?
$aMenuLinks = Array(
	Array(
		"Meeting Room Booking", 
		"/services/index.php", 
		Array("/services/res_c.php"), 
		Array(), 
		"CBXFeatures::IsFeatureEnabled('MeetingRoomBookingSystem')" 
	),
	Array(
		"Meetings and Briefings", 
		"/services/meeting/", 
		Array(), 
		Array(), 
		"CBXFeatures::IsFeatureEnabled('Meeting')" 
	),
	Array(
		"Ideas", 
		"/services/idea/", 
		Array(), 
		Array(), 
		"CBXFeatures::IsFeatureEnabled('Idea')" 
	),
	Array(
		"Processes", 
		"/services/processes/", 
		Array(), 
		Array(), 
		"CBXFeatures::IsFeatureEnabled('Lists')" 
	),
	Array(
		"Lists", 
		"/services/lists/", 
		Array(), 
		Array(), 
		"CBXFeatures::IsFeatureEnabled('Lists')" 
	),
	Array(
		"Business Processes", 
		"/services/bp/", 
		Array(), 
		Array(), 
		"" 
	),
	Array(
		"e-Orders", 
		"/services/requests/", 
		Array(), 
		Array(), 
		"CBXFeatures::IsFeatureEnabled('Requests')" 
	),
	Array(
		"Training", 
		"/services/learning/", 
		Array("/services/course.php"), 
		Array(), 
		"CBXFeatures::IsFeatureEnabled('Learning')" 
	),
	Array(
		"Wiki", 
		"/services/wiki/", 
		Array(), 
		Array(), 
		"CBXFeatures::IsFeatureEnabled('Wiki')" 
	),
	Array(
		"FAQ", 
		"/services/faq/", 
		Array(), 
		Array(), 
		"" 
	),
	Array(
		"Polls", 
		"/services/votes.php", 
		Array("/services/vote_new.php", "/services/vote_result.php"), 
		Array(), 
		"CBXFeatures::IsFeatureEnabled('Vote')" 
	),
	Array(
		"Technical Support", 
		"/services/support.php?show_wizard=Y", 
		Array("/services/support.php"), 
		Array(), 
		"CBXFeatures::IsFeatureEnabled('Support')" 
	),
	Array(
		"Link Directory", 
		"/services/links.php", 
		Array(), 
		Array(), 
		"CBXFeatures::IsFeatureEnabled('WebLink')" 
	),
	Array(
		"Subscription", 
		"/services/subscr_edit.php", 
		Array(), 
		Array(), 
		"CBXFeatures::IsFeatureEnabled('Subscribe')" 
	),
	Array(
		"Change Log", 
		"/services/event_list.php", 
		Array(), 
		Array(), 
		"CBXFeatures::IsFeatureEnabled('EventList')" 
	),
	Array(
		"", 
		"/services/salary/", 
		Array(), 
		Array(), 
		"LANGUAGE_ID == 'ru' && CBXFeatures::IsFeatureEnabled('Salary')" 
	),
	Array(
		"Classifieds", 
		"/services/board/", 
		Array(), 
		Array(), 
		"CBXFeatures::IsFeatureEnabled('Board')" 
	),
	Array(
		"Telephony", 
		"/services/telephony/", 
		Array(), 
		Array(), 
		"(!IsModuleInstalled(\"voximplant\") || SITE_TEMPLATE_ID == \"bitrix24\")?false:\$GLOBALS[\"USER\"]->IsAdmin()" 
	),
	Array(
		"Video Conferencing", 
		"/services/video/", 
		Array(), 
		Array(), 
		"" 
	)
);
?>