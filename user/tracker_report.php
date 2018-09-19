<?php
require_once( '../library/mpdf.php');
$stylesheet = file_get_contents('../resources/pdfLayout.css');
session_start();
// Setup PDF
date_default_timezone_set('Africa/Nairobi');
$d=new DateTime();
$dat=$d->format('d/m/y  h:i:s a');
$sid="1234567";
//$mpdf = new mPDF('utf-8', 'A4',0,0,5,5,15,16,4,9,'P');
$mpdf = new mPDF('utf-8', 'A4',0,'',5,10,15,16,4,9,'P');
$mpdf->SetDisplayMode(real,'default');
require_once('../config/db_connect.php');
//require_once('../include/session2.php');
//require_once('include/functions.php');
$mpdf->showWatermarkImage=true;
//$mpdf->SetWatermarkImage('../resources/img/logo1.png ');
//$mpdf->showWatermarkText = true;
//$mpdf->WriteHTML('<watermarktext content="MTRH SYSTEM" alpha="0.1" />');
$mpdf->setAutoTopMargin = 'stretch';
$mpdf->setAutoBottomMargin = 'stretch';
//$fullname= $row['first_name'];
$mpdf->SetHTMLFooter('<div class="pdf-footer">
<strong>Disclaimer :</strong> <i>This is a system generated report Form and does not require signature.</i>
<hr>
<i>Generated and Printed on '.$dat.' </i>
</div>');

$mpdf->WriteHTML($stylesheet,1);
$html='
  <html>
<body> <div class="container" >
     <div class="row-fluid "  >
              <img src="../resources/img/logo1.png" style="padding-left:39%" alt="School Logo" class="logo" width="120" height="100"/>
<h3 style="padding-top:0px; padding-left:4%; ">MASINDE MULIRO UNIVERSITY OF SCIENCE & TECHNOLOGY </h3>
            <h4 style="padding-left:26%;">School of Computing and Informatics</h4>
              </div>
              <div class="row-fluid"  style="padding-left:10%; padding-right:-5%;">
           <div class="span6 pull-left" style="text-align:left;margin-top:-20px;"><br/>
           Tel. No: 020-2063540 <br/>
           Email: <u> info@mmust.ac.ke</u><br/>
           Website: <u>www.mmust.ac.ke</u><br/>
           </div>

           <div class="span6" style="text-align:left; padding-left:74%; margin-top:-65px; ">P.O Box 190 <br/>
                                               Kakamega-50100 <br/>
                                               Kenya.<br/>
           </div>
           </div>
           <div class=" row-fluid1"  style="padding-left:10%; padding-right:-5%;">
                      <hr/>  </div>
           <div class=" row-fluid1"  style="padding-left:10%; padding-right:-5%;" style="text-align:center">
           <br/>                DOCUMENT TRACKER REPORT</strong></u>
                      </div>
                         <br/>

           <div class="row-fluid " style="padding-left:10%; padding-right:-5%;">
                          <table class="table table-bordered">
                                     <thead>
                                     <tr>
                                         <th>NO.</th>
                                         <th>DOCUMENT.</th>
                                         <th>RECEIVER</th>
                                         <th>TRACK DATE</th>
                                         <th>STATUS </th>

                                     </tr>
                                     </thead>
                                     <tbody>';
                                     //populate the table for viewing attachment details
                                     $count=1;

                         $track = $conn->query("SELECT
													    registered_documents.*
																	    , sent_documents.*
																	    , state.*
                                                                        ,users.*
																	FROM
																	    doctrack.sent_documents
																	    INNER JOIN doctrack.registered_documents
																	        ON (sent_documents.doc_id = registered_documents.id)
																	    INNER JOIN doctrack.state
																	        ON (sent_documents.status_id = state.status_id)
                                                                            INNER JOIN doctrack.users
                                                                            ON(sent_documents.receiver=users.pfNumber)
																	WHERE sent_documents.sender='$_SESSION[user]'");

                                    while($row=mysqli_fetch_assoc($track)){
                                       $html.= '<tr>
                                       <td>'.$count.'</td>
                                       <td>'. $row['document_name'].'</td>
                                       <td>'. $row['fname']." ".$row['lname'].'</td>
                                       <td>'.$row['date_received'].'</td>
                                       <td>'.$row['status'].'</td>

                                       </tr>';
                                    $count ++;
                                   }
                                $html .='</tbody>
                                     </table>




 </p>

              </div> </div>  </body>
           </html>';

$mpdf->WriteHTML($html,2); // Writing html to pdf

//$mpdf->Output(); // For sending Output to browser
$mpdf->Output('MMUST_Doctrack.pdf','I'); // For Download
exit;
?>