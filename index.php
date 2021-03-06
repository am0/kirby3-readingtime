<?php
/**
 * Kirby 3 Reading Time Plugin
 * Example usage: <?php echo $page->text()->readingtime() ?>
 * Reading time code authored by Roy Lodder <http://roylodder.com> and Bastian Allgeier <http://getkirby.com>
 */

	Kirby::plugin('am0/k3readingtime', [
		'fieldMethods' => [
			'readingtime' => function ($field, $params = array()) {
				$defaults = array(
					'minute'              => 'minute',
					'minutes'             => 'minutes',
					'second'              => 'second',
					'seconds'             => 'seconds',
					'format'              => '{minutesCount} {minutesLabel}, {secondsCount} {secondsLabel}',
					'format.alt'          => '{secondsCount} {secondsLabel}',
					'format.alt.enable'   => false
				);

				$options      = array_merge($defaults, $params);
				$words        = str_word_count(strip_tags($field->value));
				$minutesCount = floor($words / 200);
				$secondsCount = floor($words % 200 / (200 / 60));
				$minutesLabel = ($minutesCount <= 1) ? $options['minute'] : $options['minutes'];
				$secondsLabel = ($secondsCount <= 1) ? $options['second'] : $options['seconds'];
				$replace      = array(
					'minutesCount' => $minutesCount,
					'minutesLabel' => $minutesLabel,
					'secondsCount' => $secondsCount,
					'secondsLabel' => $secondsLabel,
				);

				if ($minutesCount < 1 and $options['format.alt.enable'] === true ) {
					$result = $options['format.alt'];
				} else {
					$result = $options['format'];
				}

				foreach($replace as $key => $value) {
					$result = str_replace('{' . $key . '}', $value, $result);
				}

				return $result;
			}
		]
	]);
