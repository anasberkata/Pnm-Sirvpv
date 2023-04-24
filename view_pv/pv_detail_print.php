<?php

// require_once __DIR__ . '/vendor/autoload.php';
require_once '../vendor/autoload.php';
require '../functions.php';

$id_pv = $_GET["id_pv"];

$pv = query(
    "SELECT * FROM pv
    WHERE id_pv = $id_pv"
)[0];

$pv_detail = query(
    "SELECT * FROM pv_detail
    INNER JOIN pv ON pv.id_pv = pv_detail.id_pv
    WHERE pv_detail.id_pv = $id_pv"
);

$pv_amount = query(
    "SELECT SUM(jumlah) AS amount FROM pv_detail WHERE id_pv = $id_pv"
)[0];

$html = '
<body>
    <table cellpadding="20px" cellspacing="0" width="100%">
        <tr>
            <td width="20%" style="text-align: center;"><img src="../assets/img/Logo pnm.png" width="30%"></td>
            <td width="60%" style="text-align: center;">
                <h3>PAYMENT VOUCHER</h3>
                <p><strong>PNM/F-09.01/03C/RO</strong></p>
            </td>
            <td width="20%" style="text-align: center;"><img src="../assets/img/Logo Mekaar2.png" width="30%"></td>
        </tr>
    </table>
    <table border="1" cellpadding="10px" cellspacing="0" width="100%" style="font-size: 9px">
        <tr>
            <td width="30%">
                Bank Name
                <br>
                Bank Account No.
            </td>
            <td>: ' . $pv["nama_bank"] . '
            <br>: ' . $pv["no_bank"] . '
            </td>
        </tr>
        <tr>
            <td width="30%">
                Transaction Date
                <br>
                PNM Bilyet Giro
            </td>
            <td>: ' . date('d F Y', strtotime($pv["pv_date"])) . '
            <br>: ' . $pv["pnm_bilyet"] . '
            </td>
        </tr>
        <tr>
            <td width="30%">
                Description
            </td>
            <td>:</td>
        </tr>

        <tr>
            <td colspan="2">' . $pv["deskripsi"] . '</td>
        </tr>
    </table>

    <table border="1" cellpadding="10px" cellspacing="0" width="100%" style="font-size: 9px">
        <tr style="background-color: #6495ED; font-style: bold; text-align: center">
            <td>DR / CR</td>
            <td>Account Name</td>
            <td>Account No.</td>
            <td>Amount</td>
        </tr>';
foreach ($pv_detail as $pvd) {
    $html .=
        '<tr>
            <td style="text-align: center;">' . $pvd["drcr"] . '</td>
            <td>' . $pvd["nama_akun"] . '</td>
            <td>' . $pvd["no_akun"] . '</td>
            <td style="text-align: right;">Rp. ' . number_format($pvd["jumlah"], 2, ',', '.') . '</td>
        </tr>';
}
$html .=
    '<tr>
            <td colspan="3" style="text-align: center;">
                TOTAL
            </td>
            <td style="text-align: right;">Rp. ' . number_format($pv_amount["amount"], 2, ',', '.') . '</td>
        </tr>

        <tr style="background-color: #6495ED; font-style: bold;">
            <td style="text-align: center;" colspan="2">
                <p>Verified & Posted By <br> (Sign, Date & Initial)</p>
            </td>
            <td style="text-align: center;" colspan="2">
                <p>Verified & Posted by <br> (Sign, Date & Initial)</p>
            </td>
        </tr>

        <tr>
            <td colspan="2">
                <br><br><br><br>
            </td>
            <td colspan="2"></td>
        </tr>
    </table>
</body>
';

$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A5-P']);

// $stylesheet = file_get_contents('style_print.css');
// $mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML("$html", \Mpdf\HTMLParserMode::HTML_BODY);
$mpdf->Output('PV ' . $pv["pv_date"] . '.pdf', 'I');
// $mpdf->Output();