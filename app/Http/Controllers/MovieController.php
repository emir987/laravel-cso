<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MovieController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		//sorter na osnovu baze (sql upit)
		$movies = Movie::orderBy('created_at', 'asc')->get();
		//filtriranje 
		// $name = $request->get('name');
		// $movies = Movie::where('name', $name)->get();


		//sorter na osnovu kolekcije (niz objekata koji nam je vratio model) => Movie::get() vraca kolekciju
		// $movies = Movie::get()->sortBy('created_at', 'asc');

		return view('movies.index', [
			'movies' => $movies
		]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('movies.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$validation = $request->validate(
			[
				'name' => 'required'
			]
		);
		//prvi nacin create sa nizom
		// $movie = Movie::create(
		//     [
		//         'name' => $request->get('name')
		//     ]
		// );

		//drugi nacin sa pravljenjem instance Movie
		// $movie = new Movie();
		// $movie->name = $request->get('name');
		// $movie->save();


		// treci nacin sa create i $requst->all() 
		$movie = Movie::create($request->all());


		return redirect()->route('movies.index');
	}

	public function show(int $id)
	{
		//findOrFail znaci da ukoliko ne nadje movie sa tim id nece dati gresku serverske strane
		// $movie = Movie::findOrFail($id);
		// $actors = $movie->actors;

		// return view('movies.show', [
		// 	'movie' => $movie,
		// 	'actors' => $actors

		// ]);


		$movie = Movie::with('actors')->findOrFail($id);

		//compact pravi  asocijatnivni niz od varijabli
		return view('movies.show', compact('movie'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$movie = Movie::find($id);
		return view('movies.edit', ["movie" => $movie]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		$movie = Movie::find($id);
		// $movie->name = $request->name;
		// $movie->save();

		// $movie->update(["name" => $request->get('name')]);

		$movie->update($request->all());

		return redirect()->route('movies.show', $id)->with('msg', 'Uspjesno izmjenjeno');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		Movie::find($id)->delete();
		// $movie->delete();

		return redirect()->route('movies.index')->with('msg', "Uspjesno obrisano");
	}
}
