<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'homeController@index');

Route::get('/registrarAlumno', 'alumnosController@registrar');
Route::post('/guardarAlumno', 'alumnosController@guardar');
Route::get('/consultarAlumnos', 'alumnosController@consultar');
Route::post('/alumnosPDF', 'alumnosController@pdf');
Route::get('/eliminarAlumno/{id}', 'alumnosController@eliminar');
Route::get('/editarAlumno/{id}', 'alumnosController@editar');
Route::post('/actualizarAlumno/{id}', 'alumnosController@actualizar');

Route::get('/registrarMaestro', 'maestrosController@registrar');
Route::post('/guardarMaestro', 'maestrosController@guardar');
Route::get('/consultarMaestro', 'maestrosController@consultar');
Route::get('/eliminarMaestro/{id}', 'maestrosController@eliminar');
Route::get('/editarMaestro/{id}', 'maestrosController@editar');
Route::post('/actualizarMaestro/{id}', 'maestrosController@actualizar');

Route::get('/registrarGrupo', 'gruposController@registrar');
Route::post('/guardarGrupo', 'gruposController@guardar');
Route::get('/consultarGrupos', 'gruposController@consultar');
Route::get('/eliminarGrupo/{id}', 'gruposController@eliminar');
Route::get('/editarGrupo/{id}', 'gruposController@editar');
Route::post('/actualizarGrupo/{id}', 'gruposController@actualizar');

Route::get('/registrarGrupoxAlumnos', 'groupXalController@registrar');
Route::post('/guardarGruposxAlumnos', 'groupXalController@guardar');
Route::get('/consultarGrupoxAlumnos', 'groupXalController@consultar');
Route::get('/eliminarGroupxAlumnos/{id_alumno}&&{id_grupo}', 'groupXalController@eliminar');
Route::get('/editarGroupxAlumnos/{id_alumno}&&{id_grupo}', 'groupXalController@editar');
Route::post('/actualizarGroupxAlumnos/{alumno}&&{grupo}&&{maestro}', 'groupXalController@actualizar');

