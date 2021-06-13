<?php
    //Configurando pdf
    require('libs\fpdf.php');
    

    //Se obtienen los datos de la base de datos
    //Identidad
    $nombre = "Nombre";
    $paterno = "ApellidoPaterno";
    $materno = "ApellidoMaterno";
    $boleta = "0123456789";
    $nacimiento = "01/01/2000";
    $genero = "Masculino";
    $curp = "AAAA001122BBBCCCA0";
    //Contacto
    $calle = "Calle y numero";
    $colonia = "Colonia";
    $cp = "C.P";
    $tel = "55-55-55-55-55";
    $email = "example@example.com";
    //Procedencia
    $procedencia = "Escuela de procedencia";
    $entidad = "Entidad federativa";
    $promedio = "10.00";
    $opcion = "Primera opción";
    //Horario
    $fechaAplicacion = "02/02/2021";
    $hora = "13:50";
    $laboratorio = "16"; 


    //Se crea el pdf
    class PDF extends FPDF{
        // Cabecera de página
        function Header(){
            $this->Image('res\IPN.png',10,8,33);
            $this->Image('res\ESCOM.PNG',160,8,33);
            $this->SetFont('Arial','B',15);
            $this->Cell(80);
            $this->Cell(30,10,'Datos del Alumno',0,0,'C');
            $this->Ln(30);
        }
    }

    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    //Seccion Identidad
    $pdf->SetFont('Arial','B',12);
    $pdf->SetFillColor(200,220,255);
    $pdf->Cell(0,8,utf8_decode("Identidad"),0,1,'C',1);
    $pdf->Ln(5);
    //Datos identidad
    $pdf->SetFillColor(255,255,255);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(45,10,utf8_decode("Nombre del Alumno:"));
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0,10,utf8_decode("$paterno $materno $nombre"));
    $pdf->Ln(10);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(16,10,utf8_decode("Boleta:"));
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0,10,utf8_decode("$boleta"));
    $pdf->Ln(10);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(45,10,utf8_decode("Fecha de nacimiento:"));
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0,10,utf8_decode("$nacimiento"));
    $pdf->Ln(10);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(18,10,utf8_decode("Género:"));
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0,10,utf8_decode("$genero"));
    $pdf->Ln(10);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(15,10,utf8_decode("CURP:"));
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0,10,utf8_decode("$curp"));
    $pdf->Ln(15);
    //Seccion Contacto
    $pdf->SetFont('Arial','B',12);
    $pdf->SetFillColor(200,220,255);
    $pdf->Cell(0,8,utf8_decode("Contacto"),0,1,'C',1);
    $pdf->Ln(5);
    //Datos Contacto
    $pdf->SetFillColor(255,255,255);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(22,10,utf8_decode("Direccion:"));
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0,10,utf8_decode("Calle $calle Col. $colonia CP. $cp"));
    $pdf->Ln(10);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(20,10,utf8_decode("Teléfono:"));
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0,10,utf8_decode("$tel"));
    $pdf->Ln(10);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(40,10,utf8_decode("Correo electrónico:"));
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0,10,utf8_decode("$email"));
    $pdf->Ln(15);
    //Seccion Procedencia
    $pdf->SetFont('Arial','B',12);
    $pdf->SetFillColor(200,220,255);
    $pdf->Cell(0,8,utf8_decode("Procedencia"),0,1,'C',1);
    $pdf->Ln(5);
    //Datos Contacto
    $pdf->SetFillColor(255,255,255);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(52,10,utf8_decode("Escuela de procedencia:"));
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0,10,utf8_decode("$procedencia"));
    $pdf->Ln(10);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(40,10,utf8_decode("Entidad federativa:"));
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0,10,utf8_decode("$entidad"));
    $pdf->Ln(10);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(38,10,utf8_decode("Promedio escolar:"));
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0,10,utf8_decode("$promedio"));
    $pdf->Ln(10);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(18,10,utf8_decode("Opción:"));
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0,10,utf8_decode("Escom corresponde a la $opcion"));
    $pdf->Ln(15);
    //Seccion Horario
    $pdf->SetFont('Arial','B',12);
    $pdf->SetFillColor(128, 222, 234);
    $pdf->Cell(0,8,utf8_decode("Horario"),0,1,'C',1);
    $pdf->Ln(5);
    //Datos horaio
    $pdf->SetFillColor(255,255,255);
    $pdf->SetFont('Arial','',12);
    $pdf->MultiCell(0,5,utf8_decode("A continuación se presenta la información sobre el horario del examen, es importante revisar fecha, hora y laboratorio de aplicación."));
    $pdf->Ln(5);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(20,10,"");
    $pdf->Cell(45,10,utf8_decode("Fecha de aplicación:"));
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(60,10,utf8_decode("$fechaAplicacion"));
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(14,10,utf8_decode("Hora:"));
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0,10,utf8_decode("$hora"));
    $pdf->Ln(10);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(20,10,"");  
    $pdf->Cell(28,10,utf8_decode("Laboratorio:"));
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0,10,utf8_decode("$laboratorio"));
    $pdf->Ln(10);
    $pdf->Output();


    //Enviando correo----------------------------------------------------------------
    //Datos
    $from = "Equipo4.Escom@gmail.com"; 
    $subject = "Comprobante de registro"; 
   $message = "<p>Alumno $nombre: Ha recibido su comprobante de registro.</p>";
    $filename = "Comprobante.pdf"; // Nombre del documento
    
    $separator = md5(time()); //Hash para enviar el documento
    $eol = PHP_EOL; //Simbolo fin de linea
    
    //Se codifica el documento
    $pdfdoc = $pdf->Output("", "S");
    $attachment = chunk_split(base64_encode($pdfdoc));
    
    //Se crea el encabezado
    $headers  = "From: ".$from.$eol;
    $headers .= "MIME-Version: 1.0".$eol; 
    $headers .= "Content-Type: multipart/mixed; boundary=\"".$separator."\"";
    
    //Cuerpo del mensaje
    $body = "--".$separator.$eol;
    $body .= "Content-Transfer-Encoding: 7bit".$eol.$eol;
    $body .= "Alumno $nombre: Ha recibido su comprobante de registro.\nFavor de no perderlo. Gracias!".$eol;
    
    //Metadatos del mensaje
    $body .= "--".$separator.$eol;
    $body .= "Content-Type: text/html; charset=\"iso-8859-1\"".$eol;
    $body .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
    $body .= $message.$eol;
    
    //Se adjunta el documento
    $body .= "--".$separator.$eol;
    $body .= "Content-Type: application/octet-stream; name=\"".$filename."\"".$eol; 
    $body .= "Content-Transfer-Encoding: base64".$eol;
    $body .= "Content-Disposition: attachment".$eol.$eol;
    $body .= $attachment.$eol;
    $body .= "--".$separator."--";
    
    //Se envia el mensaje
    $mail = mail($email, $subject, $body, $headers);

    // if($mail){
    //     echo "correo enviado";  
    // }else{
    //     echo "Error al enviar correo";    
    // }

?>