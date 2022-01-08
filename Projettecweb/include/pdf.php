<?php
require_once("dbaccess.php");
    function fetchdata(){
        $dba = new Dbaccess();
        $dba->query("select * from pdf where commande_num = '".$_POST['icm']."'");
        $prod = $dba->single();
        $output = '';
        $output .="<p>Commande ID :".strval($prod->commande_num)."</p><p>Date : ".strval($prod->commande_date)."</p><p>Client id : ".strval($prod->client_id)."</p><p>Client Email : ".strval($prod->client_email)."</p>";
        $output .='<table style="border:1px solid black"> <tr id="entete" style="background:lightgreen">
        <th>reference de produit</th>
        <th>Prix de vente</th>
        <th>quantite</th>
</tr>';
        $db = new Dbaccess();
        $db->query("select * from pdf where commande_num = '".$_POST['icm']."'");
        $products = $db->resultSet();
        foreach($products as $product){
            $output .= "<tr>
            <th>".strval($product->P_reference)."</th>  
            <th>".$product->P_prix_unitaire * $product->commande_quantite."</th>
            <th>".strval($product->commande_quantite)."</th>
        </tr>";
        }
        $output .= "</table>";
        return $output;
    }
    require_once('tcpdf_min/tcpdf.php');  
        $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Facture");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 12);  
      $obj_pdf->AddPage(); 
      $content = '';
      $content .= fetchdata();
      ob_end_clean();
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('facture.pdf', 'D');

?>