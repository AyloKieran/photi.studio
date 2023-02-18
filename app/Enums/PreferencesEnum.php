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
}
