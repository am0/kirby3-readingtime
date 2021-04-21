# Estimated reading time plugin

This is a plugin for [Kirby 3](http://getkirby.com/) that estimates the reading time for your content.
The original readingtime code was authored by Roy Lodder and Bastian Allgeier but I've wrapped it into a Kirby 3-friendly plugin.

## Installation

Put the `kirby3-readingtime` folder in `/site/plugins`.

## How to use it

It's very simple! Just put `<?php echo $page->text()->readingtime() ?>` in your template and it will echo the estimated reading time. You can use this with any custom page variable to estimate the reading time of it.

## Example usage

  <?php snippet('header') ?>
    <?php snippet('menu') ?>
    <?php snippet('submenu') ?>

    <section class="content">

        <article>
            <h1><?php echo $page->title()->html() ?></h1>
            <?php echo $page->text()->readingtime() ?>
            <?php echo $page->text()->kirbytext() ?>
        </article>

    </section>

    <?php snippet('footer') ?>

## Language

The plugin is very easy to localize. The default format for example is 3 minutes, 31 seconds. Pass the following params to translate it to any language:

  <?php

  echo $page->text()->readingtime(array(
    'minute'  => 'Minute',
    'minutes' => 'Minuten',
    'second'  => 'Sekunde',
    'seconds' => 'Sekunden'
  ));

  ?>

You can even change the entire format of the result:

  <?php

  echo $page->text()->readingtime(array(
    'minute'  => 'Minute',
    'minutes' => 'Minuten',
    'second'  => 'Sekunde',
    'seconds' => 'Sekunden',
    'format'  => '{minutesCount} {minutesLabel} - {secondsCount} {secondsLabel}'
  ));

  ?>

You also can enable an alternative format that hides the minute label. This comes in handy if you have content that you can read under a minute.

    <?php

    echo $page->text()->readingtime(array(
        'format' => '{minutesCount} {minutesLabel}, {secondsCount} {secondsLabel}',
        'format.alt' => '{secondsCount} {secondsLabel}',
        'format.alt.enable' => true
    ));

    ?>

## Original Authors

Author: Roy Lodder <http://roylodder.com>
Contributor: Bastian Allgeier <http://getkirby.com>
