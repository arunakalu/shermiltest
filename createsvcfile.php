<?php
/* Data to be inserted into excel in an array of arrays
 * Each array is the avg monthly temp of a different city */
$data = array ( array ( "City" => "Seattle",
    "Jan" => 46, "Feb" => 50, "Mar" => 53, "Apr" => 58,
    "May" => 64, "Jun" => 70, "Jul" => 75, "Aug" => 76,
    "Sep" => 70, "Oct" => 60, "Nov" => 51, "Dec" => 46 )
    
   
);
  
$csvTitle = "Monthly";
  
/* We know the keys of each sub-array are the same, so
 * extract them from the first sub-array and set them
 * to be our column titles */
$titleArray = array_keys($data[0]);
  
/* Set your desired delimiter. You can make this a true
 * .csv and set $delimiter = ","; but I find that tabs
 * work better as commas can also be present in your data.
 * Note that you must use the .tsv or .xls file extension for Excel
 * to correctly interpret tabs. Otherwise if you are using commas
 * for your delimiter, use .csv for your file extension. */
$delimiter = "\t";
  
//Set target filename - see above comment on file extension.
//$filename="Search_Export.xls";
$filename="Search_Export.tsv";
  
//Send headers
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Expires: 0");
  
//print the title to the first cell
print $csvTitle . "\r\n";
  
//Separate each column title name with the delimiter
$titleString = implode($delimiter, $titleArray);
print $titleString . "\r\n";
  
//Loop through each subarray, which are our data sets
foreach ($data as $subArrayKey => $subArray) {
    //Separate each datapoint in the row with the delimiter
    $dataRowString = implode($delimiter, $subArray);
    print $dataRowString . "\r\n";
}
?>