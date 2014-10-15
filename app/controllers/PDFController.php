<?php
class PDFController extends BaseController
{
	public function imprimir()
	{
		$pdf = PDF::loadView('users.login');
		return $pdf->stream('teste.pdf');
	}
}