<?php

namespace App\Http\Controllers;

use Dompdf\Css\Stylesheet;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    function setPdfFonts(
        $fontDirectory,
        $fontFamily,
        $fontNameNormalNormal,
        $fontNameItalicNormal,
        $fontNameNormalBold,
        $fontNameItalicBold,
    ): void
    {
        $options = new Options();
        $options->setChroot($fontDirectory);
        $pdfCoder = new Dompdf($options);

        $pdfCoder->getFontMetrics()->registerFont(
            ['family' => $fontFamily, 'style' => 'normal', 'weight' => 'normal'],
            $fontDirectory . '/' . $fontNameNormalNormal
        );
        $pdfCoder->getFontMetrics()->registerFont(
            ['family' => $fontFamily, 'style' => 'italic', 'weight' => 'normal'],
            $fontDirectory . '/' . $fontNameItalicNormal
        );
        $pdfCoder->getFontMetrics()->registerFont(
            ['family' => $fontFamily, 'style' => 'normal', 'weight' => 'bold'],
            $fontDirectory . '/' . $fontNameNormalBold
        );
        $pdfCoder->getFontMetrics()->registerFont(
            ['family' => $fontFamily, 'style' => 'italic', 'weight' => 'bold'],
            $fontDirectory . '/' . $fontNameItalicBold
        );
    }

    public function get_analytic_pdf($forklift_id)
    {
        $html = view('pdf.analytics_pdf', [
            'forklift_id' => $forklift_id
        ])->render();

        //dd(public_path() . '/assets/fonts/SanFrancisco');
        $fontDirectory = public_path() . '/assets/fonts/SanFrancisco'; //change to the diretory where you fonts is located on your server
        $this->setPdfFonts(
            $fontDirectory,
            'SF UI Text',
            'SFUIText-Regular.ttf',
            'SFUIText-Italic.ttf',
            'SFUIText-Bold.ttf',
            'SFUIText-BoldItalic.ttf',
        );

        $options = new Options();
        $options->setChroot($fontDirectory);

        /*
        [
            'enable_remote' => true,
        ]
        */

        $pdfCoder = new Dompdf([
            'enable_remote' => true, // Разрешить загружать файлы (картинки)
        ]);

        // Регистрация шрифтов
        // you have to set the style (e.g. italic) and weight (e.g. bold) normal

        $pdfCoder->getFontMetrics()->registerFont(
            ['family' => 'SF UI Text', 'style' => 'normal', 'weight' => 'normal'],
            $fontDirectory . '/SFUIText-Regular.ttf'
        );


        $pdfCoder->loadHtml($html);
        $pdfCoder->setCss(new Stylesheet($pdfCoder));
        $pdfCoder->render();
        $pdfCoder->stream('', [
            'compress' => true,
            'Attachment' => false,
        ]);
        return view('pdf.analytics_pdf', [
            'forklift_id' => $forklift_id
        ]);
    }
}
