<?php
/**
 * Example of merging PDF files into one PDF file.
 *
 * PHP Version: 5.5
 *
 * @category Default
 * @package  None
 * @author   Kei Nakayama <kei.of.nakayama@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     None
 */

require_once __DIR__ . "/../vendor/autoload.php";

use ZendPdf\PdfDocument;

if (count($argv) < 3) {
    echo "USAGE: php $argv[0] "
        . "<pdf_file1> <pdf_file2> [<pdf_file3> [...]] <output_pdf_file>" . PHP_EOL;
    exit;
}

$pdfs = [];
for ($i = 1; $i <= (count($argv) - 2); $i++) {
    echo "loading: " . $argv[$i] . PHP_EOL;
    $pdfs[] = PdfDocument::load($argv[$i]);
    echo "loaded: " . $argv[$i] . PHP_EOL;
}

$outPdfFn = $argv[count($argv) - 1];
echo "creating: " . $outPdfFn . PHP_EOL;
$outPdf = new PdfDocument();
foreach ($pdfs as $pdf) {
    foreach ($pdf->pages as $page) {
        $outPdf->pages[] = clone $page;
    }
}
echo "saving: " . $outPdfFn . PHP_EOL;
$outPdf->save($outPdfFn);
echo "created: " . $outPdfFn . PHP_EOL;
exit;
