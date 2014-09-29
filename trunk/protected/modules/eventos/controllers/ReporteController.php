<?php

class ReporteController extends AweController {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';
    public $admin = false;
    public $defaultAction = 'index';

    public function filters() {
        return array(
            array('CrugeAccessControlFilter'),
        );
    }

    public function actionIndex() {
        $model = new Reporte;
        $evento_id = null;
        $sector_id = null;
        $subsector_id = null;
        $rama_actividad_id = null;
        $actividad_id = null;
        if (Yii::app()->request->isAjaxRequest) {
            if (isset($_GET['ajax']) && $_GET['ajax'] == 'reporte-grid') {
                if (isset($_GET['Reporte'])) {
                    $evento_id = $_GET['Reporte']['evento_id'];
                    $sector_id = $_GET['Reporte']['sector_id'];
                    $subsector_id = $_GET['Reporte']['subsector_id'];
                    $rama_actividad_id = $_GET['Reporte']['rama_actividad_id'];
                    $actividad_id = $_GET['Reporte']['actividad_id'];
                }
            }
        }
        $data = $model->search($evento_id, $sector_id, $subsector_id, $rama_actividad_id, $actividad_id);
        $this->render('index', array('model' => $model, 'data' => $data));
    }

    public function actionExportExcel() {
        $model = new Reporte;
        $evento_id = $_POST['Report']['evento_id'];
        $sector_id = $_POST['Report']['sector_id'];
        $subsector_id = $_POST['Report']['subsector_id'];
        $rama_actividad_id = $_POST['Report']['rama_actividad_id'];
        $actividad_id = $_POST['Report']['actividad_id'];
        $dataReporte = $model->search($evento_id, $sector_id, $subsector_id, $rama_actividad_id, $actividad_id);
        $objExcel = new PHPExcel();

        $objExcel->setActiveSheetIndex(0) // Titulo del reporte
                ->setCellValue('A1', 'Nombre')
                ->setCellValue('B1', 'Cédula')
                ->setCellValue('C1', 'Celular')  //Titulo de las columnas
                ->setCellValue('D1', 'Teléfono')
                ->setCellValue('E1', 'E-mail')
                ->setCellValue('F1', 'Dirección')
                ->setCellValue('G1', 'Sector')
                ->setCellValue('H1', 'Subsector')
                ->setCellValue('I1', 'Rama de Actividad')
                ->setCellValue('J1', 'Actividad');
        $id = 2;
        foreach ($dataReporte as $Reporte) {

            $objExcel->setActiveSheetIndex(0)
                    ->setCellValue('A' . $id, $Reporte['nombre_completo'])
                    ->setCellValue('B' . $id, $Reporte['cedula'])
                    ->setCellValue('C' . $id, $Reporte['celular'])
                    ->setCellValue('D' . $id, $Reporte ['telefono'])
                    ->setCellValue('E' . $id, $Reporte ['email'])
                    ->setCellValue('F' . $id, $Reporte['direccion'])
                    ->setCellValue('G' . $id, $Reporte['sector'])
                    ->setCellValue('H' . $id, $Reporte['subsector'])
                    ->setCellValue('I' . $id, $Reporte['rama_actividad'])
                    ->setCellValue('J' . $id, $Reporte['actividad']);
            $id++;
        }
        for ($i = 'A'; $i <= 'O'; $i++) {
            $objExcel->setActiveSheetIndex(0)->getColumnDimension($i)->setAutoSize(TRUE);
        }
        $objExcel->getActiveSheet()->setTitle('ReporteParticipantes');

//// Se activa la hoja para que sea la que se muestre cuando el archivo se abre
        $objExcel->setActiveSheetIndex(0);
//
//// Inmovilizar paneles
        $objExcel->getActiveSheet(0)->freezePane('A4');
        $objExcel->getActiveSheet(0)->freezePaneByColumnAndRow(1, 2);
// Se manda el archivo al navegador web, con el nombre que se indica, en formato 2007
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="ReporteParticipantes.xlsx"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;
    }

}
