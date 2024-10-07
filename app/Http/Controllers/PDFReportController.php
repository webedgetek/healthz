<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Elibyy\TCPDF\Facades\TCPDF;
use Illuminate\Support\Facades\File;


class PDFReportController extends Controller
{
    public function index()
    {
        $users = User::where('archived', '=', 'No')->get();

        if ($users->isEmpty()) {
            // Handle the case where no users are found
            return response('No users found to generate the report.', 404);
        }

        // define barcode style
        $style = array(
            'border' => 0,
            'vpadding' => 'auto',
            'hpadding' => 'auto',
            'fgcolor' => array(0,0,0),
            'bgcolor' => false, //array(255,255,255)
            'module_width' => 1, // width of a single module in points
            'module_height' => 1 // height of a single module in points
        );

        $output='';

        $output .= '<br>
        <table class="table" border="1" cellpadding="5"> 
                <tr>
                    <th colspan="6" style="background-color: #cbc8c7"><b>REGISTERED USERS</b></th>
                </tr>
                <tr>
                    <td width="6%" align="center" style="font-size:8px"><b>SN</b></td>    
                    <td width="29%" align="center" style="font-size:8px"><b>FULLNAME</b></td>  
                    <td width="14%" align="center" style="font-size:8px"><b>USERNAME</b></td>
                    <td width="15%" align="center" style="font-size:8px"><b>TELEPHONE</b></td>
                    <td width="24%" align="center" style="font-size:8px"><b>EMAIL</b></td>
                    <td width="12%" align="center" style="font-size:8px"><b>ROLE</b></td>
                </tr>
            <tbody>
         ';
                $count = 0;
           // Loop through each user
            foreach ($users as $user) {
                $count = $count + 1;
                $output .= '
                    <tr>
                        <td style="font-size:8px">'.strtoupper($count).'</td>    
                        <td style="font-size:8px">'.strtoupper($user->user_fullname).'</td>
                        <td style="font-size:8px">'.$user->username.'</td>  
                        <td style="font-size:8px">'.$user->telephone.'</td>
                        <td style="font-size:8px">'.$user->email.'</td>
                        <td style="font-size:8px">'.strtoupper($user->role).'</td>
                    </tr>
                ';
            }
            // Close the table
            $output .= '<tr>
                           <th colspan="6" style="background-color: #cbc8c7"><b>REGISTERED USERS</b></th>
                        </tr>
                    </tbody>
                </table>';

            // Add the PDF content
            $html = $output;
    
            $pdf = new TCPDF;
            $pdf::SetTitle('Users Report');
            $pdf::AddPage();
            $pdf::setImageScale(PDF_IMAGE_SCALE_RATIO);
            $pdf::SetMargins(10, 10, 10);
            $pdf::write2DBarcode('www.tcpdf.org', 'QRCODE,H', 140, 210, 50, 50, $style, 'N');
            $pdf::SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
            $pdf::setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
            $pdf::setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
            $pdf::SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
            $pdf::writeHTML($html, true, false, true, false, '');
            $pdf::Text(140, 205, 'QRCODE H - NO PADDING');
            $filename = 'user_list.pdf';
            $pdf::Output(public_path($filename), 'F');
            
                // return response()->download(public_path($filename));
            return response()->file(public_path($filename), [
                    'Content-Type' => 'application/pdf',
                    'Content-Disposition' => 'inline; filename="'.$filename.'"'
                ]);
    }
}
