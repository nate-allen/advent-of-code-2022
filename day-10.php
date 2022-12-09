<?php
/**
 * Day X:
 */

/**
 * Part 1:
 *
 * @return void
 */
function part_1() {
	$lines = get_line();
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
	$lines = get_line();
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
function get_line() {
	$line  = file_get_contents( __DIR__ . '/line/day-X.txt' );

	return explode( "\n", $line );
}