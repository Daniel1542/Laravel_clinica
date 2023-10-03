<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\ProcedimentoController;
use App\Http\Controllers\AgendamentoController;


Route::resource('medicos', MedicoController::class);
Route::resource('pacientes', PacienteController::class);
Route::resource('funcionarios', FuncionarioController::class);
Route::resource('procedimentos', ProcedimentoController::class);
Route::resource('agendamentos', AgendamentoController::class);

/*agendamento*/

Route::get('/listaagendamento', [AgendamentoController::class, 'lista'])->name('agendamentos.listaagendamento');
Route::get('/mostraagendamento', [AgendamentoController::class, 'mostra'])->name('agendamentos.mostra');
Route::get('/buscar-agendamento', [AgendamentoController::class, 'buscarPorCodigo'])->name('agendamentos.buscarPorCodigo');

Route::get('/agendamentos/editar/{id}', [AgendamentoController::class, 'edit'])->name('agendamentos.edit');
Route::put('/agendamentos/{id}', [AgendamentoController::class, 'update'])->name('agendamentos.update');
Route::delete('/agendamentos/{id}', [AgendamentoController::class, 'destroy'])->name('agendamentos.destroy');

Route::get('/agendamentos/{id}', [AgendamentoController::class, 'show'])->name('agendamentos.show');
Route::patch('/agendamentos/{id}/retorno', [AgendamentoController::class, 'updateRetorno'])->name('agendamentos.updateRetorno');


/*dashboard*/

Route::get('/data', [LoginController::class, 'dataagora'])->name('login.dataagora');
Route::get('/contapaciente', [PacienteController::class, 'contapaciente'])->name('pacientes.contapaciente');
Route::get('/contamedico', [MedicoController::class, 'contamedico'])->name('medicos.contamedico');

/*medico*/

Route::delete('/medicos/{id}', [MedicoController::class, 'destroy'])->name('medicos.destroy');

Route::get('/listamedico', [MedicoController::class, 'lista'])->name('medicos.listamedico');
Route::get('/mostramedico', [MedicoController::class, 'mostra'])->name('medicos.mostra');
Route::get('/buscar-medico', [MedicoController::class, 'buscarPorCPF'])->name('medicos.buscarPorCPF');

Route::get('/medicos/{id}', [MedicoController::class, 'show'])->name('medicos.show');
Route::get('/medicos/editar/{id}', [MedicoController::class, 'edit'])->name('medicos.edit');
Route::put('/medicos/{id}', [MedicoController::class, 'update'])->name('medicos.update');

/*Paciente*/

Route::delete('/pacientes/{id}', [PacienteController::class, 'destroy'])->name('pacientes.destroy');

Route::get('/listapaciente', [PacienteController::class, 'lista'])->name('pacientes.listapaciente');
Route::get('/mostrapaciente', [PacienteController::class, 'mostra'])->name('pacientes.mostra');
Route::get('/buscar-paciente', [PacienteController::class, 'buscarPorCPF'])->name('pacientes.buscarPorCPF');

Route::get('/pacientes/{id}', [PacienteController::class, 'show'])->name('pacientes.show');
Route::get('/pacientes/editar/{id}', [PacienteController::class, 'edit'])->name('pacientes.edit');
Route::put('/pacientes/{id}', [PacienteController::class, 'update'])->name('pacientes.update');

/*procedimento*/

Route::delete('/procedimento/{id}', [ProcedimentoController::class, 'destroy'])->name('procedimentos.destroy');

Route::get('/listaprocedimento', [ProcedimentoController::class, 'lista'])->name('procedimentos.listaprocedimento');
Route::get('/mostraprocedimento', [ProcedimentoController::class, 'mostra'])->name('procedimentos.mostra');
Route::get('/buscar-procedimento', [ProcedimentoController::class, 'buscarPorCodigo'])->name('procedimentos.buscarPorCodigo');

Route::get('/procedimento/{id}', [ProcedimentoController::class, 'show'])->name('procedimentos.show');
Route::get('/procedimento/editar/{id}', [ProcedimentoController::class, 'edit'])->name('procedimentos.edit');
Route::put('/procedimento/{id}', [ProcedimentoController::class, 'update'])->name('procedimentos.update');


/*funcionario*/

Route::delete('/funcionarios/{id}', [FuncionarioController::class, 'destroy'])->name('funcionarios.destroy');

Route::get('/listafuncionario', [FuncionarioController::class, 'lista'])->name('funcionarios.listapaciente');
Route::get('/mostrafuncionario', [FuncionarioController::class, 'mostra'])->name('funcionarios.mostra');
Route::get('/buscar-funcionario', [FuncionarioController::class, 'buscarPorCPF'])->name('funcionarios.buscarPorCPF');

Route::get('/funcionarios/{id}', [FuncionarioController::class, 'show'])->name('funcionarios.show');
Route::get('/funcionarios/editar/{id}', [FuncionarioController::class, 'edit'])->name('funcionarios.edit');
Route::put('/funcionarios/{id}', [FuncionarioController::class, 'update'])->name('funcionarios.update');

/*User*/

Route::get('/cadastro', [UserController::class, 'create'])->name('user.create');
Route::post('/User', [UserController::class, 'store'])->name('user.store');

Route::get('/login', [UserController::class, 'loga'])->name('user.loga');
Route::post('/auth', [LoginController::class, 'auth'])->name('auth');

/*User*/

Route::get('/', [UserController::class, 'index'])->name('user.index');
Route::get('/dashboard', [LoginController::class, 'dash'])->name('dashboard');

