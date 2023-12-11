<?php

namespace App\Enums;

enum PreferencesEnum: string
{
    case THEME = 'preference_theme';
    case THEME_PAGE_SIZE = 'preference_theme_pageSize';
    case THEME_PREFERRED_NAME = 'preference_theme_preferredName';
    case SEARCH_MINIMUM_MATCHING_TAGS = 'preference_search_minimumMatchingTags';
    case NOTIFICATION_TIME = 'preference_notification_time';
    case FEEDS_SHOW_INTERACTED = 'preference_feeds_showInteracted';
    case FEEDS_SHOW_NSFW = 'preference_feeds_showNsfw';
    case COMMUNICATIONS_NEW_LIKE = 'preference_communications_newLike';
    case COMMUNICATIONS_NEW_FOLLOW = 'preference_communications_newFollow';
    case COMMUNICATIONS_NEW_POST = 'preference_communications_newPost';
}
