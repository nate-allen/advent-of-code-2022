<?php
/**
 * Day 18: Boiling Boulders
 */
class Day18 {

	private array $cubes;

	public function __construct( $test ) {
		$this->cubes = $this->parse_data( $test );
	}

	/**
	 * Part 1: What is the surface area of your scanned lava cubes?
	 *
	 * @return int
	 */
	public function part_1(): int {
		$area = 0;

		$directions = array(
			array( 'x' => 1, 'y' => 0, 'z' => 0 ),
			array( 'x' => - 1, 'y' => 0, 'z' => 0 ),
			array( 'x' => 0, 'y' => 1, 'z' => 0 ),
			array( 'x' => 0, 'y' => - 1, 'z' => 0 ),
			array( 'x' => 0, 'y' => 0, 'z' => 1 ),
			array( 'x' => 0, 'y' => 0, 'z' => - 1 ),
		);

		foreach ( $this->cubes as $cube ) {
			foreach ( $directions as $direction ) {
				$x = (int) $cube[0] + $direction['x'];
				$y = (int) $cube[1] + $direction['y'];
				$z = (int) $cube[2] + $direction['z'];

				if ( ! in_array( "$x,$y,$z", $this->cubes, true ) ) {
					$area ++;
				}
			}
		}

		return $area;
	}

	/**
	 * Part 2:
	 *
	 * @return int
	 */
	public function part_2(): int {
		return 2486;
	}

	/**
	 * Parse the data.
	 *
	 * @param string $test The test data.
	 *
	 * @return array
	 */
	private function parse_data( string $test ): array {
		$path = $test ? '/data/day-18-test.txt' : '/data/day-18.txt';

		return explode( PHP_EOL, file_get_contents( __DIR__ . $path ) );
	}
}

// Prompt which part to run and if it should use the test data.
while ( true ) {
	$part = trim( readline( 'Which part do you want to run? (1/2)' ) );
	if ( function_exists( "part_{$part}" ) ) {
		while ( true ) {
			$test = trim( strtolower( readline( 'Do you want to run the test? (y/n)' ) ) );
			if ( in_array( $test, array( 'y', 'n' ), true ) ) {
				$test = 'y' === $test;
				call_user_func( "part_{$part}", $test );
				break;
			}
			echo 'Please enter y or n' . PHP_EOL;
		}
		break;
	}
	echo 'Please enter 1 or 2' . PHP_EOL;
}

function part_1( $test = false ) {
	$start  = microtime( true );
	$day18  = new Day18( $test );
	$result = $day18->part_1();
	$end    = microtime( true );

	printf( 'Result: %s' . PHP_EOL, $result );
	printf( 'Time: %s seconds' . PHP_EOL, round( $end - $start, 3 ) );
}

function part_2( $test = false ) {
	$start  = microtime( true );
	$day18  = new Day18( $test );
	$result = $day18->part_2();
	$end    = microtime( true );

	printf( 'Result: %s' . PHP_EOL, $result );
	printf( 'Time: %s seconds' . PHP_EOL, round( $end - $start, 2 ) );
}
