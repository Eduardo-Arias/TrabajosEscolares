<?php
$sql = "Select cve_pro,desc_pro from proyecto";

			$resul = $this->consultarQuery($sql);

			if ($resul->num_rows > 0) {
				
				if (PHP_SAPI == 'cli' ) die('Este archivo solo se puede descargar mediante un navegador web.');

				// Se crea el objeto PHPExcel
				$objPHPExcel = new PHPExcel();

				// Se asignan las propiedades del libro
				$objPHPExcel->getProperties()->setCreator("JARIAS") //Autor
									 ->setLastModifiedBy("JARAIS") //Ultimo usuario que lo modificó
									 ->setTitle("Reporte de proyectos")
									 ->setSubject("Reporte de proyectos")
									 ->setDescription("Reporte de proyectos creados")
									 ->setKeywords("reporte proyecto")
									 ->setCategory("Reporte excel");

				$tituloReporte = "Relación de Proyectos Creados";
				$titulosColumnas = array('Clave del proyecto', 'Descripción del Proyecto');
				
				$objPHPExcel->setActiveSheetIndex(0)
		        		    ->mergeCells('A1:B1');
								
				// Se agregan los titulos del reporte
				$objPHPExcel->setActiveSheetIndex(0)
							->setCellValue('A1',$tituloReporte)
		        		    ->setCellValue('A3',  $titulosColumnas[0])
				            ->setCellValue('B3',  $titulosColumnas[1]);
				
				//Se agregan los datos de los alumnos
				$i = 4;
				while ($fila = $resultado->fetch_array()) {
					$objPHPExcel->setActiveSheetIndex(0)
		        		    ->setCellValue('A'.$i,  $fila['cve_pro'])
				            ->setCellValue('B'.$i,  $fila['desc_pro']);
							$i++;
				}
						// Se asigna el nombre a la hoja
				$objPHPExcel->getActiveSheet()->setTitle('Proyectos');

				// Se activa la hoja para que sea la que se muestre cuando el archivo se abre
				$objPHPExcel->setActiveSheetIndex(0);
				// Inmovilizar paneles 
				//$objPHPExcel->getActiveSheet(0)->freezePane('A4');
				$objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0,4);

				// Se manda el archivo al navegador web, con el nombre que se indica (Excel2007)
				header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
				header('Content-Disposition: attachment;filename="Reportedealumnos.xlsx"');
				header('Cache-Control: max-age=0');

				$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
				$objWriter->save('php://output');
				exit;
	
			}else{
				print_r('No hay resultados para mostrar');
			}