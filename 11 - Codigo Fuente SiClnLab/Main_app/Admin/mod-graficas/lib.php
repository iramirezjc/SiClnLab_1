<?php
class Simple_grafica_barras
{
	private $ancho;
	private $alto;
	private $titulo;
	private $dependientes;
	private $independientes;
	private $etiquetas;
	private $datos;
	var $color= "#BE81F7";
	var $ancho_barra=30;
	function definir($alto,$ancho,$titulo,$dependientes,$independientes,$etiquetas,$datos)
	{
		$this->ancho=$ancho;
		$this->alto=$alto;
		$this->titulo=$titulo;
		$this->dependientes=$dependientes;
		$this->independientes=$independientes;
		$this->etiquetas=$etiquetas;
		$this->datos=$datos;
	}
	function imprimir_grafica()
	{
		require_once ('src/jpgraph.php');
 		require_once ('src/jpgraph_bar.php');
 		$grafico = new Graph($this->ancho, $this->alto, 'auto');
		$grafico->SetScale("textint");
		$grafico->title->Set($this->titulo);
		$grafico->xaxis->title->Set($this->independientes);
		$grafico->xaxis->SetTickLabels($this->etiquetas);
		$grafico->yaxis->title->Set($this->dependientes);
		$barplot1 =new BarPlot($this->datos);
		$barplot1->SetFillGradient($this->color, $this->color, GRAD_HOR);
		$barplot1->SetWidth($this->ancho_barra);
		$grafico->Add($barplot1);
		$grafico->Stroke();
	}
}

class Grafica_de_lineas
{
	private $ancho;
	private $alto;
	private $titulo;
	private $dependientes;
	private $independientes;
	private $lineas=array();
	private $color=array();
	private $datos=array();
	var $escalatiempo=array('Ene','Feb','Mar','Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct','Nov', 'Dic');
	
	function definir($alto,$ancho,$titulo,$dependientes,$independientes)
	{
		$this->ancho=$ancho;
		$this->alto=$alto;
		$this->titulo=$titulo;
		$this->dependientes=$dependientes;
		$this->independientes=$independientes;
	}
	
	function agregar_linea($etiqueta,$datos,$color)
	{
		array_push($this->lineas,$etiqueta);
		array_push($this->datos,$datos);
		array_push($this->color,$color);
	}
	
	function imprimir_grafica()
	{
		require_once ('src/jpgraph.php');
		require_once ('src/jpgraph_line.php');
		$grafica = new Graph($this->ancho,$this->alto);
		$grafica->SetScale("textlin");
		$theme_class=new UniversalTheme;
		$grafica->SetTheme($theme_class);
		$grafica->img->SetAntiAliasing(false);
		$grafica->title->Set($this->titulo);//se coloca el TITULO DE LA GRAFICA
		$grafica->SetBox(false);
		$grafica->img->SetAntiAliasing();
 		$grafica->yaxis->HideZeroLabel();
 		$grafica->yaxis->HideLine(false);
 		$grafica->yaxis->HideTicks(false,false);
 		$grafica->xgrid->Show();
		$grafica->xgrid->SetLineStyle("solid");
		$grafica->yaxis->title->Set($this->dependientes);
		$grafica->xaxis->title->Set($this->independientes);
		$grafica->xaxis->SetTickLabels($this->escalatiempo);//aqui se define el nombre del eje X
		$grafica->xgrid->SetColor('#E3E3E3');
		
		$numlineas=count($this->lineas);
		
		for($i=0;$i<$numlineas;$i++){
			$linea = new LinePlot($this->datos[$i]);
			$grafica->Add($linea);
			$linea->SetColor($this->color[$i]);
			$linea->SetLegend($this->lineas[$i]);
		}
		$grafica->legend->SetFrameWeight(1);
 		$grafica->legend->SetPos(0.5,0.98,'center','bottom');
 		$grafica->Stroke();
		
	}	
}
class Grafica_de_pastel
{
	private $ancho;
	private $alto;
	private $titulo;
	private $etiquetas=array();
	private $datos=array();
	private $color=array();
	var $subtitulo="";
	var $etiqdivnumcol=4;
	
	function definir($alto,$ancho,$titulo)
	{
		$this->ancho=$ancho;
		$this->alto=$alto;
		$this->titulo=$titulo;
	}
	function agregar_estadistica($etiqueta,$dato,$color)
	{
		array_push($this->etiquetas,"$etiqueta (%1.1f%%)");
		array_push($this->datos,$dato);
		array_push($this->color,$color);
	}
	function imprimir_grafica()
	{
		include ("src/jpgraph.php");
		include ("src/jpgraph_pie.php");
		$grafica = new PieGraph($this->ancho,$this->alto);
		$grafica->SetAntiAliasing();
		$grafica->title->SetFont(FF_ARIAL, FS_BOLD, 14);
		$grafica->title->Set($this->titulo);
		$grafica->title->SetMargin(0);
		$grafica->subtitle->SetFont(FF_ARIAL, FS_BOLD, 10);
		$grafica->subtitle->Set($this->subtitulo);
		$p1 = new PiePlot($this->datos);
		$p1->SetSliceColors($this->color);
		$p1->SetSize(0.3);
		$p1->SetCenter(0.5,0.47);
		$p1->value->Show();
		$p1->value->SetFont(FF_ARIAL,FS_NORMAL,10);
		$p1->SetLegends($this->etiquetas);
		$grafica->legend->SetPos(0.5,0.9,'center','bottom');
		$grafica->legend->SetColumns($this->etiqdivnumcol);
		$grafica->Add($p1);
		$grafica->Stroke();
	}
	
}

?>