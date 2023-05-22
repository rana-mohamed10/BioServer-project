<?php

	function Complement($sequence) {
		$sequence=strtoupper($sequence);
		$complement = '';
		$length = strlen($sequence);

		for ($i = 0; $i < $length; $i++) {
			$base = $sequence[$i];

			if ($base === 'A') {
				$complement .= 'T';
			} elseif ($base === 'T') {
				$complement .= 'A';
			} elseif ($base === 'C') {
				$complement .= 'G';
			} elseif ($base === 'G') {
				$complement .= 'C';
			}
		}
        return "the complement to $sequence is : $complement";
	}

	function transcribe($sequence) {
		$sequence=strtoupper($sequence);
    $rnaSequence = str_replace('T', 'U', $sequence);
    return $rnaSequence;
	}


	function protein_translation($sequence) {
		strtoupper($sequence);
    $translaion = array(
        'TTT' => 'F', 'TTC' => 'F', 'TTA' => 'L', 'TTG' => 'L',
        'CTT' => 'L', 'CTC' => 'L', 'CTA' => 'L', 'CTG' => 'L',
        'ATT' => 'I', 'ATC' => 'I', 'ATA' => 'I', 'ATG' => 'M',
        'GTT' => 'V', 'GTC' => 'V', 'GTA' => 'V', 'GTG' => 'V',
        'TCT' => 'S', 'TCC' => 'S', 'TCA' => 'S', 'TCG' => 'S',
        'CCT' => 'P', 'CCC' => 'P', 'CCA' => 'P', 'CCG' => 'P',
        'ACT' => 'T', 'ACC' => 'T', 'ACA' => 'T', 'ACG' => 'T',
        'GCT' => 'A', 'GCC' => 'A', 'GCA' => 'A', 'GCG' => 'A',
        'TAT' => 'Y', 'TAC' => 'Y', 'TAA' => '*', 'TAG' => '*',
        'CAT' => 'H', 'CAC' => 'H', 'CAA' => 'Q', 'CAG' => 'Q',
        'AAT' => 'N', 'AAC' => 'N', 'AAA' => 'K', 'AAG' => 'K',
        'GAT' => 'D', 'GAC' => 'D', 'GAA' => 'E', 'GAG' => 'E',
        'TGT' => 'C', 'TGC' => 'C', 'TGA' => '*', 'TGG' => 'W',
        'CGT' => 'R', 'CGC' => 'R', 'CGA' => 'R', 'CGG' => 'R',
        'AGT' => 'S', 'AGC' => 'S', 'AGA' => 'R', 'AGG' => 'R',
        'GGT' => 'G', 'GGC' => 'G', 'GGA' => 'G', 'GGG' => 'G'
    );

    $protein = '';
    $length = strlen($sequence);

    for ($i = 0; $i < $length; $i += 3) {
        $codon = substr($sequence, $i, 3);
        if (isset($translaion[$codon])) {
            $protein .= $translaion[$codon];
        } else {
            $protein .= ' Unknown ';
        }
    }
    return "The protien transleted from $sequence is : $protein";
	}

	function GCContent($sequence) {
		$sequence=strtoupper($sequence);
    $gcCount = 0;
    $length = strlen($sequence);

    for ($i = 0; $i < $length; $i++) {
        $base = strtoupper($sequence[$i]);

        if ($base === 'G' || $base === 'C') {
            $gcCount++;
        }
    }

    $gcContent = ($gcCount / $length) * 100;

    return " The percentage of GC content in the seq is : $gcContent%";
	}

    function calcNBases($sequence) {
			  $sequence=strtoupper($sequence);
        $nCount = 0;
        $length = strlen($sequence);

        for ($i = 0; $i < $length; $i++) {
            $base = strtoupper($sequence[$i]);

            if ($base === 'N'||$base ==='n') {
                $nCount++;
            }
        }
        return "There is $nCount n bases in the seq ";
    }

	function reverse($sequence)
	{
		$sequence=strtoupper($sequence);
		$reversedDNA = strrev($sequence);

		return " The reversed seq is : $reversedDNA";
	}


    if (isset($_POST['comp-submit'])) {
        $seq = $_POST['sequence'];
        $output=Complement($seq);
        $html_output = "<p>" . $output . "</p>";

      } elseif (isset($_POST['transcript-submit'])) {
        $seq = $_POST['sequence'];
        $output=transcribe($seq);
        $html_output = "<p>" . $output . "</p>";

      } elseif (isset($_POST['translate-submit'])) {
        $seq = $_POST['sequence'];
        $output=protein_translation($seq);
        $html_output = "<p>" . $output . "</p>";

      } elseif (isset($_POST['gc-submit'])) {
        $seq = $_POST['sequence'];
        $output=GCContent($seq);
        $html_output = "<p>" . $output . "</p>";

      } elseif (isset($_POST['Nbases-submit'])) {
        $seq = $_POST['sequence'];
        $output=calcNBases($seq);
        $html_output = "<p>" . $output . "</p>";

      } else {
        $seq = $_POST['sequence'];
        $output=reverse($seq);
        $html_output = "<p>" . $output . "</p>";

      }
			//echo $output;
			$url = "webserverproject.php?result=".urlencode($output);

		 header("Location: $url");

		 exit();


?>
