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

Route::get('/registrarAlumno','alumnosController@registrar');
Route::post('/guardarAlumno', 'alumnosController@guardar');
Route::get('/consultarAlumnos', 'alumnosController@consultar');
//Route::get('/cargarMaterias/{id}', 'materiasController@cargar');
Route::get('/eliminarAlumno/{id}', 'alumnosController@eliminar');
Route::get('/editarAlumno/{id}', 'alumnosController@editar');
Route::post('/actualizarAlumno/{id}', 'alumnosController@actualizar');
Route::get('/alumnosPDF', 'alumnosController@pdf');

Route::get('/registrarMaestro', 'maestrosController@registrar');
Route::post('/guardarMaestro', 'maestrosController@guardar');
Route::get('/consultarMaestro', 'maestrosController@consultar');
Route::get('/eliminarMaestro/{id}', 'maestrosController@eliminar');
Route::get('/editarMaestro/{id}', 'maestrosController@editar');
Route::post('/actualizarMaestro/{id}', 'maestrosController@actualizar');
Route::get('/maestrosPDF', 'maestrosController@pdf');

Route::get('/registrarGrupo', 'gruposController@registrar');
Route::post('/guardarGrupo', 'gruposController@guardar');
Route::get('/consultarGrupos', 'gruposController@consultar');
Route::get('/eliminarGrupo/{id}', 'gruposController@eliminar');
Route::get('/editarGrupo/{id}', 'gruposController@editar');
Route::post('/actualizarGrupo/{id}', 'gruposController@actualizar');
Route::get('/gruposPDF', 'gruposController@pdf');

Route::get('/registrarGrupoxAlumnos', 'groupXalController@registrar');
Route::post('/guardarGruposxAlumnos', 'groupXalController@guardar');
Route::get('/consultarGrupoxAlumnos', 'groupXalController@consultar');
Route::get('/eliminarGroupxAlumnos/{id_alumno}&&{id_grupo}', 'groupXalController@eliminar');
Route::get('/editarGroupxAlumnos/{id_alumno}&&{id_grupo}&&{maestro_id}', 'groupXalController@editar');
Route::post('/actualizarGroupxAlumnos/{alumno}&&{grupo}&&{maestro}', 'groupXalController@actualizar');
Route::get('/gruposXalumnosPDF', 'groupXalController@pdf');

//crear ruta cargarMaterias de consultarAlumnos
//lista de materias dependiendo de su carrera
//lista de materias que el alumno puede y no puede cargar dependiendo su kardex