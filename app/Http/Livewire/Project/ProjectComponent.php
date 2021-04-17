<?php

namespace App\Http\Livewire\Project;

use App\Models\Category;
use App\Models\Clas;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class ProjectComponent extends Component
{
    use WithPagination;

    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    public $project_id, $avatar, $key, $name, $description, $status, $responsable, $created_at, $updated_at, $accion = "store";

    public $clase, $categoria, $clas_id, $category_id, $temporary, $usuarios;

    public $search = '', $perPage = '10', $page = 1, $total, $projects_task;

    public $user = [], $projects_users = [], $message;

    public $addClass, $claseNew, $addCategory, $categoriaNew;

    public $rules = [
        'avatar'        => 'image|mimes:jpeg,png|max:5000',
        'key'           => 'required|string|max:100|unique:projects,key',
        'name'          => 'required|string|max:200|unique:projects,name',
        'description'   => 'required|string',
        'responsable'   => 'required|string|max:100',
        'clas_id'       => 'required',
        'category_id'   => 'required',
    ];

    protected $queryString = [
        'search'  => ['except' => ''],
        'perPage' => ['except' => '10'],
    ];

    protected $validationAttributes = [
        'avatar'        => 'imagen',
        'temporary'     => 'imagen',
        'key'           => 'clave',
        'name'          => 'nombre',
        'description'   => 'descripción',
        'responsable'   => 'responsable',
        'clas_id'       => 'clase',
        'category_id'   => 'categoría',
        'claseNew'      => 'clase',
        'categoriaNew'  => 'categoría',
    ];

    public function mount()
    {
        $this->total = count(Project::all());
        $this->usuarios = User::where('status', '=', 1)->get();

        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function updated($propertyName)
    {
        if ($this->accion == "store") {
            $this->validateOnly($propertyName, [
                'avatar'        => 'image|mimes:jpeg,png|max:5000',
                'key'           => 'required|string|max:100|unique:projects,key',
                'name'          => 'required|string|max:200|unique:projects,name',
                'description'   => 'required|string',
                'responsable'   => 'required|string|max:100',
                'clas_id'       => 'required',
                'category_id'   => 'required',
            ]);
        } else {
            $this->validateOnly($propertyName, [
                'avatar'        => 'image|mimes:jpeg,png|max:5000',
                'key'           => 'required|string|max:100|unique:projects,key,' . $this->project_id,
                'name'          => 'required|string|max:200|unique:projects,name,' . $this->project_id,
                'description'   => 'required|string',
                'responsable'   => 'required|string|max:100',
                'clas_id'       => 'required',
                'category_id'   => 'required',
            ]);
        }
    }

    public function store()
    {
        Gate::authorize('haveaccess', 'project.create');

        $this->validate([
            'temporary'     => 'image|mimes:jpeg,png|max:5000',
            'key'           => 'required|string|max:100|unique:projects,key',
            'name'          => 'required|string|max:200|unique:projects,name',
            'description'   => 'required|string',
            'responsable'   => 'required|string|max:100',
            'clas_id'       => 'required',
            'category_id'   => 'required',
        ]);

        $status  = 'success';
        $content = 'Se agregó correctamente el proyecto';

        try {

            DB::beginTransaction();

            if ($this->temporary != null) {
                if ($this->temporary->getClientOriginalName()) {
                    $nameFile = time() . '_' . $this->temporary->getClientOriginalName();
                    $this->temporary->storePubliclyAs('storage/projects', $nameFile, 'public_uploads');
                }
            } else {
                $nameFile = null;
            }

            $project = Project::create([
                'avatar'        => $nameFile,
                'key'           => $this->key,
                'name'          => $this->name,
                'slug'          => Str::slug($this->name, '-'),
                'description'   => $this->description,
                'responsable'   => $this->responsable,
                'clas_id'       => $this->clas_id,
                'category_id'   => $this->category_id,
            ]);

            $project->users()->sync($this->user);

            $respon = User::where('name', '=', $this->responsable)->first();

            $project->users()->sync($respon->id);

            DB::commit();
        } catch (\Throwable $th) {

            DB::rollback();

            $status  = 'error';
            $content = 'Ocurrió un error al agregar el proyecto';
        }

        session()->flash('process_result', [
            'status'    => $status,
            'content'   => $content,
        ]);

        $this->clean();
        $this->emit('projectCreatedEvent');
    }

    public function show(Project $project)
    {
        Gate::authorize('haveaccess', 'project.show');

        try {

            $created             = new Carbon($project->created_at);
            $updated             = new Carbon($project->updated_at);
            $this->project_id    = $project->id;
            $this->avatar        = $project->avatar;
            $this->key           = $project->key;
            $this->name          = $project->name;
            $this->description   = $project->description;
            $this->status        = $project->status;
            $this->responsable   = $project->responsable;
            $this->clas_id       = $project->clas_id;
            $this->category_id   = $project->category_id;
            $this->created_at    = $created->format('l jS \\of F Y h:i:s A');
            $this->updated_at    = $updated->format('l jS \\of F Y h:i:s A');

            if (isset($project->clas->description)) {
                $this->clase   = $project->clas->description;
            } else {
                $this->clase   = "Sin clase";
            }

            if (isset($project->category->description)) {
                $this->categoria     = $project->category->description;
            } else {
                $this->categoria     = "Sin categoria";
            }

            foreach ($project->users as $user) {
                $this->projects_users[] = $user->id;
            }

        } catch (\Throwable $th) {

            $status = 'error';
            $content = 'Ocurrio un error en la carga de datos';

            session()->flash('process_result', [
                'status'    => $status,
                'content'   => $content,
            ]);

        }
    }

    public function close()
    {
        $this->clean();
        $this->emit('projectShowEvent');
    }

    public function edit(Project $project)
    {
        Gate::authorize('haveaccess', 'project.edit');

        try {

            $this->project_id    = $project->id;
            $this->avatar        = $project->avatar;
            $this->key           = $project->key;
            $this->name          = $project->name;
            $this->description   = $project->description;
            $this->status        = $project->status;
            $this->responsable   = $project->responsable;
            $this->clas_id       = $project->clas_id;
            $this->category_id   = $project->category_id;
            $this->created_at    = $project->created_at;
            $this->updated_at    = $project->updated_at;
            $this->accion        = "update";

            foreach ($project->users as $user) {
                $this->user[] = $user->id;
            }

        } catch (\Throwable $th) {

            $status = 'error';
            $content = 'Ocurrio un error en la carga de datos';

            session()->flash('process_result', [
                'status'    => $status,
                'content'   => $content,
            ]);

        }
    }

    public function update()
    {
        Gate::authorize('haveaccess', 'project.edit');

        $this->validate([
            'temporary'     => 'image|mimes:jpeg,png|max:5000|nullable',
            'key'           => 'required|string|max:100|unique:projects,key,' . $this->project_id,
            'name'          => 'required|string|max:200|unique:projects,name,' . $this->project_id,
            'description'   => 'required|string',
            'responsable'   => 'required|string|max:100',
            'status'        => 'required',
            'clas_id'       => 'required',
            'category_id'   => 'required',
        ]);

        $status  = 'success';
        $content = 'Se actualizó correctamente el proyecto';

        try {

            DB::beginTransaction();

            if ($this->temporary != null) {
                if ($this->temporary->getClientOriginalName()) {
                    $nameFile = time() . '_' . $this->temporary->getClientOriginalName();
                    $this->temporary->storePubliclyAs('storage/projects', $nameFile, 'public_uploads');
                }
            } else {
                $nameFile = $this->avatar;
            }

            if ($this->project_id) {
                $project = Project::find($this->project_id);
                $project->update([
                    'avatar'        => $nameFile,
                    'key'           => $this->key,
                    'name'          => $this->name,
                    'slug'          => Str::slug($this->name, '-'),
                    'description'   => $this->description,
                    'status'        => $this->status,
                    'responsable'   => $this->responsable,
                    'clas_id'       => $this->clas_id,
                    'category_id'   => $this->category_id,
                ]);

                $project->users()->sync($this->user);

                $respon = User::where('name', '=', $this->responsable)->first();

                $project->users()->sync($respon->id);
            }

            DB::commit();
        } catch (\Throwable $th) {

            DB::rollback();

            $status  = 'error';
            $content = 'Ocurrió un error al actualizar el proyecto';
        }

        session()->flash('process_result', [
            'status'    => $status,
            'content'   => $content,
        ]);

        $this->clean();
        $this->emit('projectUpdatedEvent');
    }

    public function limpia()
    {
        $this->reset(['user']);
    }

    public function delete(Project $project)
    {
        Gate::authorize('haveaccess', 'project.destroy');

        try {

            $this->project_id   = $project->id;
            $this->key          = $project->key;
            $this->name         = $project->name;
            $this->avatar       = $project->avatar;

        } catch (\Throwable $th) {

            $status = 'error';
            $content = 'Ocurrio un error en la carga de datos';

            session()->flash('process_result', [
                'status'    => $status,
                'content'   => $content,
            ]);

        }
    }

    public function destroy()
    {
        Gate::authorize('haveaccess', 'project.destroy');

        $status  = 'success';
        $content = 'Se eliminó correctamente el proyecto';

        try {

            DB::beginTransaction();

            Project::find($this->project_id)->delete();

            DB::commit();
        } catch (\Throwable $th) {

            DB::rollback();

            $status  = 'error';
            $content = 'Ocurrió un error al eliminar el proyecto';
        }

        session()->flash('process_result', [
            'status'    => $status,
            'content'   => $content,
        ]);

        $this->clean();
        $this->emit('projectDeletedEvent');
    }

    public function clean()
    {
        $this->reset([
            'project_id',
            'avatar',
            'temporary',
            'key',
            'name',
            'description',
            'responsable',
            'status',
            'clas_id',
            'category_id',
            'created_at',
            'updated_at',
            'accion',
            'clase',
            'categoria',
            'user',
            'projects_users',
        ]);

        $this->mount();
    }

    public function clear()
    {
        $this->reset(['search', 'perPage', 'page']);
    }

    public function addClass()
    {
        $this->addClass = true;
    }

    public function storeClass()
    {
        Gate::authorize('haveaccess', 'class.create');

        $status  = 'success';
        $content = 'Se agrego correctamente la clase';

        $this->validate([
            'claseNew' => 'required|alpha|max:200|unique:class,description',
        ]);

        try {

            DB::beginTransaction();

            $depa = Clas::create([
                'description'  => $this->claseNew,
            ]);

            DB::commit();
        } catch (\Throwable $th) {

            DB::rollback();

            $status  = 'error';
            $content = 'Ocurrió un error al agregar la clase';
        }

        session()->flash('process_result', [
            'status'    => $status,
            'content'   => $content,
        ]);
        $this->cancelaClass();
    }

    public function cancelaClass()
    {
        $this->addClass = false;
        $this->claseNew = null;
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function addCategory()
    {
        $this->addCategory = true;
    }

    public function storeCategory()
    {
        Gate::authorize('haveaccess', 'category.create');

        $status  = 'success';
        $content = 'Se agrego correctamente la categoria';

        $this->validate([
            'categoriaNew'  => 'required|alpha|max:200|unique:categories,description',
        ]);

        try {

            DB::beginTransaction();

            $depa = Category::create([
                'description'  => $this->categoriaNew,
            ]);

            DB::commit();
        } catch (\Throwable $th) {

            DB::rollback();

            $status  = 'error';
            $content = 'Ocurrió un error al agregar la categoria';
        }

        session()->flash('process_result', [
            'status'    => $status,
            'content'   => $content,
        ]);
        $this->cancelaCategory();
    }

    public function cancelaCategory()
    {
        $this->addCategory = false;
        $this->categoriaNew = null;
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function render()
    {
        $clases      = Clas::orderBy('description')->where('status', '=', 1)->get();
        $categorias  = Category::orderBy('description')->where('status', '=', 1)->get();
        $usuarios    = User::latest('id')->where('status', '=', 1)->get();
        $tareas      = Task::latest('id')->get();

        if ($this->search != '') {
            $this->page = 1;
        }

        if (isset(($this->total)) && ($this->perPage > $this->total) && ($this->page != 1)) {
            $this->reset(['perPage']);
        }

        return view(
            'livewire.project.project-component',
            [
                'projects' => Project::latest('id')
                    ->with('clas', 'category')
                    ->where('key', 'LIKE', "%{$this->search}%")
                    ->orWhere('name', 'LIKE', "%{$this->search}%")
                    ->orWhere('description', 'LIKE', "%{$this->search}%")
                    ->orWhere('responsable', 'LIKE', "%{$this->search}%")
                    ->paginate($this->perPage)
            ],
            compact('clases', 'categorias', 'tareas', 'usuarios')
        );
    }
}
