<?php
/**
 * Day 15:
 */

/**
 * Part 1:
 *
 * @return void
 */
function part_1() {
	$lines = get_lines();
	$total = 0;

	foreach ( $lines as $line ) {
		$total++;
	}

	printf( 'Total: %s', $total . PHP_EOL );
}

/**
 * Part 2:
 *
 * @return void
 */
function part_2() {
	$lines = get_lines();
	$total = 0;

	foreach ( $lines as $line ) {
		$total++;
	}

	printf( 'Total: %s', $total . PHP_EOL );
}

/**
 * Returns an array of data from the input file.
 *
 * @return array
 */
function get_lines() {
	$lines = file_get_contents( __DIR__ . '/data/day-15.txt' );

	return explode( "\n", $lines );
}