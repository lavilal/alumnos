namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $fillable = [
        'nombres',
        'apellidos',
        'fecha_nacimiento',
        'fotografía',
        'carrera_id',
    ];

    public function carrera()
    {
        return $this->belongsTo(Carrera::class);
    }

    public function notas()
    {
        return $this->hasMany(Nota::class);
    }
}
