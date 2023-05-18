<?php

// require_once __DIR__ . '/vendor/autoload.php';
require_once '../vendor/autoload.php';
require '../functions.php';

$id_rv = $_GET["id_rv"];

$rv = query(
    "SELECT * FROM rv
    WHERE id_rv = $id_rv"
)[0];

$rv_detail = query(
    "SELECT * FROM rv_detail
    INNER JOIN rv ON rv.id_rv = rv_detail.id_rv
    WHERE rv_detail.id_rv = $id_rv"
);

$rv_amount = query(
    "SELECT SUM(jumlah) AS amount FROM rv_detail WHERE id_rv = $id_rv"
)[0];

$html = '
<body>
    <table cellpadding="20px" cellspacing="0" width="100%">
        <tr>
            <td width="20%" style="text-align: center;"><img src="../assets/img/Logo pnm.png" width="30%"></td>
            <td width="60%" style="text-align: center;">
                <h3>RECEIVE VOUCHER</h3>
                <p><strong>PNM/F-09.01/03C/RO</strong></p>
            </td>
            <td width="20%" style="text-align: center;"><img src="../assets/img/Logo Mekaar2.png" width="30%"></td>
        </tr>
    </table>
    <table border="1" cellpadding="10px" cellspacing="0" width="100%" style="font-size: 9px">
        <tr>
            <td width="30%">
                Transaction Date
            </td>
            <td>: ' . date('F Y', strtotime($rv["rv_date"])) . '</td>
        </tr>
        <tr>
            <td width="30%">
                Description
            </td>
            <td>:</td>
        </tr>

        <tr>
            <td colspan="2">' . $rv["deskripsi"] . '</td>
        </tr>
    </table>

    <table border="1" cellpadding="10px" cellspacing="0" width="100%" style="font-size: 9px">
        <tr style="background-color: #6495ED; font-style: bold; text-align: center">
            <td>DR / CR</td>
            <td>Account Name</td>
            <td>Account No.</td>
            <td>Amount</td>
        </tr>';
foreach ($rv_detail as $rvd) {
    $html .=
        '<tr>
            <td style="text-align: center;">' . $rvd["drcr"] . '</td>
            <td>' . $rvd["nama_akun"] . '</td>
            <td>' . $rvd["no_akun"] . '</td>
            <td style="text-align: right;">Rp. ' . number_format($rvd["jumlah"], 2, ',', '.') . '</td>
        </tr>';
}
$html .=
    '<tr>
            <td colspan="3" style="text-align: center;">
                TOTAL
            </td>
            <td style="text-align: right;">Rp. ' . number_format($rv_amount["amount"], 2, ',', '.') . '</td>
        </tr>

        <tr style="background-color: #6495ED; font-style: bold;">
            <td style="text-align: center;" colspan="2">
                <p>Prepared & Entry By <br> (Sign, Date & Initial)</p>
            </td>
            <td style="text-align: center;">
                <p>Verified & Posted by <br> (Sign, Date & Initial)</p>
            </td>
            <td style="text-align: center;">
                <p>Approved by <br> (Sign, Date & Initial)</p>
            </td>
        </tr>

        <tr>
            <td colspan="2">
                <br><br><br><br>
            </td>
            <td></td>
            <td></td>
        </tr>
    </table>
</body>
';

$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A5-P']);

// $stylesheet = file_get_contents('style_print.css');
// $mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML("$html", \Mpdf\HTMLParserMode::HTML_BODY);
$mpdf->Output('RV ' . $rv["rv_date"] . '.pdf', 'I');
// $mpdf->Output();