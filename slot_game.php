<?php
    $symbols = ["A", "B", "C"]; // Slot symbols
    $total_results = ['', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ]; // Overall slot results

    $spins = 0; // # of spins
    $total_winnings = 0; // Total winnings

    print("Running Chance Slots Simulation Version 7.77...\n"); // Initial Print Statement

    // Main Game
    while ($spins < 20 || $total_winnings < 500) {
        $result = ''; // Blank result
        for ($i = 0; $i <= 3; $i++) {
            $result += array_rand($symbols);
        } // end of for loop

        $payout = 0; // current spin payout
        match($result) {
            'AAA', 'BBB', 'CCC' => $payout = 100, // Three identical symbols
            'AAB', 'ABA', 'BAA', 'ABB', 'BBA', 'BAB', 'BCC', 'CBC', 'CCB', 'ACC', 'CAC', 'CCA' => $payout = 50, // Two identical symbols
            default => $payout = 0 // Default case
        }; // end match

        $total_results[$spins] = "Spin {$spins}: {$result}, Payoff {$payout}.\n"; // Log spin result
        $total_winnings += $payout; // add payout to total winnings

    } // end of while loop

    print("Simulation finished, printing results shortly.\n\n"); // Checkpoint print statement

    // Results screen
    foreach ($total_results as $result) {
        print($result); // print logged results
        
    } // end foreach loop
    print("Total Winnings: {$total_winnings} dollars.\n");

?>