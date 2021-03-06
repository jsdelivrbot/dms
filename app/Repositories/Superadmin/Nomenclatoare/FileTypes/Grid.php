<?php namespace App\Repositories\Superadmin\Nomenclatoare\FileTypes;

use \App\Comptechsoft\Datatable\Column;
use \App\Comptechsoft\Datatable\Header;
use \App\Comptechsoft\Datatable\Ajax;
use \App\Comptechsoft\Datatable\Order;
use \App\Comptechsoft\Datatable\Filter;

class Grid extends \App\Comptechsoft\Datatable\Grid
{

	public function __construct()
	{

		$this->noGlobalFilter();
		/*
		 * II asociez ID la grid
		 */
		$this->id('gridFileTypes');

		/*
		 * In ce fisier sa se genereze js-ul pentru .DataTable({...});
		 */
		$this->js( str_replace('\\', '/', public_path('custom/js/file-types/grid.js') ));

		/*
		 * De la ce ruta vine raspunsul cu randuri
		 */
		$this->ajax( (new Ajax())->setUrl(\URL::route('superadmin.nomenclatoare.file-types.data-source'))->setExtra(['a' => 1, 'b' => 2]) );
		
		/*
		 * Care coloana contine ordinea initiala
		 */
		$this->order( (new Order())->setColumn(1)->setDirection('asc') );

		/*
		 * Definirea coloanelor
		 **/
		$this->addColumns([

			'rec-no' => 
				(new Column())
				->withHeader( 
					(new Header())
					->with(['caption' => '#', 'width' => 5])
				)
				->alignRight(),

			'id' => 
				(new Column())
				->withHeader( 
					(new Header())
					->with(['caption' => 'ID', 'width' => 5])
				)
				->alignCenter()
				->orderable(),

			'categorie' => 
				(new Column())
				->withHeader( 
					(new Header())
					->with(['caption' => 'Denumire', 'width' => 50])
					->withFilter( (new Filter())->view('superadmin.nomenclatoare.file-types.grid.filters.categorie') )
				)->orderable(),

			'extensie' =>
				(new Column())
				->withHeader(
					(new Header())
					->with(['caption' => 'Extensie', 'width' => 35])
					->withFilter( (new Filter())->view('superadmin.nomenclatoare.file-types.grid.filters.extensie') )
				),

			'actions' =>
				(new Column())
				->withHeader(
					(new Header())
					->with(['caption' => 'Acţiuni'])
				),


		
		]);

	}
}