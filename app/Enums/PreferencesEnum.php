<?php

namespace App\Enums;

enum PreferencesEnum: string
{
    case THEME = 'preference.theme';
    case THEME_PAGE_SIZE = 'preference.theme.pageSize';
    case THEME_PREFERRED_NAME = 'preference.theme.preferredName';
    case SEARCH_MINIMUM_MATCHING_TAGS = 'preference.search.minimumMatchingTags';
}
