<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $category_id, $description, $status, $created_at, $updated_at, $accion = "store";

    public $search = '', $perPage = '10', $total, $category, $page = 1;

    public $rules = [
        'description'  => 'required|alpha|max:200|unique:categories,description',
    ];

    protected $queryString = [
        'search'  => ['except' => ''],
        'perPage' => ['except' => '10'],
    ];

    protected $validationAttributes = [
        'description' => 'descripción',
    ];

    public function mount()
    {
        $this->total = count(Category::all());

        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function updated($propertyName)
    {
        if ($this->accion == "store") {
            $this->validateOnly($propertyName, [
                'description' => 'required|alpha|max:200|unique:categories,description',
            ]);
        } else {
            $this->validateOnly($propertyName, [
                'description' => 'required|alpha|max:200|unique:categories,description,' . $this->category_id,
            ]);
        }
    }

    public function store()
    {
        Gate::authorize('haveaccess', 'category.create');

        $this->validate([
            'description' => 'required|alpha|max:200|unique:categories,description',
        ]);

        $status = 'success';
        $content = 'Se agregó correctamente la categoría';

        try {

            DB::beginTransaction();

            Category::create([
                'description'   => $this->description,
            ]);

            DB::commit();

        } catch (\Throwable $th) {

            DB::rollBack();

            $status = 'error';
            $content = 'Ocurrió un error al agregar la categoría';

        }

        session()->flash('process_result', [
            'status'    => $status,
            'content'   => $content,
        ]);

        $this->clean();
        $this->emit('categoryCreatedEvent');
    }

    public function show(Category $categories)
    {
        Gate::authorize('haveaccess', 'category.show');

        try {

            $created            = new Carbon($categories->created_at);
            $updated            = new Carbon($categories->updated_at);
            $this->category_id  = $categories->id;
            $this->description  = $categories->description;
            $this->status       = $categories->status;
            $this->created_at   = $created->format('l jS \\of F Y h:i:s A');
            $this->updated_at   = $updated->format('l jS \\of F Y h:i:s A');
            $this->category     = $categories;

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
        $this->emit('categoryShowEvent');
    }

    public function edit(Category $categories)
    {
        Gate::authorize('haveaccess', 'category.edit');

        try {

            $this->category_id  = $categories->id;
            $this->description  = $categories->description;
            $this->status       = $categories->status;
            $this->accion       = "update";

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
        Gate::authorize('haveaccess', 'category.edit');

        $this->validate([
            'description' => 'required|alpha|max:200|unique:categories,description,' . $this->category_id,
        ]);

        $status = 'success';
        $content = 'Se actualizó correctamente la categoría';

        try {

            DB::beginTransaction();

            if ($this->category_id) {
                $clase = Category::find($this->category_id);
                $clase->update([
                    'description'   => $this->description,
                    'status'        => $this->status,
                ]);
            }

            DB::commit();

        } catch (\Throwable $th) {

            DB::rollBack();

            $status = 'error';
            $content = 'Ocurrió un error al actualizar la categoría';

        }

        session()->flash('process_result', [
            'status'    => $status,
            'content'   => $content,
        ]);

        $this->clean();
        $this->emit('categoryUpdatedEvent');
    }

    public function delete(Category $categories)
    {
        Gate::authorize('haveaccess', 'category.destroy');

        try {

            $this->category_id  = $categories->id;
            $this->description  = $categories->description;

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
        Gate::authorize('haveaccess', 'category.destroy');

        $status = 'success';
        $content = 'Se eliminó correctamente la categoría';

        try {

            DB::beginTransaction();

            Category::find($this->category_id)->delete();

            DB::commit();

        } catch (\Throwable $th) {

            DB::rollBack();

            $status = 'error';
            $content = 'Ocurrió un error al eliminar la categoría';

        }

        session()->flash('process_result', [
            'status'    => $status,
            'content'   => $content,
        ]);

        $this->clean();
        $this->emit('categoryDeletedEvent');
    }

    public function clean()
    {
        $this->reset([
            'category_id',
            'description',
            'status',
            'accion',
            'category',
            'created_at',
            'updated_at',
        ]);

        $this->mount();
    }

    public function clear()
    {
        $this->reset(['search', 'perPage', 'page']);
    }

    public function render()
    {
        $proyectos = Project::orderBy('name')->where('status', '=', 1)->get();

        if ($this->search != '') {
            $this->page = 1;
        }

        if (isset(($this->total)) && ($this->perPage > $this->total) && ($this->page != 1)) {
            $this->reset(['perPage']);
        }

        return view(
            'livewire.category.category-component',
            [
                'categories' => Category::latest('id')
                    ->where('description', 'LIKE', "%{$this->search}%")
                    ->paginate($this->perPage)
            ],
            compact('proyectos')
        );
    }
}
