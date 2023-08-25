<?php

namespace App\Http\Controllers;

use App\Models\Especialidad;
use App\Models\Hospital;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;

class ProgramController extends Controller
{

    public function getPrograms()
    {
        $programs = Program::inRandomOrder()->limit(20)->get();

        return $programs;

    }
    public function index()
    {
        $programs = $this->getPrograms();
        return view('programs.authindex', ['programs' => $programs]);
    }

    public function guestIndex()
    {
        $programs = $this->getPrograms();

        return view('programs.guestIndex', ['programs' => $programs]);
    }
    public function create()
    {
        $this->authorize('create', Program::class);
        $especialidades = Especialidad::all();
        $hospitales = Hospital::all();
        $role = Role::firstWhere('name', 'Especialista');
        $especialistas = $role->users()->get();


        return view('programs.create', compact('especialidades', 'hospitales', 'especialistas'));
    }

    public function store(Request $request)
    {
        $this->authorize('create', Program::class);
        $user = Auth::user();

        try {
            $request->merge([
                'requiere_carta' => $request->has('requiere_carta'),
                'acepta_estudiantes_medicina' => $request->has('acepta_estudiantes_medicina'),
                'acepta_medicos_generales' => $request->has('acepta_medicos_generales'),
                'acepta_residentes' => $request->has('acepta_residentes'),
                'acepta_fellows' => $request->has('acepta_fellows'),
                'acepta_especialistas' => $request->has('acepta_especialistas'),
                'hace_consulta_externa' => $request->has('hace_consulta_externa'),
                'hace_procedimientos' => $request->has('hace_procedimientos'),
                'hace_hospitalizacion' => $request->has('hace_hospitalizacion'),
                'hace_cirugia' => $request->has('hace_cirugia')
            ]);

            $request->validate([
                'nombre' => 'required',
                'ciudad' => 'required',
                'pais' => 'required',
                'fecha_inicio' => 'required|date',
                'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
                'descripcion' => 'required|max:100',
                'especialidad_id' => 'required|exists:especialidads,id',
                'hospital_id' => 'required|exists:hospitals,id',
                'tipo_rotacion' => 'required|string',
                'requiere_carta' => 'required|boolean',
                'acepta_estudiantes_medicina' => 'nullable|boolean',
                'acepta_medicos_generales' => 'nullable|boolean',
                'acepta_residentes' => 'nullable|boolean',
                'acepta_fellows' => 'nullable|boolean',
                'acepta_especialistas' => 'nullable|boolean',
                'hace_consulta_externa' => 'nullable|boolean',
                'hace_procedimientos' => 'nullable|boolean',
                'hace_hospitalizacion' => 'nullable|boolean',
                'hace_cirugia' => 'nullable|boolean',
            ]);

            $program = new Program;
            $program->nombre = $request->nombre;
            $program->ciudad = $request->ciudad;
            $program->pais = $request->pais;
            $program->fecha_inicio = $request->fecha_inicio;
            $program->fecha_fin = $request->fecha_fin;
            $program->descripcion = $request->descripcion;
            $program->especialidad_id = $request->especialidad_id;
            $program->hospital_id = $request->hospital_id;
            $program->especialista_id = Auth::id();
            $program->especialista_descripcion = $user->name;
            $program->tipo_rotacion = $request->tipo_rotacion;
            $program->requiere_carta = $request->requiere_carta;
            $program->acepta_estudiantes_medicina = $request->acepta_estudiantes_medicina;
            $program->acepta_medicos_generales = $request->acepta_medicos_generales;
            $program->acepta_residentes = $request->acepta_residentes;
            $program->acepta_fellows = $request->acepta_fellows;
            $program->acepta_especialistas = $request->acepta_especialistas;
            $program->hace_consulta_externa = $request->hace_consulta_externa;
            $program->hace_procedimientos = $request->hace_procedimientos;
            $program->hace_hospitalizacion = $request->hace_hospitalizacion;
            $program->hace_cirugia = $request->hace_cirugia;

            $program->save();

            return redirect()->route('programs.authindex')->with('success', 'Programa creado exitosamente.');
        } catch (\Exception $e) {
            Log::error($e);
            return back()->withInput()->withErrors(['general' => 'No se pudo crear el programa. Por favor intente de nuevo.']);
        }
    }

    public function show(Program $program)
    {
        $especialidades = Especialidad::all();
        $hospitales = Hospital::all();
        $role = Role::firstWhere('name', 'Especialista');
        $especialistas = $role->users()->get();


        return view('programs.show', compact('especialidades', 'hospitales', 'especialistas', 'program'));
    }

    public function editRespaldo(Program $program)
    {

        $this->authorize('update', [$program, auth()->user()]);
        $especialidades = Especialidad::all();
        $hospitales = Hospital::all();
        $role = Role::firstWhere('name', 'Especialista');
        $especialistas = $role->users()->get();

        return view('programs.edit', compact('program', 'especialidades', 'hospitales', 'especialistas'));
    }
    public function edit()
    {
        $user = Auth::user();
        $program = $user->programs()->first();
        if (!$program) {
            // Si no tiene, crear uno nuevo
            $program = new Program();
            $program->especialista_id = $user->id;
            $program->especialista_descripcion = $user->name;
            $program->save();
            $program->especialistas()->attach($user);
        }
        $this->authorize('update', $program);
        $especialidades = Especialidad::all();
        $hospitales = Hospital::all();
        $role = Role::firstWhere('name', 'Especialista');
        $especialistas = $role->users()->get();

        // Verificar si el usuario tiene programas


        return view('programs.edit', compact('program', 'especialidades', 'hospitales', 'especialistas'));
    }


