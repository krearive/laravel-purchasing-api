<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function totalPermintaan(Request $request)
    {
        $data = DB::select("
        WITH request_details AS (
            SELECT TO_CHAR(pr.doc_date, 'YYYY-MM') AS bulan, d.name AS division_name
            FROM purchase_requests pr
            JOIN divisions d ON pr.division_id = d.id
            JOIN purchase_request_details prd ON pr.id = prd.purchase_request_id
        ),
        total_division AS (
            SELECT bulan, division_name, COUNT(*) AS total_permintaan
            FROM request_details
            GROUP BY bulan, division_name
        )
        SELECT * FROM total_division
        ORDER BY bulan, division_name
    ");

        return response()->json($data);
    }

    public function kategoriTerbanyak()
    {
        $data = DB::select("
        WITH request_details AS (
            SELECT TO_CHAR(pr.doc_date, 'YYYY-MM') AS bulan, d.name AS division_name, c.name AS category_name
            FROM purchase_requests pr
            JOIN purchase_request_details prd ON pr.id = prd.purchase_request_id
            JOIN divisions d ON pr.division_id = d.id
            JOIN categories c ON prd.category_id = c.id
        ),
        aggregated AS (
            SELECT bulan, division_name, category_name, COUNT(*) AS jumlah_per_kategori
            FROM request_details
            GROUP BY bulan, division_name, category_name
        ),
        ranked AS (
            SELECT *, ROW_NUMBER() OVER (PARTITION BY bulan, division_name ORDER BY jumlah_per_kategori DESC) AS rn
            FROM aggregated
        )
        SELECT bulan, division_name, category_name AS kategori_terbanyak
        FROM ranked
        WHERE rn = 1
        ORDER BY bulan, division_name
    ");

        return response()->json($data);
    }

    public function laporanPermintaan(Request $request)
    {
        $data = DB::select("
        WITH request_details AS (
            SELECT
                TO_CHAR(pr.doc_date, 'YYYY-MM') AS bulan,
                d.name AS division_name,
                c.name AS category_name
            FROM purchase_requests pr
            JOIN purchase_request_details prd ON pr.id = prd.purchase_request_id
            JOIN divisions d ON pr.division_id = d.id
            JOIN categories c ON prd.category_id = c.id
        ),
        aggregated AS (
            SELECT
                bulan,
                division_name,
                category_name,
                COUNT(*) AS jumlah_per_kategori
            FROM request_details
            GROUP BY bulan, division_name, category_name
        ),
        total_division AS (
            SELECT
                bulan,
                division_name,
                SUM(jumlah_per_kategori) AS total_permintaan
            FROM aggregated
            GROUP BY bulan, division_name
        ),
        ranked AS (
            SELECT
                a.*,
                td.total_permintaan,
                ROW_NUMBER() OVER (PARTITION BY a.bulan, a.division_name ORDER BY
                a.jumlah_per_kategori DESC) AS rn
            FROM aggregated a
            JOIN total_division td ON a.bulan = td.bulan AND a.division_name = td.division_name
        )
        SELECT
            bulan AS \"Bulan\",
            division_name AS \"Divisi\",
            total_permintaan AS \"Total Permintaan\",
            category_name AS \"Kategori Terbanyak\"
        FROM ranked
        WHERE rn = 1
        ORDER BY bulan, division_name;
    ");

        return response()->json($data);
    }
}
