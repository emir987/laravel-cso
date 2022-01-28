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
	public function index()
	{
		//filter na osnovu baze (sql upit)
		$movies = Movie::orderBy('created_at', 'asc')->get();

		//filter na osnovu kolekcije (niz objekata koji nam je vratio model) => Movie::get() vraca kolekciju
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
		// $movie = Movie::create(
		//     [
		//         'name' => $request->get('name')
		//     ]
		// );

		$movie = new Movie();
		$movie->name = $request->get('name');
		$movie->save();

		return redirect()->route('movies.index');
	}

	public function show(int $id)
	{
		$movie = Movie::find($id);

		return view('movies.show', [
			'movie' => $movie
		]);
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
		Movie::find($id)->update($request->all());

		// return redirect('movies/' . $id)->with('msg', 'Uspjesno zamjenjeni podaci');
		return redirect()->route('movies.show', $id)->with('msg', 'Uspjesno zamjenjeni podaci');
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
		return redirect()->route('movies.index')->with('Uspjesno obrisano');
	}
}
