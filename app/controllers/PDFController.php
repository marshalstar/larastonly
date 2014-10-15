<?php
class PDFController extends BaseController
{
	public function imprimir()
	{
		$pdf = new Pdf;
		$pdf->addPage('http://localhost:8000/checklists/nyw');
		$pdf->send();
	}
}