    public function update(Request $request, Program $program)
    {
        $this->authorize('update', $program);
        $request->merge([
            'requiere_carta' => $request->has('requiere_carta'),
            'acepta_estudiantes_medicina' => $request->has('acepta_estudiantes_medicina'),
            'acepta_medicos_generales' => $request->has('acepta_medicos_generales'),
            'acepta_residentes' => $request->has('acepta_residentes'),
            'acepta_fellows' => $request->has('acepta_fellows'),
            'acepta_especialistas' => $request->has('acepta_especialistas'),
            'hace_consulta_externa' => $request->has('hace_consulta_externa'),
            'hace_procedimientos' => $request->has('hace_procedimientos'),
            'hace_hospitalizacion' => $request->has('hace_hospitalizacion'),
            'hace_cirugia' => $request->has('hace_cirugia')
        ]);
        $request->validate([
            'nombre' => 'required',
            'ciudad' => 'required',
            'pais' => 'required',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
            'descripcion' => 'required|max:100',
            'especialidad_id' => 'required|exists:especialidads,id',
            'hospital_id' => 'required|exists:hospitals,id',
            'tipo_rotacion' => 'required|string',
            'requiere_carta' => 'required|boolean',
            'acepta_estudiantes_medicina' => 'nullable|boolean',
            'acepta_medicos_generales' => 'nullable|boolean',
            'acepta_residentes' => 'nullable|boolean',
            'acepta_fellows' => 'nullable|boolean',
            'acepta_especialistas' => 'nullable|boolean',
            'hace_consulta_externa' => 'nullable|boolean',
            'hace_procedimientos' => 'nullable|boolean',
            'hace_hospitalizacion' => 'nullable|boolean',
            'hace_cirugia' => 'nullable|boolean',
        ]);
        $program->fill($request->all());
        //$program->especialista_id = Auth::id();
        //$program->especialista_descripcion = $user->name;
        $program->save();

        return redirect()->route('programs.edit')->with('success', 'Programa actualizado exitosamente.');
    }


    public function destroy(Program $program)
    {
        $this->authorize('delete', [$program, auth()->user()]);

        $program->delete();

        return redirect()->route('programs.authindex')->with('success', 'Programa eliminado exitosamente.');
    }


    public function enroll(Request $request, Program $program)
    {
        try {
            $this->authorize('enroll', $program);

            $user = Auth::user();

            // Verificar si el usuario ya está inscrito en el programa
            if ($program->students()->where('user_id', $user->id)->exists()) {
                return redirect()->route('programs.enrolled')
                    ->with('error', 'Ya estás inscrito en este programa.');
            }

            // Validar las entradas del formulario
            $validated = $request->validate([
                'fecha_inicio' => ['required', 'date', 'after_or_equal:' . $program->fecha_inicio, 'before:' . $program->fecha_fin],
                'fecha_fin' => ['required', 'date', 'after:fecha_inicio', 'before_or_equal:' . $program->fecha_fin],
                'carta' => ($program->requiere_carta ? ['file', 'mimes:pdf,doc,docx'] : []),
            ]);

            // Si el programa requiere carta, almacenarla y obtener el path
            $cartaPath = null;
            if ($program->requiere_carta && $request->hasFile('carta')) {
                $cartaPath = $request->file('carta')->store('cartas');
            }

            // Adjuntar el estudiante al programa con los datos adicionales
            $program->students()->attach($user->id, [
                'type' => 'estudiante',
                'fecha_inicio' => $validated['fecha_inicio'],
                'fecha_fin' => $validated['fecha_fin'],
                'carta_path' => $cartaPath,
            ]);

            $enrolledPrograms = $user->programs;
            if (!$enrolledPrograms) {
                $enrolledPrograms = collect(); // crea una colección vacía
            }

            return view('programs.enrolled', ['programs' => $enrolledPrograms])
                ->with('success', 'Inscrito en el programa exitosamente.');

        } catch (\Exception $e) {
            // Puedes registrar el error para revisiones futuras
            \Log::error("Error al inscribir al usuario en el programa: {$e->getMessage()}");

            return redirect()->route('programs.authindex')
                ->with('error', 'Hubo un problema al intentar inscribirte. Por favor, intenta nuevamente.');
        }
    }



    public function showEnrolledPrograms()
    {
        $this->authorize('enroll', [Program::class, auth()->user()]);

        $enrolledPrograms = auth()->user()->programs;
        if (!$enrolledPrograms) {
            $enrolledPrograms = collect(); // crea una colección vacía
        }

        return view('programs.enrolled', ['programs' => $enrolledPrograms]);
    }

    public function authIndex()
    {
        $programs = $this->getPrograms();

        return view('programs.authIndex', ['programs' => $programs]);
        // Asume que tienes una vista llamada 'programs.authIndex'
    }

    public function showEnrollForm(Program $program)
    {
        return view('programs.enrollForm', compact('program'));
    }



}