<?php

namespace App\Http\Livewire\Profile;

use App\Models\Event;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class ProfileComponent extends Component
{
    /* Permite trabajr con la subida de archivos */
    use WithFileUploads;

    public $user, $avatar, $name, $description, $temporary;

    public $nameUser, $firstLastname, $secondLastname, $phone, $email, $corporative;

    public $profile, $birthday, $facebook, $instagram, $github, $website, $other;

    public $password, $password1, $password1_confirmation;

    public $status, $text;

    /* Se definen los roles de todas las variables a utilizar en este componente, asi como sus validaciones */
    public $rules = [
        /* Define a la imagen, el nombre y la descripción */
        'temporary'     => 'image|mimes:jpeg,png|max:4096',
        'name'          => 'required|string|max:200|unique:users,name',
        'description'   => 'required|string|max:500',
        /* Define los datos de perfil */
        'nameUser'          => 'required|string|max:200',
        'firstLastname'     => 'required|string|max:200',
        'secondLastname'    => 'required|string|max:200',
        'phone'             => 'required|numeric|digits_between:10,13|unique:users,phone',
        'email'             => 'required|email|unique:users,email',
        'corporative'       => 'required|email|unique:users,corporative',
        /* Define sus redes sociales y fecha de nacimiento */
        'birthday'     => 'date|nullable',
        'facebook'     => 'string|max:200|nullable|unique:profiles,facebook',
        'instagram'    => 'string|max:200|nullable|unique:profiles,instagram',
        'github'       => 'string|max:200|nullable|unique:profiles,github',
        'website'      => 'string|max:200|nullable|unique:profiles,website',
        'other'        => 'string|max:200|nullable|unique:profiles,other',
        /* Define si contraseña */
        'password'    => 'required|password|min:8|max:100',
        'password1'   => 'required|password|min:8|max:100|confirmed',
        'password1_confirmation'   => 'required|password|min:8|max:100',
        /* Define su estado */
        'status'     => 'required',
    ];

    /* Se asigna un nombre mas significativo y entendible para las varibles, estos apareceran en los mensajes de error */
    protected $validationAttributes = [
        'temporary'     => 'avatar de perfil',
        'name'          => 'nombre de usuario',
        'description'   => 'descripción de usuario',

        'nameUser'          => 'nombre',
        'firstLastname'     => 'primer apellido',
        'secondLastname'    => 'segundo apellido',
        'phone'             => 'teléfono',
        'email'             => 'email personal',
        'corporative'       => 'email corporativo',

        'birthday'   => 'fecha de nacimiento',
        'facebook'   => 'facebook',
        'instagram'  => 'instagram',
        'github'     => 'github',
        'website'    => 'sitio web',
        'other'      => 'otra red social',

        'password'   => 'contraseña actual',
        'password1'  => 'contraseña nueva',
        'password1_confirmation'  => 'confirmar contraseña',

        'status'    => 'estado',
    ];

    /* Este metodo se carga la primera vez en renderizar este componente */
    public function mount()
    {
        /* Asigno a todas las variables el valor correspondiente de acuerdo al usuario logueado */
        $user             = Auth::user()->id;
        $this->user       = User::find($user);
        $this->profile    = $this->user->profile;

        $this->name          = $this->user->name;
        $this->avatar        = 'storage/users/' . $this->user->profile->avatar;
        $this->description   = $this->user->profile->description;

        $this->nameUser         = $this->user->nameUser;
        $this->firstLastname    = $this->user->firstLastname;
        $this->secondLastname   = $this->user->secondLastname;
        $this->phone            = $this->user->phone;
        $this->email            = $this->user->email;
        $this->corporative      = $this->user->corporative;
        $this->status           = $this->user->status;

        $this->birthday   = $this->user->profile->birthday;
        $this->facebook   = $this->user->profile->facebook;
        $this->instagram  = $this->user->profile->instagram;
        $this->github     = $this->user->profile->github;
        $this->website    = $this->user->profile->website;
        $this->other      = $this->user->profile->other;

        /* Estos metodos resetean todos los mensajes de error en el componente */
        $this->resetErrorBag();
        $this->resetValidation();
    }

    /* Este metodo es para validar los campos en tiempo real */
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'temporary'     => 'nullable|mimes:jpeg,png|max:4096',
            'name'          => 'required|string|max:200|unique:users,name, ' . $this->user->id,
            'description'   => 'required|string|max:500',

            'nameUser'          => 'required|alpha|max:200',
            'firstLastname'     => 'required|alpha|max:200|',
            'secondLastname'    => 'required|alpha|max:200',
            'phone'             => 'required|numeric|digits_between:10,13|unique:users,phone, ' . $this->user->id,
            'email'             => 'required|email|unique:users,email, ' . $this->user->id,
            'corporative'       => 'required|email|unique:users,corporative, ' . $this->user->id,

            'birthday'     => 'date|nullable',
            'facebook'     => 'string|max:200|nullable|unique:profiles,facebook, ' . $this->profile->id,
            'instagram'    => 'string|max:200|nullable|unique:profiles,instagram, ' . $this->profile->id,
            'github'       => 'string|max:200|nullable|unique:profiles,github, ' . $this->profile->id,
            'website'      => 'string|max:200|nullable|unique:profiles,website, ' . $this->profile->id,
            'other'        => 'string|max:200|nullable|unique:profiles,other, ' . $this->profile->id,

            'status'     => 'required',
        ]);
    }

    /* Se actualizan el avatar, y descripcion del usuario */
    public function saveAvatar()
    {
        /* Debemos de verificar que los campos esten correctos con las validaciones */
        $this->validate([
            'temporary'     => 'nullable|mimes:jpeg,png|max:4096',
            'name'          => 'required|string|max:200|unique:users,name, ' . $this->user->id,
            'description'   => 'required|string|max:500',
        ]);

        /* Se declara el mensaje de notificación */
        $status  = 'success';
        $content = 'Su avatar y descripción se guardo correctamente';

        /* Preparamos un catch para atraparlo */
        try {
            /* Iniciamos una transaccion en la DB */
            DB::beginTransaction();

            /* Validamos que exista el usuario */
            if ($this->user->id) {

                /* Buscamos el usuario logueado en todos los usuarios */
                $usuario = User::find($this->user->id);

                /* Actualiza el nombre del usuario */
                /* $usuario->update([
                    'name'  => $this->name,
                ]); */

                /* Asignamos el usuario con el perfil que esta relacionado a la variable perfil */
                $perfil = $usuario->profile;

                /* Validamos si hay una imagen */
                if ($this->temporary) {

                    /* Obtenermos el nombre de la imagen, la concatenamos con el time() y la asignamos a $avatarUser */
                    $avatarUser = time() . '_' . $this->temporary->getClientOriginalName();
                    /* Almacenamos la imagen en el servidor con el nombre obtenido */
                    $this->temporary->storePubliclyAs('storage/users', $avatarUser, 'public_uploads');

                    /* Actualizamos el nombre de la imagen con la que se obtuvo y la guardamos en la DB */
                    $perfil->update([
                        'avatar'        => $avatarUser,
                    ]);
                }
                /* Actualzamos la descripciòn del usuario en su perfil */
                $perfil->update([
                    'description'   => $this->description,
                ]);
            }
            /* Confirmamos la transaccion y la cerramos */
            DB::commit();

        } catch (\Throwable $th) {
            /* Cancelamos la transaccion en caso de que haya un errror */
            DB::rollback();
            /* Actualizamos el mensaje de notificaciòn */
            $status  = 'error';
            $content = 'Ocurrió un error al tratar de guardar los datos de su avatar y descripción';
        }

        /* Enviamos el mensaje de respuesta */
        session()->flash('process_result', [
            'status'    => $status,
            'content'   => $content,
        ]);

        /* Llamamos el metodo clean que restablece todas las variables  */
        $this->clean();
    }

    /* Actualizamos los datos de perfil como es su nombre, etc */
    public function saveUser()
    {
        /* validamos los campos necesarios */
        $this->validate([
            'nameUser'          => 'required|string|max:200',
            'firstLastname'     => 'required|string|max:200',
            'secondLastname'    => 'required|string|max:200',
            'phone'             => 'required|numeric|digits_between:10,13|unique:users,phone, ' . $this->user->id,
            'email'             => 'required|email|unique:users,email, ' . $this->user->id,
            'corporative'       => 'required|email|unique:users,corporative, ' . $this->user->id,
        ]);

        $status  = 'success';
        $content = 'Datos de perfil actualizados correctamente';

        try {

            DB::beginTransaction();

            if ($this->user->id) {
                $usuario = User::find($this->user->id);

                $usuario->update([
                    'nameUser'       => $this->nameUser,
                    'firstLastname'  => $this->firstLastname,
                    'secondLastname' => $this->secondLastname,
                    'phone'          => $this->phone,
                    'email'          => $this->email,
                    'corporative'    => $this->corporative,
                ]);
            }

            DB::commit();

        } catch (\Throwable $th) {

            DB::rollback();

            $status  = 'error';
            $content = 'Ocurrió un error al tratar de actualizar los datos de su perfil';
        }

        session()->flash('process_result', [
            'status'    => $status,
            'content'   => $content,
        ]);

        $this->clean();
    }

    public function saveProfile()
    {
        $this->validate([
            'birthday'     => 'date|nullable',
            'facebook'     => 'string|max:200|nullable|unique:profiles,facebook, ' . $this->profile->id,
            'instagram'    => 'string|max:200|nullable|unique:profiles,instagram, ' . $this->profile->id,
            'github'       => 'string|max:200|nullable|unique:profiles,github, ' . $this->profile->id,
            'website'      => 'string|max:200|nullable|unique:profiles,website, ' . $this->profile->id,
            'other'        => 'string|max:200|nullable|unique:profiles,other, ' . $this->profile->id,
        ]);

        $status  = 'success';
        $content = 'Sus datos se guardaron correctamente';

        try {

            DB::beginTransaction();

            if ($this->user->id) {
                $usuario = User::find($this->user->id);
                $perfil = $usuario->profile;

                $perfil->update([
                    'birthday'    => $this->birthday,
                    'facebook'    => $this->facebook,
                    'instagram'   => $this->instagram,
                    'github'      => $this->github,
                    'website'     => $this->website,
                    'other'       => $this->other,
                ]);

            }

            DB::commit();

        } catch (\Throwable $th) {

            DB::rollback();

            $status  = 'error';
            $content = 'Ocurrió un error al tratar de guardar sus datos';
        }

        session()->flash('process_result', [
            'status'    => $status,
            'content'   => $content,
        ]);

        $this->clean();
    }

    public function savePassword()
    {
        $this->validate([
            'password'    => 'required|password|min:8|max:100',
            'password1'   => 'required|min:8|max:100|confirmed',
            'password1_confirmation'   => 'required|min:8|max:100',
        ]);

        $status  = 'success';
        $content = 'Su contraseña se actualizó correctamente';

        try {

            DB::beginTransaction();

            if ($this->user->id) {
                $usuario = User::find($this->user->id);
                if ($usuario->password = Hash::make($this->password)) {
                    if ($this->password1 == $this->password1_confirmation) {

                        $usuario->update([
                            'password'  => Hash::make($this->password1),
                        ]);

                        session()->flash('process_result', [
                            'status'    => $status,
                            'content'   => $content,
                        ]);

                        $this->clean();
                    } else {

                        $status  = 'error';
                        $content = 'La contraseña nueva no coincide con la confirmación de la contresaña';

                        session()->flash('process_result', [
                            'status'    => $status,
                            'content'   => $content,
                        ]);
                    }
                } else {

                    $status  = 'error';
                    $content = 'La contraseña actual no es la correcta';

                    session()->flash('process_result', [
                        'status'    => $status,
                        'content'   => $content,
                    ]);
                }
            }

            DB::commit();

        } catch (\Throwable $th) {

            DB::rollback();

            $status  = 'error';
            $content = 'Ocurrió un error al tratar de actualizar su contraseña';
        }
    }

    public function saveEstado()
    {
        Gate::authorize('haveaccess', 'profile.update');

        $this->validate([
            'status'     => 'required',
        ]);

        $status  = 'success';
        $content = 'Su cuenta se ';

        try {

            DB::beginTransaction();

            if ($this->user->id) {

                $usuario = User::find($this->user->id);

                $usuario->update([
                    'status'    => $this->status,
                ]);

                if ($this->status == 1) {
                    $valor = "activo";
                } else {
                    $valor = "desactivo";
                }
                $content = 'Su cuenta se ' . $valor . ' correctamente';
            }

            DB::commit();

        } catch (\Throwable $th) {

            DB::rollback();

            $status  = 'error';
            $content = 'Ocurrió un error al tratar de modificar su cuenta';
        }

        session()->flash('process_result', [
            'status'    => $status,
            'content'   => $content,
        ]);

        $this->clean();
    }

    public function deleteAcount()
    {
        Gate::authorize('haveaccess', 'profile.destroy');

        $status  = 'success';
        $content = 'Se eliminó correctamente su cuenta';

        try {

            DB::beginTransaction();

            if ($this->user->id) {
                User::find($this->user->id)->deletedAtFall();
                /* User::find($this->user->id)->delete(); */
            }

            DB::commit();

        } catch (\Throwable $th) {

            DB::rollback();

            $status  = 'error';
            $content = 'Ocurrió un error al tratar de eliminar su cuenta';
        }

        session()->flash('process_result', [
            'status'    => $status,
            'content'   => $content,
        ]);

        $this->clean();
    }

    public function clean()
    {
        $this->reset([
            'user',
            'profile',
            'avatar',
            'temporary',
            'name',
            'description',
            'nameUser',
            'firstLastname',
            'secondLastname',
            'phone',
            'email',
            'corporative',
            'birthday',
            'facebook',
            'instagram',
            'github',
            'website',
            'other',
            'password',
            'password1',
            'password1_confirmation',
            'status',
        ]);

        $this->mount();
    }

    public function render()
    {
        return view('livewire.profile.profile-component');
    }
}
