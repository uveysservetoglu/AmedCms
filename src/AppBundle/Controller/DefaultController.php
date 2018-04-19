<?php

namespace AppBundle\Controller;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request){
        return new JsonResponse(array('result'=>'Success'));
    }
    public function memberJsonAction(){
        if (!file_exists("work/member.json")) {
            throw new \Exception("Geçersiz dosya.");
        }
        $fileContents  = file_get_contents("work/member.json");
        $decodeContent = json_decode($fileContents, true);
        $spreadsheet   = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'mobilPhone');
        $sheet->getStyle("A1")->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);
        $loop = 2;
        foreach($decodeContent ['RECORDS'] as $item){
            $extra_info = json_decode($item['extra_info']);
            $last = "";
            $mobile = null;
            $workMobile = null;
            if(isset($extra_info->mobileNumbers)){
                foreach ($extra_info->mobileNumbers as $itemMobile){
                    $mobile = $itemMobile;
                    break;
                }
            }

            if(isset($extra_info->mobilePhones)) {
                if (is_array($extra_info->mobilePhones)) {
                    $mobile = $extra_info->mobilePhones[count($extra_info->mobilePhones)-1];
                } else{
                    $mobile = $extra_info->mobilePhones;
                }
            }

            if(is_null($mobile) || $mobile == "" || $mobile == null){
                continue;
            }

            $mobile = str_replace(" ","",$mobile);
            $mobile = str_replace("-","",$mobile);


            if (strlen($mobile) > 10){
              $mobile = substr($mobile,2);
            }
            $mobile = (string)$mobile;
echo $mobile."<br>";
            $sheet->setCellValue('A'.$loop , ($mobile))->getStyle("A".$loop)->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);
            $loop++;
        }

        $xlsxWriter = new Xlsx($spreadsheet);
        $outputFile = "exported_file_".date_timestamp_get(new \DateTime());
        $xlsxWriter->save("work/{$outputFile}.xlsx");
        exit();
    }
    public function jsonToExcelAction(Request $request){
        if (!file_exists("work/{$request}.json")) {
            throw new \Exception("Geçersiz dosya.");
        }
        $fileContents  = file_get_contents("work/prod.json");
        $decodeContent = json_decode($fileContents, true);
        $spreadsheet   = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Durumu')
              ->setCellValue('B1', 'Stok Numarasi')
              ->setCellValue('C1', 'Paket Tipi')
              ->setCellValue('D1', 'Urun Adi')
              ->setCellValue('E1', 'Paket İçi Adet')
              ->setCellValue('F1', 'Koli İçerisindeki Paket Sayısı');
        $loop = 2;
        foreach($decodeContent ['RECORDS'] as $item){
            $extra_info = json_decode($item['Extra Info']);
            $packagingType = null;
            switch ($extra_info->packagingType){
                case 'p': $packagingType = 'Paket'; break;
                case 'a': $packagingType = 'Adet'; break;
                case 'k': $packagingType = 'Koli'; break;
            }
            $status = null;
            switch ($item['Durumu']){
                case 'a': $status = 'Aktif'; break;
                case 'i': $status = 'Aktif Degil'; break;
                case 'p': $status = 'On Siparis'; break;
                case 'o': $status = 'Stokta Tukendi'; break;
            }
            $sheet->setCellValue('A'.$loop , $status)
                  ->setCellValue('B'.$loop , $item['Stok Numarasi'])
                  ->setCellValue('C'.$loop , $packagingType)
                  ->setCellValue('D'.$loop , $item['Urun Adi'])
                  ->setCellValue('E'.$loop , $extra_info->itemsInPackage)
                  ->setCellValue('F'.$loop , $extra_info->packagesInBox);
            $loop++;
        }
        $xlsxWriter = new Xlsx($spreadsheet);
        $outputFile = "exported_file_".date_timestamp_get(new \DateTime());
        $xlsxWriter->save("work/{$outputFile}.xlsx");
        exit();
    }

    public function crawlerAction(){

        $html = '<!DOCTYPE html>
	<html>
		<body>
			<table border="0" cellpadding="0" cellspacing="1">
				<tr>
					<td width="110" class="lightLink">Last Online</td>
					<td>11 hours ago</td>
				</tr>
				<tr>
					<td class="lightLink">Gender</td>
					<td>Not specified</td>
				</tr>
				<tr>
					<td class="lightLink">Birthday</td>
					<td>Some Date</td>
				</tr>
				<tr>
					<td class="lightLink">Location</td>
					<td>California, USA</td>
				</tr>
				<tr>
					<td class="lightLink">Website</td>
					<td><a href="http://www.example.net" target="_blank">www.example.net</a></td>
				</tr>
				<tr>
					<td class="lightLink">Join Date</td>
					<td>March 5, 2012</td>
				</tr>
				<tr>
					<td class="lightLink">Access Rank</td>
					<td>Member</td>
				</tr>
				<tr>
					<td class="lightLink">Anime List Views</td>
					<td>432</td>
				</tr>
				<tr>
					<td class="lightLink">Manga List Views</td>
					<td>340</td>
				</tr>
			</table>
		</body>
	</html>
	';
        $crawler = new Crawler('http://www.ford.com.tr/ticari-araclar');
        //$crawler = $crawler->link();
        $crawler = $crawler->filter("//ul[@id=\"xAxisView\"]/li");
        $nodeValues = $crawler->each(
            function (Crawler $node, $i) {
                $first = $node->children()->first()->text();
                $last = $node->children()->last()->text();
                return array($first, $last);
            }
        );
        echo "<pre>";
        print_r($nodeValues);
        die();
    }
}
