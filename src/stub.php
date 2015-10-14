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

try {
    Phar::mapPhar('merge.phar');
    include 'phar://merge.phar/src/merge.php';
} catch (PharException $e) {
    echo $e->getMessage();
    die('Cannot initialize Phar');
}
__HALT_COMPILER();
