<?php
    $filename = "..\Week 9\processing.php";
    $line = file($filename);
    echo "<ol>";
    $linesOrBigString = "";
    foreach($line as $i => $line) {
        $linesOrBigString .= $line;
        echo "<li> $line </li>";
    }
    echo "</ol>";
    
    $filename = "processing.php";
    if ($numBytes = file_put_contents($filename, $linesOrBigString))
        echo "File Saved, $numBytes written.";
    else
        echo "File Access Error. Does $filename exist and have 606 permissions?";
    
    $filename = "../Week 9/processing.php";
    echo "<ol>";

    ///////////////
    // OPEN FILE //
    ///////////////
    // opening file
    $fp = fopen($filename, "r");

    // lock file
    flock($fp, LOCK_SH);

    // reading through the line and echo each line
    while ($line = fgets($fp))
        echo "<li>$line</li>";

    // when locking file, always unlock as good habit
    flock($fp, LOCK_UN);

    // when working with file, always close to prevent memory leak
    fclose($fp);
    echo "</ol>";


    /////////////////
    // CREATE FILE //
    /////////////////
    // create text.txt file and write some lines on it
    $filename = "text.txt";
    $fp = fopen($filename, "w");
    flock($fp, LOCK_EX);

    fwrite($fp, "Here is the first line\n");
    fwrite($fp, "Here is the second line\n");
    
    flock($fp, LOCK_UN);
    fclose($fp);


    ///////////////////
    // READ CSV FILE //
    ///////////////////
    // read cvs file
    $filename = "student.csv";
    $fp = fopen($filename, "r");
    flock($fp, LOCK_SH);

    // read the heading
    $headings = fgetcsv($fp);

    // read through the line and 
    while ($aLineOfCells = fgetcsv($fp)) {
    $records[] = $aLineOfCells;
    }
    flock($fp, LOCK_UN);
    fclose($fp);
    echo "<p>{$headings[3]}</p>";
    echo "<p>{$records[0][0]}</p>";

    ////////////////////
    // WRITE CSV FILE //
    ////////////////////
    $filename = "student_new.csv";
    $fp = fopen($filename, "w");
    flock($fp, LOCK_EX);
    fputcsv($fp, $headings);
    foreach ($records as $record)
    fputcsv($fp, $record);
    flock($fp, LOCK_UN);
    fclose($fp);
?>