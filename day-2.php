<?php
/*
 * Day 2: Rock Paper Scissors
 *
 * Rules: Winning earns 6 points, a tie earns 3 points, and losing earns 0 points. Bonus points are also awarded based
 * on the shape that was played. Rock earns 1 point, paper earns 2 points, and scissors earns 3 points.
 */

/**
 * Part 1: Calculate points for each player.
 *
 * @return void
 */
function part_1() {
	$strategies = get_strategies();
	$score = 0;
	$choices = array(
		'opponent' => array(
			'A' => 'Rock',
			'B' => 'Paper',
			'C' => 'Scissors',
		),
		'player' => array(
			'X' => 'Rock',
			'Y' => 'Paper',
			'Z' => 'Scissors',
		),
	);

	foreach ( $strategies as $strategy ) {
		$move = explode( ' ', $strategy );
		$opponent = $move[0];
		$player = $move[1];
		$opponentChoice = $choices['opponent'][ $opponent ];
		$playerChoice = $choices['player'][ $player ];

		$score += get_score( $opponentChoice, $playerChoice );
	}

	echo $score . PHP_EOL;
}

/**
 * Part 2: Determine if you should win, lose, or tie the game.
 *
 * @return void
 */
function part_2() {
	$strategies = get_strategies();
	$score      = 0;
	$choices    = array(
		'opponent' => array(
			'A' => 'Rock',
			'B' => 'Paper',
			'C' => 'Scissors',
		),
		'player'   => array(
			'X' => 'Lose',
			'Y' => 'Draw',
			'Z' => 'Win',
		),
	);

	foreach ( $strategies as $strategy ) {
		$move           = explode( ' ', $strategy );
		$opponent       = $move[0];
		$player         = $move[1];
		$opponentChoice = $choices['opponent'][ $opponent ];
		$playerChoice   = $choices['player'][ $player ];

		// Determine which move the player should make.
		if ( 'Lose' === $playerChoice ) {
			$playerChoice = get_losing_move( $opponentChoice );
		} elseif ( 'Draw' === $playerChoice ) {
			$playerChoice = $opponentChoice;
		} elseif ( 'Win' === $playerChoice ) {
			$playerChoice = get_winning_move( $opponentChoice );
		}

		$score += get_score( $opponentChoice, $playerChoice );
	}

	echo $score . PHP_EOL;
}

/**
 * Returns an array of strategies.
 *
 * @return array
 */
function get_strategies() {
	$strategy = trim( file_get_contents( __DIR__ . '/data/day-2.txt' ) );

	return explode( "\n", $strategy );
}

/**
 * Returns the score for a given move.
 *
 * @param string $opponentChoice The opponent's move.
 * @param string $playerChoice The player's move.
 *
 * @return int
 */
function get_score( $opponentChoice, $playerChoice ) {
	$score = 0;

	if ( $opponentChoice === $playerChoice ) {
		$score += 3;
	} elseif ( 'Rock' === $opponentChoice && 'Paper' === $playerChoice ) {
		$score += 6;
	} elseif ( 'Paper' === $opponentChoice && 'Scissors' === $playerChoice ) {
		$score += 6;
	} elseif ( 'Scissors' === $opponentChoice && 'Rock' === $playerChoice ) {
		$score += 6;
	}

	if ( 'Rock' === $playerChoice) {
		$score += 1;
	} elseif ( 'Paper' === $playerChoice ) {
		$score += 2;
	} elseif ( 'Scissors' === $playerChoice ) {
		$score += 3;
	}

	return $score;
}

/**
 * Logic for what hand to play to win the round, based on what your opponent played.
 *
 * @param $opponentChoice
 *
 * @return string
 */
function get_losing_move( $opponentChoice ) {
	if ( 'Rock' === $opponentChoice ) {
		return 'Scissors';
	} elseif ( 'Paper' === $opponentChoice ) {
		return 'Rock';
	} elseif ( 'Scissors' === $opponentChoice ) {
		return 'Paper';
	}
}

/**
 * Logic for what hand to play to lose the round, based on what your opponent played.
 *
 * @param $opponentChoice
 *
 * @return string
 */
function get_winning_move( $opponentChoice ) {
	if ( 'Rock' === $opponentChoice ) {
		return 'Paper';
	} elseif ( 'Paper' === $opponentChoice ) {
		return 'Scissors';
	} elseif ( 'Scissors' === $opponentChoice ) {
		return 'Rock';
	}
}
