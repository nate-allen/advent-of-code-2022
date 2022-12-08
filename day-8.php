<?php
/**
 * Day 8:
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

	printf( 'Answer: %s', $total . PHP_EOL );
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

	printf( 'Answer: %s', $total . PHP_EOL );
}

/**
 * Parses the data and returns an array of lines.
 *
 * @return array
 */
function get_lines() {
	$data  = file_get_contents( __DIR__ . '/data/day-8.txt' );
	$lines = explode( "\n", $data );

	return $lines;
}