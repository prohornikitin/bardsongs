<?php namespace tools;
function loadNextView(array $content_views) {
	$content_view = array_shift($content_views);
	if($content_view != null) {
		if(is_array($content_view)) {
			foreach ($content_view as $one_view) {
				require SITE_ROOT . '/views/content/' . $one_view . '.php';
			}
		} else {
			require SITE_ROOT . '/views/content/' . $content_view . '.php';
		}
	}
}