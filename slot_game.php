<?php
    $symbols = ["A", "B", "C"]; // Slot symbols
    $total_results = ["", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", ]; // Overall slot results

    $spins = 0; // # of spins
    $total_winnings = 0; // Total winnings

    echo("Running Chance Slots Simulation Version 7.77...\n"); // Initial Echo Statement

    // Main Game
    while ($spins < 20 && $total_winnings < 500) {
        $result = ["","",""]; // Blank result
        for ($i = 0; $i < 3; $i++) {
            $result[$i] = $symbols[array_rand($symbols)];
        } // end of for loop

        $payout = match("{$result[0]}{$result[1]}{$result[2]}") {
            "AAA", "BBB", "CCC" => 100, // Three identical symbols
            "AAB", "ABA", "BAA", "ABB", "BBA", "BAB", "BCC", "CBC", "CCB", "ACC", "CAA", "CAC", "CCA" => 50, // Two identical symbols
            default => 0 // Default case
        }; // end match

        $total_results[$spins] = "Spin {$spins}: {$result[0]}{$result[1]}{$result[2]}, Payoff {$payout}.\n"; // Log spin result
        $total_winnings += $payout; // add payout to total winnings

        $spins += 1;

    } // end of while loop

    echo("Simulation finished, echoing results shortly.\n\n"); // Checkpoint echo statement

    // Results screen
    foreach ($total_results as $result) {
        echo($result); // echo logged results
        
    } // end foreach loop
    
    echo("Total Winnings: {$total_winnings} dollars.\n");

?>